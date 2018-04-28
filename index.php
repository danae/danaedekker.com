<?php
require("vendor/autoload.php");
require("settings.php");

use Feather\Feather;
use Feather\Page;
use Soundcloud\Soundcloud;

// Create a SoundCloud wrapper
$soundcloud = new Soundcloud($soundcloudId,$soundcloudSecret);

// Create the context
$feather = new Feather('assets/templates');

// Add pages
$feather->addPage(new Page('compositions'));
$feather->addPage(new Page('projects'));
$feather->addPage(new Page('about'));
$feather->addPage(new Page('contact'));

// Set the error pages
$feather->setErrorPage(new Page('500'));
$feather->setNotFoundPage(new Page('404'));

// Run!
$feather->run([
  'root' => Feather::rootPath(),
  'assets' => Feather::rootPath() . '/assets',
  'soundcloud' => $soundcloud,
  'links' => [
    'email' => 'mailto:info@dennisdekker.art',
    'spotify' => 'https://open.spotify.com/artist/26zydGirRGiAVUaWRR0Wvt?si=mp5rMhmAR5qQ11ypBLJevw',
    'soundcloud' => 'https://soundcloud.com/purplelum',
    'github' => 'https://github.com/dengsn',
    'facebook' => 'https://www.facebook.com/purplelum'
  ],
  'projects' => [
    'our_little_planet' => 'http://perspectiveworks.nl/OLP/public/',
    'blue_moon' => [    
      'spotify' => 'https://open.spotify.com/album/759u3tjG0t3Fkkycxd9SNC?si=fEArNvEiRMOxaILlXakgJg',
      'deezer' => 'https://www.deezer.com/nl/album/59655342',
      'soundcloud' => 'https://soundcloud.com/purplelum/sets/blue-moon'
    ]
  ]
]);