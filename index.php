<?php 

/**
 * Plugin Name: Utility Mohole
 * Plugin URI: https://github.com/mohole/wpMoholeUtils
 * Description: Alcune utility per i siti Mohole (Schermata login customizzata, shortcodes, funzioni varie, ecc..)
 * Version: 0.1
 * Author: Salvatore Laisa
 * Author URI: http://www.salvatorelaisa.net
 * License: none
 */


/* Login personalizzato */
function mioLogoLogin(){
	?>
	
	<style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo plugins_url( 'img/moholeLogin.svg' , __FILE__ ); ?>);
            width: 320px;
            height: 70px;
            background-size: 320px 70px;
        }
    </style>
	
	<?php
}


/* Azioni */
add_action('login_head', 'mioLogoLogin');

?>