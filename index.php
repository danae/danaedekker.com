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
    'resume' => $feather['document_root'] . 'publications/Dennis_Dekker_CV_2018.pdf',
    'linkedin' => 'https://linkedin.com/in/danae-dekker-b3b902189/',
    'facebook' => 'https://www.facebook.com/purplelum',
    'spotify' => 'https://open.spotify.com/artist/26zydGirRGiAVUaWRR0Wvt?si=mp5rMhmAR5qQ11ypBLJevw',
    'github' => 'https://github.com/dengsn',
    'soundcloud' => 'https://soundcloud.com/purplelum',
  ],
  'projects' => [
    'colors_of_the_night' => [
      'image' => $feather['document_root'] . '/assets/images/projects/colors_of_the_night_cover_1024x1024.png',
      'upc' => '5057917496902',
      'spotify' => '#',
      'deezer' => '#',
      'napster' => '#',
      'google' => '#',
      'soundcloud' => '#'
    ],
    'exodus_burned' => [
      'image' => $feather['document_root'] . '/assets/images/projects/exodus_burned.png',
      'link' => 'http://www.exodusburned.com/'
    ],
    'paper' => [
      'image' => $feather['document_root'] . '/assets/images/projects/paper.png',
      'link' => $feather['document_root'] . '/publications/Implementatie_van_game_audio_in_Unity.pdf'
    ],
    'stackgriculture' => [
      'image' => $feather['document_root'] . '/assets/images/projects/stackgriculture.png',
    ],
    'room_of_doom' => [
      'image' => $feather['document_root'] . '/assets/images/projects/room_of_doom.png'
    ],
    'our_little_planet' => [
      'image' => $feather['document_root'] . '/assets/images/projects/our_little_planet.png'
    ],
    'blue_moon' => [
      'image' => $feather['document_root'] . '/assets/images/projects/blue_moon_cover_1024x1024.png',
      'upc' => '5057728398730',
      'spotify' => 'https://open.spotify.com/album/759u3tjG0t3Fkkycxd9SNC?si=fEArNvEiRMOxaILlXakgJg',
      'deezer' => 'https://www.deezer.com/nl/album/59655342',
      'napster' => 'https://napster.com/artist/purple-lum/album/blue-moon-305523881',
      'soundcloud' => 'https://soundcloud.com/purplelum/sets/blue-moon'
    ]
  ]
];

// Run!
$feather->run();
