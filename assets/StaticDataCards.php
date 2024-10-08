<?php declare(strict_types=1);

define('CARD_METADATA', [
    'attr_str_1' => [
        'title' => clienttranslate('Strength +1'),
        'sort_weight' => 1,
    ],
    'attr_dex_1' => [
        'title' => clienttranslate('Dexterity +1'),
        'sort_weight' => 3,
    ],
    'attr_con_1' => [
        'title' => clienttranslate('Constitution +1'),
        'sort_weight' => 5,
    ],
    'attr_wis_1' => [
        'title' => clienttranslate('Wisdom +1'),
        'sort_weight' => 7,
    ],
    'attr_int_1' => [
        'title' => clienttranslate('Intelligence +1'),
        'sort_weight' => 9,
    ],
    'attr_cha_1' => [
        'title' => clienttranslate('Charisma +1'),
        'sort_weight' => 11,
    ],
    'attr_str_2' => [
        'title' => clienttranslate('Strength +2'),
        'sort_weight' => 2,
    ],
    'attr_dex_2' => [
        'title' => clienttranslate('Dexterity +2'),
        'sort_weight' => 4,
    ],
    'attr_con_2' => [
        'title' => clienttranslate('Constitution +2'),
        'sort_weight' => 6,
    ],
    'attr_wis_2' => [
        'title' => clienttranslate('Wisdom +2'),
        'sort_weight' => 8,
    ],
    'attr_int_2' => [
        'title' => clienttranslate('Intelligence +2'),
        'sort_weight' => 10,
    ],
    'attr_cha_2' => [
        'title' => clienttranslate('Charisma +2'),
        'sort_weight' => 12,
    ],
    'item_1' => [
        'item_no' => 1,
        'title' => clienttranslate('Silver Sword'),
        'points' => 8,
        'requires' => ['str' => 5],
        'sort_weight' => 200,
    ],
    'item_2' => [
        'item_no' => 2,
        'title' => clienttranslate('Compact Crossbow'),
        'points' => 8,
        'requires' => ['dex' => 5],
        'sort_weight' => 201,
    ],
    'item_3' => [
        'item_no' => 3,
        'title' => clienttranslate('Poison Antidote'),
        'points' => 8,
        'requires' => ['con' => 5],
        'sort_weight' => 202,
    ],
    'item_4' => [
        'item_no' => 4,
        'title' => clienttranslate('Binding Rope'),
        'points' => 8,
        'requires' => ['int' => 5],
        'sort_weight' => 203,
    ],
    'item_5' => [
        'item_no' => 5,
        'title' => clienttranslate('Phantom Lantern'),
        'points' => 8,
        'requires' => ['wis' => 5],
        'sort_weight' => 204,
    ],
    'item_6' => [
        'item_no' => 6,
        'title' => clienttranslate('Loaded Dice'),
        'points' => 8,
        'requires' => ['cha' => 5],
        'sort_weight' => 205,
    ],
    'item_7' => [
        'item_no' => 7,
        'title' => clienttranslate('Handy Cannon'),
        'points' => 6,
        'requires' => ['str' => 3, 'dex' => 3],
        'sort_weight' => 206,
    ],
    'item_8' => [
        'item_no' => 8,
        'title' => clienttranslate('Reflective Shield'),
        'points' => 6,
        'requires' => ['wis' => 3, 'int' => 3],
        'sort_weight' => 207,
    ],
    'item_9' => [
        'item_no' => 9,
        'title' => clienttranslate('Awakened Artifact'),
        'points' => 6,
        'requires' => ['con' => 3, 'cha' => 3],
        'sort_weight' => 208,
    ],
    'item_10' => [
        'item_no' => 10,
        'title' => clienttranslate('Wooden Stake'),
        'points' => 4,
        'requires' => ['str' => 2, 'cha' => 2],
        'sort_weight' => 209,
    ],
    'item_11' => [
        'item_no' => 11,
        'title' => clienttranslate('Glacial Spear'),
        'points' => 4,
        'requires' => ['str' => 2, 'int' => 2],
        'sort_weight' => 210,
    ],
    'item_12' => [
        'item_no' => 12,
        'title' => clienttranslate('Sea Trident'),
        'points' => 4,
        'requires' => ['str' => 2, 'wis' => 2],
        'sort_weight' => 211,
    ],
    'item_13' => [
        'item_no' => 13,
        'title' => clienttranslate('Iron Horseshoes'),
        'points' => 4,
        'requires' => ['str' => 2, 'int' => 2],
        'sort_weight' => 212,
    ],
    'item_14' => [
        'item_no' => 14,
        'title' => clienttranslate('Holy Water'),
        'points' => 4,
        'requires' => ['dex' => 2, 'con' => 2],
        'sort_weight' => 213,
    ],
    'item_15' => [
        'item_no' => 15,
        'title' => clienttranslate('Explosive Trap'),
        'points' => 4,
        'requires' => ['dex' => 2, 'int' => 2],
        'sort_weight' => 214,
    ],
    'item_16' => [
        'item_no' => 16,
        'title' => clienttranslate('Woven Net'),
        'points' => 4,
        'requires' => ['dex' => 2, 'wis' => 2],
        'sort_weight' => 215,
    ],
    'item_17' => [
        'item_no' => 17,
        'title' => clienttranslate('Hypnotic Flute'),
        'points' => 4,
        'requires' => ['dex' => 2, 'cha' => 2],
        'sort_weight' => 216,
    ],
    'item_18' => [
        'item_no' => 18,
        'title' => clienttranslate('Crystal Goggles'),
        'points' => 4,
        'requires' => ['con' => 2, 'int' => 2],
        'sort_weight' => 217,
    ],
    'item_19' => [
        'item_no' => 19,
        'title' => clienttranslate('Burning Torch'),
        'points' => 4,
        'requires' => ['con' => 2, 'wis' => 2],
        'sort_weight' => 218,
    ],
    'item_20' => [
        'item_no' => 20,
        'title' => clienttranslate('Music Box'),
        'points' => 4,
        'requires' => ['con' => 2, 'int' => 2],
        'sort_weight' => 219,
    ],
    'item_21' => [
        'item_no' => 21,
        'title' => clienttranslate('Cheese Wheel'),
        'points' => 4,
        'requires' => ['wis' => 2, 'cha' => 2],
        'sort_weight' => 220,
    ],
    'armor_mage_head' => [
        'card_group' => 'armor',
        'armor_set' => 'mage',
        'armor_slot' => 'head',
        'sort_weight' => 100,
        'title' => clienttranslate('Armor: mage head'),
    ],
    'armor_mage_chest' => [
        'card_group' => 'armor',
        'armor_set' => 'mage',
        'armor_slot' => 'chest',
        'sort_weight' => 101,
        'title' => clienttranslate('Armor: mage chest'),
    ],
    'armor_mage_hands' => [
        'card_group' => 'armor',
        'armor_set' => 'mage',
        'armor_slot' => 'hands',
        'sort_weight' => 102,
        'title' => clienttranslate('Armor: mage hands'),
    ],
    'armor_mage_feet' => [
        'card_group' => 'armor',
        'armor_set' => 'mage',
        'armor_slot' => 'feet',
        'sort_weight' => 103,
        'title' => clienttranslate('Armor: mage feet'),
    ],
    'armor_plate_head' => [
        'card_group' => 'armor',
        'armor_set' => 'plate',
        'armor_slot' => 'head',
        'sort_weight' => 110,
        'title' => clienttranslate('Armor: plate head'),
    ],
    'armor_plate_chest' => [
        'card_group' => 'armor',
        'armor_set' => 'plate',
        'armor_slot' => 'chest',
        'sort_weight' => 111,
        'title' => clienttranslate('Armor: plate chest'),
    ],
    'armor_plate_hands' => [
        'card_group' => 'armor',
        'armor_set' => 'plate',
        'armor_slot' => 'hands',
        'sort_weight' => 112,
        'title' => clienttranslate('Armor: plate hands'),
    ],
    'armor_plate_feet' => [
        'card_group' => 'armor',
        'armor_set' => 'plate',
        'armor_slot' => 'feet',
        'sort_weight' => 113,
        'title' => clienttranslate('Armor: plate feet'),
    ],
    'armor_leather_head' => [
        'card_group' => 'armor',
        'armor_set' => 'leather',
        'armor_slot' => 'head',
        'sort_weight' => 120,
        'title' => clienttranslate('Armor: leather head'),
    ],
    'armor_leather_chest' => [
        'card_group' => 'armor',
        'armor_set' => 'leather',
        'armor_slot' => 'chest',
        'sort_weight' => 121,
        'title' => clienttranslate('Armor: leather chest'),
    ],
    'armor_leather_hands' => [
        'card_group' => 'armor',
        'armor_set' => 'leather',
        'armor_slot' => 'hands',
        'sort_weight' => 122,
        'title' => clienttranslate('Armor: leather hands'),
    ],
    'armor_leather_feet' => [
        'card_group' => 'armor',
        'armor_set' => 'leather',
        'armor_slot' => 'feet',
        'sort_weight' => 123,
        'title' => clienttranslate('Armor: leather feet'),
    ],
    'armor_obsidian_head' => [
        'card_group' => 'armor',
        'armor_set' => 'obsidian',
        'armor_slot' => 'head',
        'sort_weight' => 130,
        'title' => clienttranslate('Armor: obsidian head'),
    ],
    'armor_obsidian_chest' => [
        'card_group' => 'armor',
        'armor_set' => 'obsidian',
        'armor_slot' => 'chest',
        'sort_weight' => 131,
        'title' => clienttranslate('Armor: obsidian chest'),
    ],
    'armor_obsidian_hands' => [
        'card_group' => 'armor',
        'armor_set' => 'obsidian',
        'armor_slot' => 'hands',
        'sort_weight' => 132,
        'title' => clienttranslate('Armor: obsidian hands'),
    ],
    'armor_obsidian_feet' => [
        'card_group' => 'armor',
        'armor_set' => 'obsidian',
        'armor_slot' => 'feet',
        'sort_weight' => 133,
        'title' => clienttranslate('Armor: obsidian feet'),
    ],
    'armor_scale_head' => [
        'card_group' => 'armor',
        'armor_set' => 'scale',
        'armor_slot' => 'head',
        'sort_weight' => 140,
        'title' => clienttranslate('Armor: scale head'),
    ],
    'armor_scale_chest' => [
        'card_group' => 'armor',
        'armor_set' => 'scale',
        'armor_slot' => 'chest',
        'sort_weight' => 141,
        'title' => clienttranslate('Armor: scale chest'),
    ],
    'armor_scale_hands' => [
        'card_group' => 'armor',
        'armor_set' => 'scale',
        'armor_slot' => 'hands',
        'sort_weight' => 142,
        'title' => clienttranslate('Armor: scale hands'),
    ],
    'armor_scale_feet' => [
        'card_group' => 'armor',
        'armor_set' => 'scale',
        'armor_slot' => 'feet',
        'sort_weight' => 143,
        'title' => clienttranslate('Armor: scale feet'),
    ],
    'armor_assassin_head' => [
        'card_group' => 'armor',
        'armor_set' => 'assassin',
        'armor_slot' => 'head',
        'sort_weight' => 150,
        'title' => clienttranslate('Armor: assassin head'),
    ],
    'armor_assassin_chest' => [
        'card_group' => 'armor',
        'armor_set' => 'assassin',
        'armor_slot' => 'chest',
        'sort_weight' => 151,
        'title' => clienttranslate('Armor: assassin chest'),
    ],
    'armor_assassin_hands' => [
        'card_group' => 'armor',
        'armor_set' => 'assassin',
        'armor_slot' => 'hands',
        'sort_weight' => 152,
        'title' => clienttranslate('Armor: assassin hands'),
    ],
    'armor_assassin_feet' => [
        'card_group' => 'armor',
        'armor_set' => 'assassin',
        'armor_slot' => 'feet',
        'sort_weight' => 153,
        'title' => clienttranslate('Armor: assassin feet'),
    ],
    'threat_1' => [
        'threat_no' => 1,
        'weaknesses' => ['str', 'armor'],
        'title' => clienttranslate('Savage Werewolf'),
        'sort_weight' => 500,
    ],
    'threat_2' => [
        'threat_no' => 2,
        'weaknesses' => ['dex', 'armor'],
        'title' => clienttranslate('Soaring Griffin'),
        'sort_weight' => 501,
    ],
    'threat_3' => [
        'threat_no' => 3,
        'weaknesses' => ['con', 'armor'],
        'title' => clienttranslate('Beastly Manticore'),
        'sort_weight' => 502,
    ],
    'threat_4' => [
        'threat_no' => 4,
        'weaknesses' => ['int', 'armor'],
        'title' => clienttranslate('Towering Cyclops'),
        'sort_weight' => 503,
    ],
    'threat_5' => [
        'threat_no' => 5,
        'weaknesses' => ['wis', 'armor'],
        'title' => clienttranslate('Vengeful Wraith'),
        'sort_weight' => 504,
    ],
    'threat_6' => [
        'threat_no' => 6,
        'weaknesses' => ['cha', 'armor'],
        'title' => clienttranslate('Local Cheater'),
        'sort_weight' => 505,
    ],
    'threat_7' => [
        'threat_no' => 7,
        'weaknesses' => ['str', 'dex'],
        'title' => clienttranslate('Weathered Gargoyle'),
        'sort_weight' => 506,
    ],
    'threat_8' => [
        'threat_no' => 8,
        'weaknesses' => ['wis', 'int'],
        'title' => clienttranslate('Petrifying Gorgon'),
        'sort_weight' => 507,
    ],
    'threat_9' => [
        'threat_no' => 9,
        'weaknesses' => ['con', 'cha'],
        'title' => clienttranslate('Eldritch Cthulhu'),
        'sort_weight' => 508,
    ],
    'threat_10' => [
        'threat_no' => 10,
        'weaknesses' => ['str', 'cha'],
        'title' => clienttranslate('Bloodthirsty Vampire'),
        'sort_weight' => 509,
    ],
    'threat_11' => [
        'threat_no' => 11,
        'weaknesses' => ['str', 'int'],
        'title' => clienttranslate('Ooze Cube'),
        'sort_weight' => 510,
    ],
    'threat_12' => [
        'threat_no' => 12,
        'weaknesses' => ['str', 'wis'],
        'title' => clienttranslate('Abyssal Kraken'),
        'sort_weight' => 511,
    ],
    'threat_13' => [
        'threat_no' => 13,
        'weaknesses' => ['str', 'int'],
        'title' => clienttranslate('Lurking Kelpie'),
        'sort_weight' => 512,
    ],
    'threat_14' => [
        'threat_no' => 14,
        'weaknesses' => ['dex', 'con'],
        'title' => clienttranslate('Playful Imp'),
        'sort_weight' => 513,
    ],
    'threat_15' => [
        'threat_no' => 15,
        'weaknesses' => ['dex', 'int'],
        'title' => clienttranslate('Stone Golem'),
        'sort_weight' => 514,
    ],
    'threat_16' => [
        'threat_no' => 16,
        'weaknesses' => ['dex', 'wis'],
        'title' => clienttranslate('Screeching Harpy'),
        'sort_weight' => 515,
    ],
    'threat_17' => [
        'threat_no' => 17,
        'weaknesses' => ['dex', 'cha'],
        'title' => clienttranslate('Guardian Cerberus'),
        'sort_weight' => 516,
    ],
    'threat_18' => [
        'threat_no' => 18,
        'weaknesses' => ['con', 'int'],
        'title' => clienttranslate('Scaly Basilisk'),
        'sort_weight' => 517,
    ],
    'threat_19' => [
        'threat_no' => 19,
        'weaknesses' => ['con', 'wis'],
        'title' => clienttranslate('Giant Spider'),
        'sort_weight' => 518,
    ],
    'threat_20' => [
        'threat_no' => 20,
        'weaknesses' => ['con', 'int'],
        'title' => clienttranslate('Screaming Banshee'),
        'sort_weight' => 519,
    ],
    'threat_21' => [
        'threat_no' => 21,
        'weaknesses' => ['wis', 'cha'],
        'title' => clienttranslate('Rat Swarm'),
        'sort_weight' => 520,
    ],
    'class_elf' => [
        'title' => clienttranslate('Elf'),
        'sort_weight' => 1000,
        'attributes' => ['dex' => 2, 'con' => -2],
    ],
    'class_dwarf' => [
        'title' => clienttranslate('Dwarf'),
        'sort_weight' => 1001,
        'attributes' => ['wis' => -2, 'cha' => 2],
    ],
    'class_human' => [
        'title' => clienttranslate('Human'),
        'sort_weight' => 1002,
        'attributes' => [],
    ],
    'class_gnome' => [
        'title' => clienttranslate('Gnome'),
        'sort_weight' => 1003,
        'attributes' => ['dex' => -2, 'con' => 2],
    ],
    'class_goblin' => [
        'title' => clienttranslate('Goblin'),
        'sort_weight' => 1004,
        'attributes' => ['int' => 2, 'cha' => -2],
    ],
    'class_orc' => [
        'title' => clienttranslate('Orc'),
        'sort_weight' => 1005,
        'attributes' => ['str' => 2, 'int' => -2],
    ],
    'class_fairy' => [
        'title' => clienttranslate('Fairy'),
        'sort_weight' => 1006,
        'attributes' => ['str' => -2, 'int' => 2],
    ],
    'class_alchemist' => [
        'title' => clienttranslate('Alchemist'),
        'sort_weight' => 1100,
        'special_ability' =>
            'After the last turn of the game, before scoring, swap up to 3 of your cards with cards in the discard.',
    ],
    'class_artificer' => [
        'title' => clienttranslate('Artificer'),
        'sort_weight' => 1101,
        'special_ability' => 'You may use 2 Items per turn.',
    ],
    'class_barbarian' => [
        'title' => clienttranslate('Barbarian'),
        'sort_weight' => 1102,
        'special_ability' =>
            'Once per turn, you may discard 1 card to add +1 to your roll.',
    ],
    'class_bard' => [
        'title' => clienttranslate('Bard'),
        'sort_weight' => 1103,
        'special_ability' => 'When another player defeats a Threat, gain 1 XP.',
    ],
    'class_cleric' => [
        'title' => clienttranslate('Cleric'),
        'sort_weight' => 1104,
        'special_ability' =>
            'Once per turn, you may discard 1 card to heal 1 HP to any player.',
    ],
    'class_druid' => [
        'title' => clienttranslate('Druid'),
        'sort_weight' => 1105,
        'special_ability' =>
            'At the end of your turn, you may discard any number of cards, then draw that many cards.',
    ],
    'class_fighter' => [
        'title' => clienttranslate('Fighter'),
        'sort_weight' => 1106,
        'special_ability' => 'You have +1 max HP.',
    ],
    'class_merchant' => [
        'title' => clienttranslate('Merchant'),
        'sort_weight' => 1107,
        'special_ability' => 'At the start of your turn, gain 1 Gold.',
    ],
    'class_monk' => [
        'title' => clienttranslate('Monk'),
        'sort_weight' => 1108,
        'special_ability' => 'At the start of your turn, gain 1 Grit.',
    ],
    'class_necromancer' => [
        'title' => clienttranslate('Necromancer'),
        'sort_weight' => 1109,
        'special_ability' => 'When you use Grit, gain 1 additional Grit.',
    ],
    'class_paladin' => [
        'title' => clienttranslate('Paladin'),
        'sort_weight' => 1110,
        'special_ability' =>
            'Once per turn, you may spend 1 XP to add +2 to your roll.',
    ],
    'class_ranger' => [
        'title' => clienttranslate('Ranger'),
        'sort_weight' => 1111,
        'special_ability' =>
            'Once per turn, you may spend 1 Grit to draw 1 card.',
    ],
    'class_rogue' => [
        'title' => clienttranslate('Rogue'),
        'sort_weight' => 1112,
        'special_ability' => 'When you defeat a Threat, gain 1 Gold.',
    ],
    'class_wizard' => [
        'title' => clienttranslate('Wizard'),
        'sort_weight' => 1113,
        'special_ability' =>
            'At the start of your turn, draw 1 card, then discard 1 card.',
    ],
    'xp' => ['title' => clienttranslate('Experience'), 'sort_weight' => 300],
    'grit' => ['title' => clienttranslate('Grit'), 'sort_weight' => 301],
]);
