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
$soundcloud = new Soundcloud(['client_id' => null]);

// Create context
$feather->context = [
  'assets' => $feather->base_path . '/assets',
  'soundcloud' => $soundcloud,
  'links' => [
    'soundcloud' => 'https://soundcloud.com/purplelum',
    'spotify_danaedekker' => 'https://open.spotify.com/artist/0bta46UUaupzYcrrhG3yRQ',
    'spotify_purplelum' => 'https://open.spotify.com/artist/26zydGirRGiAVUaWRR0Wvt',
    'deezer_danaedekker' => 'https://www.deezer.com/nl/artist/124460692',
    'deezer_purplelum' => 'https://www.deezer.com/nl/artist/14398631',
    'bandcamp' => 'https://danaedekker.bandcamp.com/',
    'twitter' => 'https://twitter.com/da___nae',
    'facebook' => 'https://www.facebook.com/danaedekkergameaudio',
    'linkedin' => 'https://linkedin.com/in/danaedekker/',
    'linktree' => 'https://danae.link/'
  ],
  'home' => [
    'showreel_embed' => 'https://www.youtube.com/embed/Ox1CHWTb3Vk'
  ],
  'compositions' => [
    'mirrors' => 'https://soundcloud.com/purplelum/mirrors',
    'ocean_of_stars' => 'https://soundcloud.com/purplelum/ocean-of-stars',
    'entanglement' => 'https://soundcloud.com/purplelum/entanglement',
    'once_in_a_blue_moon' => 'https://soundcloud.com/purplelum/once-in-a-blue-moon-2020-remastered',
    'we_in_heaven' => 'https://soundcloud.com/purplelum/we-in-heaven-2020-remix'
  ],
  'projects' => [
    'starcrossed' => [
      'square' => $feather->base_path . '/assets/images/square_starcrossed.png',
      'image' => $feather->base_path . '/assets/images/splash_starcrossed.png',
      'bandcamp' => 'https://danaedekker.bandcamp.com/album/starcrossed'
    ],
    'ignis_universia' => [
      'square' => $feather->base_path . '/assets/images/square_ignis_universia.png',
      'embed' => 'https://www.youtube.com/embed/IiCshDIDKjM',
      'website' => 'https://ignisuniversia.com/',
      'steam' => 'https://store.steampowered.com/app/1545500/Ignis_Universia_Awakening_of_the_Erudite_Empress/',
      'soundcloud' => 'https://soundcloud.com/ignisuniversia'
    ],
    'invisible_wings' => [
      'square' => $feather->base_path . '/assets/images/square_invisible_wings.png',
      'embed' => 'https://www.youtube.com/embed/Zn5NWS1Zm7Q',
      'website' => 'https://invisiblewingsgame.com/',
      'steam' => 'https://store.steampowered.com/app/1419380/Invisible_Wings/',
      'itch' => 'https://audune.itch.io/invisiblewings'
    ],
    'fairy_lost' => [
      'square' => $feather->base_path . '/assets/images/square_fairy_lost.png',
      'embed' => 'https://www.youtube.com/embed/Y21QE7zzHJg',
      'itch' => 'https://coolcast.itch.io/fairy-lost',
      'bandcamp' => 'https://danaedekker.bandcamp.com/track/fairy-lost-original-game-soundtrack',
      'soundcloud' => 'https://soundcloud.com/purplelum/fairy-lost-ost'
    ],
    'hope_remember' => [
      'square' => $feather->base_path . '/assets/images/square_hope_remember.png',
      'image' => $feather->base_path . '/assets/images/splash_hope_remember.png',
      'itch' => 'https://arzi.itch.io/hoperemember',
      'soundcloud' => 'https://soundcloud.com/purplelum/hope-remember'
    ],
    'colors_of_the_night' => [
      'square' => $feather->base_path . '/assets/images/square_colors_of_the_night.png',
      'image' => $feather->base_path . '/assets/images/splash_colors_of_the_night.png',
      'bandcamp' => 'https://danaedekker.bandcamp.com/album/colors-of-the-night',
      'soundcloud' => 'https://soundcloud.com/purplelum/sets/colors-of-the-night'
    ],
    'exodus_burned' => [
      'square' => $feather->base_path . '/assets/images/square_exodus_burned.png',
      'embed' => 'https://www.youtube.com/embed/alquMRfFrSY',
      'link' => 'http://www.exodusburned.com/'
    ],
    'blue_moon' => [
      'square' => $feather->base_path . '/assets/images/square_blue_moon.png',
      'image' => $feather->base_path . '/assets/images/splash_blue_moon.png',
      'bandcamp' => 'https://danaedekker.bandcamp.com/album/blue-moon',
      'soundcloud' => 'https://soundcloud.com/purplelum/sets/blue-moon'
    ]
  ],
  'commissions' => [
    'tos' => $feather->base_path . '/publications/Personal_Music_Comissions_TOS.pdf',
    'dutch_tax_exemptions' => 'https://www.belastingdienst.nl/wps/wcm/connect/bldcontentnl/belastingdienst/zakelijk/btw/tarieven_en_vrijstellingen/vrijstellingen/vrijstelling_voor_componisten_schrijvers_cartoonisten_en_journalisten',
  ],
  'about' => [
    'thesis' => $feather->base_path . '/publications/Nonlinear_music_design_in_narrative_games.pdf',
    'resume' => $feather->base_path . '/publications/Danae_Dekker_CV_2021.pdf'
  ]
];

// Run!
$feather->run();
