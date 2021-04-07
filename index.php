<?php
require("vendor/autoload.php");
require("settings.php");

use Danae\Feather\Feather;
use Danae\Soundcloud\Soundcloud;

// Create the context
$feather = new Feather();

// Add pages
$feather->pages->add('home', ['default' => true]);
$feather->pages->add('projects');
$feather->pages->add('commissions');
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
    'resume' => $feather->base_path . '/publications/Danae_Dekker_CV_2021.pdf',
    'commissions_tos' => $feather->base_path . '/publications/Personal_Music_Comissions_TOS.pdf',
    'dutch_tax_exemptions' => 'https://www.belastingdienst.nl/wps/wcm/connect/bldcontentnl/belastingdienst/zakelijk/btw/tarieven_en_vrijstellingen/vrijstellingen/vrijstelling_voor_componisten_schrijvers_cartoonisten_en_journalisten',
    'linkedin' => 'https://linkedin.com/in/danaedekker/',
    'facebook' => 'https://www.facebook.com/danaedekkergameaudio',
    'twitter' => 'https://twitter.com/da___nae',
    'linktree' => 'https://danae.link/'
  ],
  'projects' => [
    'invisible_wings' => [
      'square' => $feather->base_path . '/assets/images/square_invisible_wings.png',
      'embed' => 'https://www.youtube.com/embed/Zn5NWS1Zm7Q',
      'link' => 'https://invisiblewingsgame.com/',
      'steam' => 'https://store.steampowered.com/app/1419380/Invisible_Wings/',
      'itch' => 'https://audune.itch.io/invisiblewings'
    ],
    'fairy_lost' => [
      'square' => $feather->base_path . '/assets/images/square_fairy_lost.png',
      'embed' => 'https://www.youtube.com/embed/Y21QE7zzHJg',
      'itch' => 'https://coolcast.itch.io/fairy-lost',
      'soundcloud' => 'https://soundcloud.com/purplelum/fairy-lost-ost'
    ],
    'hope_remember' => [
      'square' => $feather->base_path . '/assets/images/square_hope_remember.png',
      'image' => $feather->base_path . '/assets/images/splash_hope_remember.png',
      'itch' => 'https://arzi.itch.io/hoperemember',
      'soundcloud' => 'https://soundcloud.com/purplelum/hope-remember'
    ],
    'ocarime' => [
      'square' => $feather->base_path . '/assets/images/square_ocarime.png',
      'image' => $feather->base_path . '/assets/images/splash_ocarime.png',
      'link' => 'https://ocarime.com/'
    ],
    'ocarime_the_game' => [
      'square' => $feather->base_path . '/assets/images/square_ocarime_the_game.png',
      'embed' => 'https://www.youtube.com/embed/9VKsWIVDf7M',
      'link' => 'https://beta.ocarime.com/'
    ],
    'colors_of_the_night' => [
      'square' => $feather->base_path . '/assets/images/square_colors_of_the_night.png',
      'image' => $feather->base_path . '/assets/images/splash_colors_of_the_night.png',
      'spotify' => 'https://open.spotify.com/album/6B7otGMfr7Hjhnhyhfj9km?si=hc_okt74TuaHvOrb7D-niA',
      'google' => 'https://music.youtube.com/playlist?list=OLAK5uy_k77U0wmpl2kGL3gHaKDSfaTA_KJodE-1c',
      'soundcloud' => 'https://soundcloud.com/purplelum/sets/colors-of-the-night'
    ],
    'exodus_burned' => [
      'square' => $feather->base_path . '/assets/images/square_exodus_burned.png',
      'embed' => 'https://www.youtube.com/embed/alquMRfFrSY',
      'link' => 'http://www.exodusburned.com/'
    ],
    'room_of_doom' => [
      'square' => $feather->base_path . '/assets/images/square_room_of_doom.png',
      'embed' => 'https://www.youtube.com/embed/2XK3Vkecf1A',
      'soundcloud' => 'https://soundcloud.com/purplelum/room-of-doom'
    ],
    'blue_moon' => [
      'square' => $feather->base_path . '/assets/images/square_blue_moon.png',
      'image' => $feather->base_path . '/assets/images/splash_blue_moon.png',
      'upc' => '5057728398730',
      'spotify' => 'https://open.spotify.com/album/759u3tjG0t3Fkkycxd9SNC?si=fEArNvEiRMOxaILlXakgJg',
      'google' => 'https://music.youtube.com/playlist?list=OLAK5uy_nuVhWZ0eLB_pLiHnvgAOiQlOZLIto_Vxw',
      'soundcloud' => 'https://soundcloud.com/purplelum/sets/blue-moon'
    ]
  ]
];

// Run!
$feather->run();
