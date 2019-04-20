<?php
require("vendor/autoload.php");
require("settings.php");

use Feather\Feather;
use Feather\Backend\FilesystemBackend;
use Feather\Pages\Page;
use Soundcloud\Soundcloud;

// Create the context
$feather = new Feather();

// Add pages
$feather->add('compositions', ['default' => true]);
$feather->add('projects');
$feather->add('about');
$feather->add('contact');

// Add error pages
$feather->errorPage('500');
$feather->notFoundPage('404');

// Create a SoundCloud wrapper
$soundcloud = new Soundcloud($soundcloudId, $soundcloudSecret);

// Create links
$feather['context'] = [
  'assets' => $feather['document_root'] . '/assets',
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
];

// Run!
$feather->run();
