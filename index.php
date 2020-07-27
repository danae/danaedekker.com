<?php
require("vendor/autoload.php");
require("settings.php");

use Danae\Feather\Feather;
use Danae\Soundcloud\Soundcloud;

// Create the context
$feather = new Feather();

// Add pages
$feather->pages->add('compositions', ['default' => true]);
$feather->pages->add('projects');
$feather->pages->add('about');
$feather->pages->add('contact');

// Add error pages
$feather->pages->addErrorPage(['template' => 'errors/500']);
$feather->pages->addNotFoundPage(['template' => 'errors/404']);

// Create the SoundCloud client
$soundcloud = new Soundcloud([
  'client_id' => $soundcloudId,
  'client_secret' => $soundcloudSecret,
  'username' => $soundcloudUsername,
  'password' => $soundcloudPassword
]);

// Create context
$feather->context = [
  'assets' => $feather->base_path . '/assets',
  'soundcloud' => $soundcloud,
  'links' => [
    'resume' => $feather->base_path . '/publications/Danae_Dekker_CV_2019.pdf',
    'linkedin' => 'https://linkedin.com/in/danaedekker/',
    'facebook' => 'https://www.facebook.com/purplelum',
    'spotify' => 'https://open.spotify.com/artist/26zydGirRGiAVUaWRR0Wvt?si=mp5rMhmAR5qQ11ypBLJevw',
    'github' => 'https://github.com/danae',
    'soundcloud' => 'https://soundcloud.com/purplelum',
  ],
  'projects' => [
    'colors_of_the_night' => [
      'image' => $feather->base_path . '/assets/images/projects/colors_of_the_night_cover_1024x1024.png',
      'upc' => '5057917496902',
      'spotify' => 'https://open.spotify.com/album/6B7otGMfr7Hjhnhyhfj9km?si=hc_okt74TuaHvOrb7D-niA',
      'deezer' => '#',
      'napster' => '#',
      'google' => 'https://play.google.com/store/music/album/Purple_Lum_Colors_of_the_Night?id=Bxd5htrwefg5z6wav7ntudxlzt4',
      'soundcloud' => 'https://soundcloud.com/purplelum/sets/colors-of-the-night'
    ],
    'exodus_burned' => [
      'image' => $feather->base_path . '/assets/images/projects/exodus_burned.png',
      'link' => 'http://www.exodusburned.com/'
    ],
    'paper' => [
      'image' => $feather->base_path . '/assets/images/projects/paper.png',
      'link' => $feather->base_path . '/publications/Implementatie_van_game_audio_in_Unity.pdf'
    ],
    'stackgriculture' => [
      'image' => $feather->base_path . '/assets/images/projects/stackgriculture.png',
    ],
    'room_of_doom' => [
      'image' => $feather->base_path . '/assets/images/projects/room_of_doom.png'
    ],
    'our_little_planet' => [
      'image' => $feather->base_path . '/assets/images/projects/our_little_planet.png'
    ],
    'blue_moon' => [
      'image' => $feather->base_path . '/assets/images/projects/blue_moon_cover_1024x1024.png',
      'upc' => '5057728398730',
      'spotify' => 'https://open.spotify.com/album/759u3tjG0t3Fkkycxd9SNC?si=fEArNvEiRMOxaILlXakgJg',
      'deezer' => 'https://www.deezer.com/nl/album/59655342',
      'napster' => 'https://napster.com/artist/purple-lum/album/blue-moon-305523881',
      'google' => 'https://play.google.com/store/music/album/Purple_Lum_Blue_Moon?id=Bzv3vvd7cbp24dpugxg5odcrta4',
      'soundcloud' => 'https://soundcloud.com/purplelum/sets/blue-moon'
    ]
  ]
];

// Run!
$feather->run();
