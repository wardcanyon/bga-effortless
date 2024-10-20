/** Class that extends default bga core game class with more functionality
 */

// XXX: What's the purpose of `curstate` if we have `this.gamedatas.gamestate.name`?`

class GameBasics extends GameGui {
  protected curstate: string | null = null;
  protected pendingUpdate: boolean = false;
  protected currentPlayerWasActive: boolean = false;

  constructor() {
    super();
    console.log('(BASICS) game constructor');
  }

  // state hooks
  public override setup(gamedatas: any) {
    console.log('(BASICS) Starting game setup');
    this.gamedatas = gamedatas;
  }

  public override onEnteringState(stateName: string, args: any) {
    // console.log("(BASICS) onEnteringState: " + stateName, args, this.debugStateInfo());

    this.curstate = stateName;
    // Call appropriate method
    args = args ? args.args : null; // this method has extra wrapper for args for some reason
    const methodName = 'onEnteringState_' + stateName;
    this.callfn(methodName, args);

    if (this.pendingUpdate) {
      this.onUpdateActionButtons(stateName, args);
      this.pendingUpdate = false;
    }
  }

  public override onLeavingState(_stateName: string) {
    // console.log("(BASICS) onLeavingState: " + stateName, this.debugStateInfo());
    this.currentPlayerWasActive = false;
  }

  // XXX: from looking at
  // https://github.com/elaskavaia/bga-dojoless, it seems like this
  // function is meant to handle all dispatch of these events, not to be called via `super()`
  public override onUpdateActionButtons(stateName: string, args: any) {
    console.log('(BASICS) onUpdateActionButtons()');
    if (this.curstate !== stateName) {
      // delay firing this until onEnteringState is called so they always called in same order
      this.pendingUpdate = true;
      // console.log('   DELAYED onUpdateActionButtons');
      return;
    }
    this.pendingUpdate = false;
    if (
      gameui.isCurrentPlayerActive() &&
      this.currentPlayerWasActive === false
    ) {
      console.log(
        'onUpdateActionButtons: ' + stateName,
        args,
        this.debugStateInfo(),
      );
      this.currentPlayerWasActive = true;
      // Call appropriate method
      this.callfn('onUpdateActionButtons_' + stateName, args);
    } else {
      this.currentPlayerWasActive = false;
    }
  }

  // utils
  public debugStateInfo() {
    const iscurac = gameui.isCurrentPlayerActive();
    let replayMode = false;
    if (typeof g_replayFrom !== 'undefined') {
      replayMode = true;
    }
    const instantaneousMode = gameui.instantaneousMode ? true : false;
    const res = {
      instantaneousMode,
      isCurrentPlayerActive: iscurac,
      replayMode,
    };
    return res;
  }

  public ajaxCallWrapper(
    action: string,
    args?: any,
    skipCheckAction: boolean = false,
    handler?: any,
  ) {
    if (!args) {
      args = {};
    }
    args.lock = true;
    if (skipCheckAction || gameui.checkAction(action)) {
      gameui.ajaxcall(
        '/' +
          gameui.game_name +
          '/' +
          gameui.game_name +
          '/' +
          action +
          '.html',
        args,
        gameui,
        (_result) => {
          /*deliberately empty */
        },
        handler,
      );
    }
  }

  // createHtml(divstr: string, location?: string) {
  //   const tempHolder = document.createElement('div');
  //   tempHolder.innerHTML = divstr;
  //   const div = tempHolder.firstElementChild;
  //   const parentNode = document.getElementById(location);
  //   if (parentNode) parentNode.appendChild(div);
  //   return div;
  // }

  // createDiv(id?: string | undefined, classes?: string, location?: string) {
  //   const div = document.createElement('div');
  //   if (id) div.id = id;
  //   if (classes) div.classList.add(...classes.split(' '));
  //   const parentNode = document.getElementById(location);
  //   if (parentNode) parentNode.appendChild(div);
  //   return div;
  // }

  /** @Override onScriptError from gameui */
  public override onScriptError(
    msg: string,
    _url: string,
    _linenumber: number,
  ) {
    if (gameui.page_is_unloading) {
      // Don't report errors during page unloading
      return;
    }
    // In anycase, report these errors in the console
    console.error(msg);
    // // cannot call super - dojo still have to used here
    // super.onScriptError(msg, url, linenumber);
    return this.inherited(this.onScriptError, arguments);
  }

  // XXX: I've only been trying to get this building; fix the typing.
  // XXX: Support easing?
  public wipeOutAndDestroy(node: any, args: any = {}) {
    if (typeof args.duration === 'undefined') {
      args.duration = 500;
    }
    if (this.instantaneousMode) {
      args.duration = Math.min(1, args.duration);
    }
    args.node = node;

    const anim = dojo.fx.wipeOut(args);
    dojo.connect(anim, 'onEnd', (_node: any) => {
      dojo.destroy(_node);
    });
    anim.play();
  }

  // XXX: I've only been trying to get this building; fix the typing.
  public placeAndWipeIn(node: any, parentId: any, args: any = {}): HTMLElement {
    const el = dojo.place(node, parentId);
    dojo.setStyle(el, 'display', 'none');

    if (typeof args.duration === 'undefined') {
      args.duration = 500;
    }
    if (this.instantaneousMode) {
      args.duration = Math.min(1, args.duration);
    }
    args.node = el;

    const anim = dojo.fx.wipeIn(args);
    anim.play();
    return el;
  }

  /**
   *
   * @param {string} methodName
   * @param {object} args
   * @returns
   */
  protected callfn(methodName: string, args: any) {
    if (this[methodName as keyof GameBasics] !== undefined) {
      console.log('Calling ' + methodName, args);
      return this[methodName as keyof GameBasics](args);
    }
    return undefined;
  }

  // XXX: @kelleyk addition
  protected triggerUpdateActionButtons() {
    this.updatePageTitle();
  }
}
