<?php
/*
Plugin Name: Wordpress JWPlayer
Plugin URI: https://github.com/py7hon/jwp
Description: JWPlayer for Wordpress with manny usefull function.
Version: 0.1
Author: Muhammad Iqbal Rifai
Author URI: https://www.facebook.com/composer.json
License: WTFAL
*/


/* * * ** * * * * * * * * * * * * * * * * * * * * * * */
/*                   BASE FUNCTION                    */
/* * * * * * * * * * * * * * * * * * * * * * * * * * */

require plugin_dir_path( __FILE__ ) . '/jwp/include/jspacker.php';

function jwp_shortcodes( $atts, $content = null ) {
		extract(shortcode_atts(array(
		   'title' => 1,
		   'video' => 1,
		   'thumb' => 1,
		   'logo' => 1,
		   'posisi' => 1,
		   'subtitle' => 1
		), $atts)); 
		$fonts = plugin_dir_path( __FILE__ ) . '/jwp/assets/js/fonts.js';
		$jwplayer = plugin_dir_path( __FILE__ ) . '/jwp/assets/js/jwplayer.min.js';
		$bruh = plugin_dir_path( __FILE__ ) . '/jwp/assets/js/bruh.js';
		$worker = plugin_dir_path( __FILE__ ) . '/jwp/assets/js/subtitles-octopus-worker.js';
		$subtitle = plugin_dir_path( __FILE__ ) . '/jwp/assets/js/subtitles-octopus.js';
        $script = "var player = jwplayer('player')
        player.setup({
            'title': $title,
            'file': $video,
            'image': $thumb,
            'width': '100%',
            'height': '100%',
            'autostart': false,
            'displayPlaybackLabel': true,
            'primary': 'html5',
            'logo': {
                'file': $logo,
                'position': $posisi
            }
        });
        Player.on('ready', function () {
                    var video = player.getContainer().querySelector('video');
                    window.SubtitlesOctopusOnLoad = function () {
                        var options = {
                            video: video,
                            subUrl: $subtitle,
                            fonts: fonts(),
                            //onReady: onReadyFunction,
                            //debug: true,
                            workerUrl: $worker
                        };
                        window.octopusInstance = new SubtitlesOctopus(options);
                    };
                    if (SubtitlesOctopus) {
                        SubtitlesOctopusOnLoad();
                    }
                });"
        $rand   = rand(20, 100);
        $packer = new JSPacker($script);
        $script = $packer->pack();
        $encode = implode('"+"', str_split(base64_encode($script), $rand));
        
		
		$content .= "
			<div id='player'>Loading the player...</div>
			<script src='$jwplayer'></script>
			<script src='$fonts'></script>
            <script src='$bruh'></script>
			<script type='text/javascript'>$encode</script>
			";
	return $content;
}
add_shortcode( 'jwp', 'jwp_shortcodes' );

?>
