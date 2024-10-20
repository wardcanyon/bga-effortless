<?php declare(strict_types=1);

namespace Effortless;

// XXX: For some reason, neither of these types of annotations work to address a PhanSuspiciousWeakTypeComparison
//   finding when we check if something is in DISABLED_SETTINGS.
//
// XXX: Oops, okay, Phan *is* emitting a warning to let us know when we write something it can't parse.  (This should have been "@phan-var-force", for example.)
//
// > PhanUnextractableAnnotation Saw unextractable annotation for comment '@phan-force-var string[] DISABLED_SETTINGS'
//
// It also appears that the string-literal syntax, at least, is not accepted for constants.  (The above example still doesn't work even when we fix the annotation's name!)

const BOT_SEAT_LABELS = ['Bot A', 'Bot B', 'Bot C', 'Bot D', 'Bot E'];

const STARTING_EFFORT_PROD = 20;
const STARTING_EFFORT_STUDIO = 1;

/** @var string[] */
const DISABLED_LOCATIONS = ['location:laboratory'];
// '@phan-var-force string[] DISABLED_LOCATIONS';

/** @var string[] */
const DISABLED_SETTINGS = [];
// '@phan-var-force string[] DISABLED_SETTINGS';
