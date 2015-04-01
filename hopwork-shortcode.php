<?php
/*
  Plugin Name: Hopwork shortcode
  Plugin URI: https://copier-coller.com/hopwork-shortcode
  Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=43XMASQSUE4YE
  Description: A shortcode to display your hopwork profile.
  Version: 1.0
  Author: Matthieu Solente
  Author URI: https://copier-coller.com
  License: GPL2
 */

function hopwork_shortcode_widget($atts){
    
    $atts = shortcode_atts(
            array(
                'profil' 	=> 'profil',
                'dataid' 	=> 'dataid', 
                'picture'       => true,
                'tags'          => true,
                'recos'         => true,
                'height' 	=> 500,
                'style' 	=> 'dark',
                'width' 	=> 300,   
                     ),$atts );
    extract($atts);
    return '<a class="hopwork_widget" href="https://www.hopwork.com/profile/" '.$profil.' " data-id=" '.$dataid.' " data-picture="'.$picture.'" data-tags="'.$tags.'" data-recos="'.$recos.'" data-height="'.$height.'" data-style="'.$style.'" data-width=" '.$width.'">Voir mon profil freelance</a>';
    
}

add_shortcode('profil_widget','hopwork_shortcode_widget');
add_filter('widget_text', 'do_shortcode');

function hopwork_shortcode_button($atts){
    $atts = shortcode_atts(
            array(
                'profil' 	=> 'profil',
                'dataid' 	=> 'datid', 
                'datawidth' 	=> 'big',
                'datalayout'    => 'round',
                'datacolor'     => 'blue',
                'datarecos'     => true
                     ),$atts );
    extract($atts);
    return '<a href="https://www.hopwork.com/profile/"'.$profil.'" data-id="'.$dataid.'" class="hopwork_button" data-width="'.$datawidth.'" data-layout="'.$datalayout.'" data-recos="'.$datarecos.'" data-bgrecos="clear" data-colorscheme="'.$datacolor.'">Mon Profil Hopwork!</a>';   
}
add_shortcode('profil_button','hopwork_shortcode_button');
add_filter('widget_text', 'do_shortcode');

function hopwork_script_footer(){ ?>

<script type="text/javascript"> 
 (function(d,id) { 
 if (d.getElementById(id)) return;
 var s = d.createElement('script'); 
 var c = d.getElementsByTagName('script')[0]; 
 s.type = 'text/javascript'; 
 s.async = true; 
 s.src = 'https://widgets.hopwork.com/1.0.0/js/sdk.wgt.min.js'; 
 c.parentNode.insertBefore(s, c); 
 })(document,'hopwork-sdkjs-wgt'); 
 
  (function(d,id) { 
 if (d.getElementById(id)) return;
 var s = d.createElement('script'); 
 var c = d.getElementsByTagName('script')[0]; 
 s.type = 'text/javascript'; 
 s.async = true; 
 s.src = 'https://widgets.hopwork.com/1.0.0/js/sdk.min.js'; 
 c.parentNode.insertBefore(s, c); 
 })(document,'hopwork-sdkjs-btn'); 
 
 </script>

<?php } 

add_action('wp_footer', 'hopwork_script_footer'); ?>