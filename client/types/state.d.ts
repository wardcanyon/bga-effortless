// import type { BgaGamedatas } from './bga-gamedatas';

/** @gameSpecific Add game specific gamedatas arguments here. See {@link Gamedatas} for more information. */
interface Gamedatas extends BgaGamedatas {
  // [key: string | number]: Record<keyof any, any>; // Uncomment to remove type safety on game state arguments

  mutableBoardState: MutableBoardState;

  immutableBoardState: ImmutableBoardState;
}

// N.B.: Remember that the "_private" key is supported only in state args, and not in gamedatas.
interface PrivateState {
  // Cards that are visible to this player but that are not publicly visible.
  cards: { [cardId: number]: Card };
}

interface ImmutableBoardState {
  players: { [playerId: string]: PlayerPublic };
  // XXX: Do we need `playersPrivate`?
}

interface GameStates {
  // [id: number]: string | { name: string, argsType: object} | any; // Uncomment to remove type safety with ids, names, and arguments for game states
}

interface MutableBoardState {
  // players/seats (incl. which are human and which are bots)

  seats: { [seatId: number]: SeatPublic };
  cards: { [cardId: number]: Card };
  locations: { [locationId: number]: EffortlessLocation };
  settings: { [settingId: number]: EffortlessSetting };
  effortPiles: { [pileId: number]: EffortPile };

  // cards
  // locations
  // settings

  // seatsPrivate: { [seatId: number]: PrivateSeatState };

  // tableConfig: TableConfig;

  // setlocs: { [setlocId: number]: SetlocState };
}

interface TableConfig {
  // XXX: cooperative/competitive?
  // XXX: which expansions are enabled?
}

// type CardState = 'FACEUP' | 'FACEDOWN';

// This is a `WcLib\CardBase`.
interface CardBase {
  id: number;

  location: string;
  sublocation: string;
  sublocationIndex: number;
  order: number;
  cardType: string | undefined;
  cardTypeGroup: string | undefined;
}

interface EffortlessLocation extends CardBase {
  effort: { [seatId: number]: number };
}

interface EffortlessSetting extends CardBase {
  // If true, sort effort piles here lowest-to-highest rather than highest-to-lowest.
  sortPilesInverted: boolean;
}

// This is an Effortless "main-deck card".
interface Card extends CardBase {
  // state: CardState;

  // These properties are set iff `state == "FACEUP"`.
  cardTypeStem: string | undefined;

  // N.B.: These are not the same thing; for example, a card can be "face down", but still visible to a player who is
  // being allowed to select among multiple face-down cards.
  faceDown: boolean;
  visible: boolean;

  // attribute cards
  stat: string | undefined;
  points: number | undefined;

  // armor cards
  armorSet: string | undefined;
  armorPiece: string | undefined;

  // item cards
  itemNo: number | undefined;
}

interface EffortPile {
  id: number;
  seatId: number;
  locationId: number | null;
  qty: number;

  // True iff this pile will lead to the seat that owns it gaining or losing points; this is used to highlight those
  // piles in the UI.
  scoring: boolean;
}

// interface SetlocState {
//   setlocId: number; // 0-5
//
//   settingId: string;
//   locationId: string;
//   effort: { [seatId: number]: number }; // XXX: This won't support Laboratory, which has sub-locations.
//   cards: Card[];
// }

// XXX: Whenever possible, things should go in the `SeatPublic` type instead.
interface PlayerPublic {
  id: string;
  no: number;
  name: string;
  color: string;
}

interface SeatBase {
  id: number;
  playerId: string | undefined; // Set iff there is a human player controlling this seat.
  seatColor: string;
  seatLabel: string;
}

// Sent to all players in all modes.
interface SeatPublic extends SeatBase {
  colorName: string;
}

// XXX: Need to decide if we are going to use this, and then revise this comment accordingly.
//
// Sent only to players about themselves in competitive mode; sent to all players in cooperative mode.
interface SeatPrivate {
  id: number;

  hand: Card[];
}

interface InputArgs {
  description: string;
  descriptionmyturn: string;
  cancellable: boolean;
  choices: any; // XXX: but always an array of int IDs so far?
  inputType: string;

  // For inputType=="inputtype:card" only, one of "inPlay", "fromPrompt", "fromHand"; see "ParameterInput.php" for
  // details.
  selectionType: string | undefined;
}

interface TableScoring {
  bySeat: { [seatId: number]: SeatScoring };
}

interface SeatScoring {
  // Map from attribute abbreviation to score.
  attribute: { [attr: string]: number };

  // Detailed information on the number of cards and points for each attribute that the seat has.
  attributeData: SeatScoringAttributeData;

  // Map from set name to score.
  armor: { [setName: string]: number };

  // Map from card ID to score; score will be 0 if the seat does not have the `attributes` to utilize the item.
  item: { [cardId: number]: number };

  // Metadata for the cards in `items`.  This lets us map card IDs to types, and that lets us fetch static metadata such
  // as card titles.
  itemCards: { [cardId: number]: Card };

  // Map from location ID (yes, location ID, not setting ID) to the score from the corresponding setting.
  setting: { [locationId: number]: number };

  // The total score for this seat.
  total: number;

  // Where the seat ranked against the others; 1 is first place.
  place: number;
}

interface SeatScoringAttributeData {
  cards: { [attr: string]: number };
  points: { [attr: string]: number };
}
