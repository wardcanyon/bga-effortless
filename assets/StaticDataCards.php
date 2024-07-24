<?php declare(strict_types=1);

const CARD_METADATA = [
    'attr_str_1' => ['title' => clienttranslate('Strength +1')],
    'attr_dex_1' => ['title' => clienttranslate('Dexterity +1')],
    'attr_con_1' => ['title' => clienttranslate('Constitution +1')],
    'attr_wis_1' => ['title' => clienttranslate('Wisdom +1')],
    'attr_int_1' => ['title' => clienttranslate('Intelligence +1')],
    'attr_cha_1' => ['title' => clienttranslate('Charisma +1')],
    'attr_str_2' => ['title' => clienttranslate('Strength +2')],
    'attr_dex_2' => ['title' => clienttranslate('Dexterity +2')],
    'attr_con_2' => ['title' => clienttranslate('Constitution +2')],
    'attr_wis_2' => ['title' => clienttranslate('Wisdom +2')],
    'attr_int_2' => ['title' => clienttranslate('Intelligence +2')],
    'attr_cha_2' => ['title' => clienttranslate('Charisma +2')],
    'item_1' => [
        'item_no' => 1,
        'title' => clienttranslate('Silver Sword'),
        'points' => 8,
        'requires' => ['str' => 5],
    ],
    'item_2' => [
        'item_no' => 2,
        'title' => clienttranslate('Compact Crossbow'),
        'points' => 8,
        'requires' => ['dex' => 5],
    ],
    'item_3' => [
        'item_no' => 3,
        'title' => clienttranslate('Poison Antidote'),
        'points' => 8,
        'requires' => ['con' => 5],
    ],
    'item_4' => [
        'item_no' => 4,
        'title' => clienttranslate('Binding Rope'),
        'points' => 8,
        'requires' => ['int' => 5],
    ],
    'item_5' => [
        'item_no' => 5,
        'title' => clienttranslate('Phantom Lantern'),
        'points' => 8,
        'requires' => ['wis' => 5],
    ],
    'item_6' => [
        'item_no' => 6,
        'title' => clienttranslate('Loaded Dice'),
        'points' => 8,
        'requires' => ['cha' => 5],
    ],
    'item_7' => [
        'item_no' => 7,
        'title' => clienttranslate('Handy Cannon'),
        'points' => 6,
        'requires' => ['str' => 3, 'dex' => 3],
    ],
    'item_8' => [
        'item_no' => 8,
        'title' => clienttranslate('Reflective Shield'),
        'points' => 6,
        'requires' => ['wis' => 3, 'int' => 3],
    ],
    'item_9' => [
        'item_no' => 9,
        'title' => clienttranslate('Awakened Artifact'),
        'points' => 6,
        'requires' => ['con' => 3, 'cha' => 3],
    ],
    'item_10' => [
        'item_no' => 10,
        'title' => clienttranslate('Wooden Stake'),
        'points' => 4,
        'requires' => ['str' => 2, 'cha' => 2],
    ],
    'item_11' => [
        'item_no' => 11,
        'title' => clienttranslate('Glacial Spear'),
        'points' => 4,
        'requires' => ['str' => 2, 'int' => 2],
    ],
    'item_12' => [
        'item_no' => 12,
        'title' => clienttranslate('Sea Trident'),
        'points' => 4,
        'requires' => ['str' => 2, 'wis' => 2],
    ],
    'item_13' => [
        'item_no' => 13,
        'title' => clienttranslate('Iron Horseshoes'),
        'points' => 4,
        'requires' => ['str' => 2, 'int' => 2],
    ],
    'item_14' => [
        'item_no' => 14,
        'title' => clienttranslate('Holy Water'),
        'points' => 4,
        'requires' => ['dex' => 2, 'con' => 2],
    ],
    'item_15' => [
        'item_no' => 15,
        'title' => clienttranslate('Explosive Trap'),
        'points' => 4,
        'requires' => ['dex' => 2, 'int' => 2],
    ],
    'item_16' => [
        'item_no' => 16,
        'title' => clienttranslate('Woven Net'),
        'points' => 4,
        'requires' => ['dex' => 2, 'wis' => 2],
    ],
    'item_17' => [
        'item_no' => 17,
        'title' => clienttranslate('Hypnotic Flute'),
        'points' => 4,
        'requires' => ['dex' => 2, 'cha' => 2],
    ],
    'item_18' => [
        'item_no' => 18,
        'title' => clienttranslate('Crystal Goggles'),
        'points' => 4,
        'requires' => ['con' => 2, 'int' => 2],
    ],
    'item_19' => [
        'item_no' => 19,
        'title' => clienttranslate('Burning Torch'),
        'points' => 4,
        'requires' => ['con' => 2, 'wis' => 2],
    ],
    'item_20' => [
        'item_no' => 20,
        'title' => clienttranslate('Music Box'),
        'points' => 4,
        'requires' => ['con' => 2, 'int' => 2],
    ],
    'item_21' => [
        'item_no' => 21,
        'title' => clienttranslate('Cheese Wheel'),
        'points' => 4,
        'requires' => ['wis' => 2, 'cha' => 2],
    ],
    'armor_mage_head' => [
        'card_group' => 'armor',
        'armor_set' => 'mage',
        'armor_slot' => 'head',
        'title' => clienttranslate('Armor: mage head'),
    ],
    'armor_mage_chest' => [
        'card_group' => 'armor',
        'armor_set' => 'mage',
        'armor_slot' => 'chest',
        'title' => clienttranslate('Armor: mage chest'),
    ],
    'armor_mage_hands' => [
        'card_group' => 'armor',
        'armor_set' => 'mage',
        'armor_slot' => 'hands',
        'title' => clienttranslate('Armor: mage hands'),
    ],
    'armor_mage_feet' => [
        'card_group' => 'armor',
        'armor_set' => 'mage',
        'armor_slot' => 'feet',
        'title' => clienttranslate('Armor: mage feet'),
    ],
    'armor_plate_head' => [
        'card_group' => 'armor',
        'armor_set' => 'plate',
        'armor_slot' => 'head',
        'title' => clienttranslate('Armor: plate head'),
    ],
    'armor_plate_chest' => [
        'card_group' => 'armor',
        'armor_set' => 'plate',
        'armor_slot' => 'chest',
        'title' => clienttranslate('Armor: plate chest'),
    ],
    'armor_plate_hands' => [
        'card_group' => 'armor',
        'armor_set' => 'plate',
        'armor_slot' => 'hands',
        'title' => clienttranslate('Armor: plate hands'),
    ],
    'armor_plate_feet' => [
        'card_group' => 'armor',
        'armor_set' => 'plate',
        'armor_slot' => 'feet',
        'title' => clienttranslate('Armor: plate feet'),
    ],
    'armor_leather_head' => [
        'card_group' => 'armor',
        'armor_set' => 'leather',
        'armor_slot' => 'head',
        'title' => clienttranslate('Armor: leather head'),
    ],
    'armor_leather_chest' => [
        'card_group' => 'armor',
        'armor_set' => 'leather',
        'armor_slot' => 'chest',
        'title' => clienttranslate('Armor: leather chest'),
    ],
    'armor_leather_hands' => [
        'card_group' => 'armor',
        'armor_set' => 'leather',
        'armor_slot' => 'hands',
        'title' => clienttranslate('Armor: leather hands'),
    ],
    'armor_leather_feet' => [
        'card_group' => 'armor',
        'armor_set' => 'leather',
        'armor_slot' => 'feet',
        'title' => clienttranslate('Armor: leather feet'),
    ],
    'armor_obsidian_head' => [
        'card_group' => 'armor',
        'armor_set' => 'obsidian',
        'armor_slot' => 'head',
        'title' => clienttranslate('Armor: obsidian head'),
    ],
    'armor_obsidian_chest' => [
        'card_group' => 'armor',
        'armor_set' => 'obsidian',
        'armor_slot' => 'chest',
        'title' => clienttranslate('Armor: obsidian chest'),
    ],
    'armor_obsidian_hands' => [
        'card_group' => 'armor',
        'armor_set' => 'obsidian',
        'armor_slot' => 'hands',
        'title' => clienttranslate('Armor: obsidian hands'),
    ],
    'armor_obsidian_feet' => [
        'card_group' => 'armor',
        'armor_set' => 'obsidian',
        'armor_slot' => 'feet',
        'title' => clienttranslate('Armor: obsidian feet'),
    ],
    'armor_scale_head' => [
        'card_group' => 'armor',
        'armor_set' => 'scale',
        'armor_slot' => 'head',
        'title' => clienttranslate('Armor: scale head'),
    ],
    'armor_scale_chest' => [
        'card_group' => 'armor',
        'armor_set' => 'scale',
        'armor_slot' => 'chest',
        'title' => clienttranslate('Armor: scale chest'),
    ],
    'armor_scale_hands' => [
        'card_group' => 'armor',
        'armor_set' => 'scale',
        'armor_slot' => 'hands',
        'title' => clienttranslate('Armor: scale hands'),
    ],
    'armor_scale_feet' => [
        'card_group' => 'armor',
        'armor_set' => 'scale',
        'armor_slot' => 'feet',
        'title' => clienttranslate('Armor: scale feet'),
    ],
    'armor_assassin_head' => [
        'card_group' => 'armor',
        'armor_set' => 'assassin',
        'armor_slot' => 'head',
        'title' => clienttranslate('Armor: assassin head'),
    ],
    'armor_assassin_chest' => [
        'card_group' => 'armor',
        'armor_set' => 'assassin',
        'armor_slot' => 'chest',
        'title' => clienttranslate('Armor: assassin chest'),
    ],
    'armor_assassin_hands' => [
        'card_group' => 'armor',
        'armor_set' => 'assassin',
        'armor_slot' => 'hands',
        'title' => clienttranslate('Armor: assassin hands'),
    ],
    'armor_assassin_feet' => [
        'card_group' => 'armor',
        'armor_set' => 'assassin',
        'armor_slot' => 'feet',
        'title' => clienttranslate('Armor: assassin feet'),
    ],
    'xp' => ['title' => clienttranslate('Experience')],
    'grit' => ['title' => clienttranslate('Grit')],
];
