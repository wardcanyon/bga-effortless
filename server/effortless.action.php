<?php

// WARNING: THIS FILE HAS BEEN AUTOMATICALLY GENERATED. ANY CHANGES MADE DIRECTLY MAY BE OVERWRITTEN.

/**
  @phan-file-suppress PhanUndeclaredMethod

  XXX: TODO: This is a temporary way to deal with Phan errors related to the `onAct*()` members of Effortless not
  being picked up.
*/

class action_effortless extends APP_GameAction
{
  // XXX: Should these be moved to `APP_GameAction`?

  /** @var Effortless $game */
  public $game; // Enforces functions exist on Table class

  public $view;
  public $viewArgs;

  // Constructor: please do not modify
  public function __default()
  {
    if (self::isArg('notifwindow')) {
      $this->view = 'common_notifwindow';
      $this->viewArgs['table'] = self::getArg('table', AT_posint, true);
    } else {
      $this->view = 'effortless_effortless';
      self::trace('Complete reinitialization of board game');
    }
  }

  public function actSelectInput(): void
  {
    $this->game->debug('------[ ACTION: actSelectInput ]--------');
    $this->game->debug('[PARAMINPUT] ' . $this->game->paramInput_dumpState($this->game->world()));

    self::setAjaxMode();

    $selection = self::getArg('selection', AT_json, /*mandatory=*/ true);
    $this->game->onActSelectInput($selection);

    self::ajaxResponse();
  }

  public function actGetDiscardPile(): void
  {
    self::setAjaxMode();
    $this->game->onActGetDiscardPile();
    self::ajaxResponse();
  }

  // public function playCard()
  // {
  //   self::setAjaxMode();

  //   /** @var int $card_id */
  //   $card_id = self::getArg('card_id', AT_int, true);

  //   $this->game->playCard($card_id);
  //   self::ajaxResponse();
  // }

  // public function pass()
  // {
  //   self::setAjaxMode();

  //   $this->game->pass();
  //   self::ajaxResponse();
  // }
}
