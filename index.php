<?php
require("vendor/autoload.php");

use Danae\Feather\Feather;
use Danae\Soundcloud\Soundcloud;

// Create the context
$feather = new Feather();

// Add pages
$feather->pages->add('home', ['default' => true]);
$feather->pages->add('music');
$feather->pages->add('work');
$feather->pages->add('about');

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
    'mail' => 'aGVsbG9AZGFuYWVkZWtrZXIuY29t',
    'soundcloud' => 'https://soundcloud.com/purplelum',
    'spotify_danaedekker' => 'https://open.spotify.com/artist/0bta46UUaupzYcrrhG3yRQ',
    'spotify_purplelum' => 'https://open.spotify.com/artist/26zydGirRGiAVUaWRR0Wvt',
    'deezer_danaedekker' => 'https://www.deezer.com/nl/artist/124460692',
    'deezer_purplelum' => 'https://www.deezer.com/nl/artist/14398631',
    'bandcamp' => 'https://danaedekker.bandcamp.com/',
    'youtube' => 'https://youtube.com/@danaedekker',
    'bluesky' => 'https://bsky.app/profile/danae.link',
    'linkedin' => 'https://linkedin.com/in/danaedekker/',
    'linktree' => 'https://danae.link/'
  ],
  'home' => [
    'showreel_embed' => 'https://www.youtube.com/embed/IxIdXyCCp0A'
  ],
  'music' => [
    'journey_to_the_northern_lights' => [
      'square' => 'https://i1.sndcdn.com/artworks-DiHrIIz67o81ogqz-MkPXbw-t500x500.jpg',
      'embed' => 'https://soundcloud.com/purplelum/journey-to-the-northern-lights'
    ],
    'entanglement' => [
      'square' => 'https://i1.sndcdn.com/artworks-7yDLmrUx3dJEIIQi-Lk9f7g-t500x500.jpg',
      'embed' => 'https://soundcloud.com/purplelum/entanglement'
    ],
    'ocean_of_stars' => [
      'square' => 'https://i1.sndcdn.com/artworks-U2eq9RcRuS7WvyXc-5oiyMg-t500x500.jpg',
      'embed' => 'https://soundcloud.com/purplelum/ocean-of-stars'
    ],
    'once_in_a_blue_moon' => [
      'square' => 'https://i1.sndcdn.com/artworks-o8gPqVOEAmzz5bf6-HxF4RQ-t500x500.jpg',
      'embed' => 'https://soundcloud.com/purplelum/once-in-a-blue-moon-2020-remastered'
    ],
    'we_in_heaven' => [
      'square' => 'https://i1.sndcdn.com/artworks-UjqsQDKjYH2nOSq2-kpuxXg-t500x500.jpg',
      'embed' => 'https://soundcloud.com/purplelum/we-in-heaven-2020-remix'
    ],

    'commissions' => [
      'tos' => $feather->base_path . '/publications/Personal_Music_Comissions_TOS.pdf',
      'dutch_tax_exemptions' => 'https://www.belastingdienst.nl/wps/wcm/connect/bldcontentnl/belastingdienst/zakelijk/btw/tarieven_en_vrijstellingen/vrijstellingen/vrijstelling_voor_componisten_schrijvers_cartoonisten_en_journalisten',
    ],
  ],
  'work' => [
    'rayman_2_redreamed' => [
      'square' => $feather->base_path . '/assets/images/square_rayman_2_redreamed.png',
      'embed' => 'https://www.youtube.com/embed/v5nR2t-XtHk',
      'website' => 'https://newdawn.games/'
    ],
    'repair_game' => [
      'square' => $feather->base_path . '/assets/images/square_repair_game.png',
      'embed' => 'https://www.youtube.com/embed/-3a6ZsoHoGc',
      'steam' => 'https://store.steampowered.com/app/2480840/Wesley_Smiths_Repair_Game/',
      'itch' => 'https://audune.itch.io/repairgame',
    ],
    'bean_and_brew' => [
      'square' => $feather->base_path . '/assets/images/square_bean_and_brew.png',
      'embed' => 'https://www.youtube.com/embed/c26FER2AicM',
      'itch' => 'https://runicpixels.itch.io/ludum-dare-55',
      'bandcamp' => 'https://danaedekker.bandcamp.com/track/bean-and-brew-original-game-soundtrack',
      'spotify' => 'https://open.spotify.com/album/63ooyVv50L91nL54AHuLvZ?si=hGL9dDqARPqnHx54uGitpQ',
    ],
    'roots_of_skye' => [
      'square' => $feather->base_path . '/assets/images/square_roots_of_skye.png',
      'embed' => 'https://www.youtube.com/embed/czFwxPxQxyU',
      'itch' => 'https://runicpixels.itch.io/roots-of-skye',
      'bandcamp' => 'https://danaedekker.bandcamp.com/track/roots-of-skye-original-game-soundtrack',
      'spotify' => 'https://open.spotify.com/album/3Gvi28iLbm1vNcPFpyXKCZ?si=knO6M_ILSkCSr0YsMBM45Q',
    ],
    'warden_of_the_woods' => [
      'square' => $feather->base_path . '/assets/images/square_warden_of_the_woods.png',
      'embed' => 'https://www.youtube.com/embed/8Gt_u-zDUNg',
      'itch' => 'https://arzi.itch.io/ld52',
      'bandcamp' => 'https://danaedekker.bandcamp.com/track/warden-of-the-woods-original-game-soundtrack',
      'spotify' => 'https://open.spotify.com/album/5gon4zFmmCLE5xzLosRWjq?si=PQhBjAI3QrS7kJqLP8G_-g',
    ],
    'feyrune' => [
      'square' => $feather->base_path . '/assets/images/square_feyrune.png',
      'embed' => 'https://www.youtube.com/embed/30kL41BxsxQ',
      'bandcamp' => 'https://danaedekker.bandcamp.com/track/feyrune-runic-clearing-original-game-soundtrack',
      'soundcloud' => 'https://soundcloud.com/purplelum/feypunk-runic-clearing-original-game-soundtrack',
    ],
    'sakura_shrine' => [
      'square' => $feather->base_path . '/assets/images/square_sakura_shrine.png',
      'embed' => 'https://www.youtube.com/embed/NbBPjZCHw-s',
      'itch' => 'https://arzi.itch.io/ld50',
      'bandcamp' => 'https://danaedekker.bandcamp.com/track/sakura-shrine-original-game-soundtrack',
      'spotify' => 'https://open.spotify.com/album/0q18N5cdPPEUv9vWoH8KP0?si=S0hgKaCCTWW7TroIosBzLw',
    ],
    'cathens' => [
      'square' => $feather->base_path . '/assets/images/square_cathens.png',
      'embed' => 'https://www.youtube.com/embed/LeJqDQb6q6E',
      'itch' => 'https://runicpixels.itch.io/cathens',
      'bandcamp' => 'https://danaedekker.bandcamp.com/track/cathens-original-game-soundtrack',
      'spotify' => 'https://open.spotify.com/album/0f1WnKoEH7rJ4G2TB9nwxn?si=WIhfUnZGRc6YSLmELXiynQ',
    ],
    'starcrossed' => [
      'square' => $feather->base_path . '/assets/images/square_starcrossed.png',
      'image' => $feather->base_path . '/assets/images/splash_starcrossed.png',
      'bandcamp' => 'https://danaedekker.bandcamp.com/album/starcrossed',
      'spotify' => 'https://open.spotify.com/album/1qlECuzZ6rPlDytM0O7ek8?si=RXWtdvmoS4uABrkmEMG6cQ',
    ],
    'ignis_universia' => [
      'square' => $feather->base_path . '/assets/images/square_ignis_universia.png',
      'embed' => 'https://www.youtube.com/embed/IiCshDIDKjM',
      'website' => 'https://ignisuniversia.com/',
      'steam' => 'https://store.steampowered.com/app/1545500/Ignis_Universia_Spa_of_Destiny/',
      'soundcloud' => 'https://soundcloud.com/ignisuniversia'
    ],
    'invisible_wings' => [
      'square' => $feather->base_path . '/assets/images/square_invisible_wings.png',
      'embed' => 'https://www.youtube.com/embed/IbGgyq8-2xk',
      'website' => 'https://invisiblewingsgame.com/',
      'steam' => 'https://store.steampowered.com/app/1419380/Invisible_Wings_Chapter_One/',
      'itch' => 'https://audune.itch.io/invisiblewings',
      'bandcamp' => 'https://danaedekker.bandcamp.com/album/invisible-wings-chapter-one-original-game-soundtrack',
      'spotify' => 'https://open.spotify.com/album/34l0R4F0FA8WE91f0RuUDV?si=e-cwVPXYR8ekot3QkZXFzw',
    ],
    'fairy_lost' => [
      'square' => $feather->base_path . '/assets/images/square_fairy_lost.png',
      'embed' => 'https://www.youtube.com/embed/Y21QE7zzHJg',
      'itch' => 'https://coolcast.itch.io/fairy-lost',
      'bandcamp' => 'https://danaedekker.bandcamp.com/track/fairy-lost-original-game-soundtrack',
      'spotify' => 'https://open.spotify.com/album/7epLwpypXL7udJFyUggn5k?si=Ug8g1SbkRWajTXhRSNNNkQ',
    ],
    'hope_remember' => [
      'square' => $feather->base_path . '/assets/images/square_hope_remember.png',
      'image' => $feather->base_path . '/assets/images/splash_hope_remember.png',
      'itch' => 'https://arzi.itch.io/hoperemember',
      'soundcloud' => 'https://soundcloud.com/purplelum/hope-remember',
    ],
    'colors_of_the_night' => [
      'square' => $feather->base_path . '/assets/images/square_colors_of_the_night.png',
      'image' => $feather->base_path . '/assets/images/splash_colors_of_the_night.png',
      'bandcamp' => 'https://danaedekker.bandcamp.com/album/colors-of-the-night',
      'spotify' => 'https://open.spotify.com/album/6B7otGMfr7Hjhnhyhfj9km?si=1mbQxIpLS3qgGuEtcpurBQ',
    ],
    'exodus_burned' => [
      'square' => $feather->base_path . '/assets/images/square_exodus_burned.png',
      'embed' => 'https://www.youtube.com/embed/alquMRfFrSY',
      'website' => 'http://www.exodusburned.com/',
    ],
    'blue_moon' => [
      'square' => $feather->base_path . '/assets/images/square_blue_moon.png',
      'image' => $feather->base_path . '/assets/images/splash_blue_moon.png',
      'bandcamp' => 'https://danaedekker.bandcamp.com/album/blue-moon',
      'spotify' => 'https://open.spotify.com/album/759u3tjG0t3Fkkycxd9SNC?si=7VQKr1qlQw-fHLMEEx-Dqw',
      ],
  ],
  'about' => [
    'thesis' => $feather->base_path . '/publications/Nonlinear_music_design_in_narrative_games.pdf',
    'resume' => $feather->base_path . '/publications/Danae_Dekker_CV_2025.pdf',
  ],
];

// Run!
$feather->run();
