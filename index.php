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
$feather->pages->add('projects/colors-of-the-night', ['title' => 'Colors of the Night', 'visible' => false]);
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
    'resume' => $feather->base_path . '/publications/Danae_Dekker_CV_2020.pdf',
    'linkedin' => 'https://linkedin.com/in/danaedekker/',
    'facebook' => 'https://www.facebook.com/purplelum',
    'twitter' => 'https://twitter.com/da___nae',
    'spotify' => 'https://open.spotify.com/artist/26zydGirRGiAVUaWRR0Wvt?si=mp5rMhmAR5qQ11ypBLJevw',
    'github' => 'https://github.com/danae',
    'soundcloud' => 'https://soundcloud.com/purplelum',
  ],
  'projects' => [
    'invisible_wings' => [
      'embed' => 'https://www.youtube.com/embed/UB10AQidnxM',
      'link' => 'https://invisiblewingsgame.com/'
    ],
    'ocarime' => [
      'image' => $feather->base_path . '/assets/images/splash_ocarime.png',
      'link' => 'https://ocarime.com/'
    ],
    'ocarime_the_game' => [
      'embed' => 'https://www.youtube.com/embed/9VKsWIVDf7M',
      'link' => 'https://beta.ocarime.com/'
    ],
    'thesis' => [
      'read' => $feather->base_path . '/publications/Nonlinear_music_design_in_narrative_games.pdf'
    ],
    'colors_of_the_night' => [
      'image' => $feather->base_path . '/assets/images/splash_colors_of_the_night.png',
      'upc' => '5057917496902',
      'spotify' => 'https://open.spotify.com/album/6B7otGMfr7Hjhnhyhfj9km?si=hc_okt74TuaHvOrb7D-niA',
      'google' => 'https://play.google.com/store/music/album/Purple_Lum_Colors_of_the_Night?id=Bxd5htrwefg5z6wav7ntudxlzt4',
      'soundcloud' => 'https://soundcloud.com/purplelum/sets/colors-of-the-night'
    ],
    'exodus_burned' => [
      'embed' => 'https://www.youtube.com/embed/alquMRfFrSY',
      'link' => 'http://www.exodusburned.com/'
    ],
    'paper' => [
      'read' => $feather->base_path . '/publications/Implementatie_van_game_audio_in_Unity.pdf'
    ],
    'room_of_doom' => [
      'embed' => 'https://www.youtube.com/embed/2XK3Vkecf1A'
    ],
    'blue_moon' => [
      'image' => $feather->base_path . '/assets/images/splash_blue_moon.png',
      'upc' => '5057728398730',
      'spotify' => 'https://open.spotify.com/album/759u3tjG0t3Fkkycxd9SNC?si=fEArNvEiRMOxaILlXakgJg',
      'google' => 'https://play.google.com/store/music/album/Purple_Lum_Blue_Moon?id=Bzv3vvd7cbp24dpugxg5odcrta4',
      'soundcloud' => 'https://soundcloud.com/purplelum/sets/blue-moon'
    ]
  ]
];

// Run!
$feather->run();
