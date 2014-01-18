<?php 

/**
 * Plugin Name: Utility Mohole
 * Plugin URI: https://github.com/mohole/wpMoholeUtils
 * Description: Alcune utility per i siti Mohole (Schermata login customizzata, shortcodes, funzioni varie, ecc..)
 * Version: 0.2
 * Author: Salvatore Laisa
 * Author URI: http://www.salvatorelaisa.net
 * License: none
 */


/* Redirect al login */
function MH_accesso(){
    $_url = get_bloginfo('url') . '/gestionale2/new/';
    return $_url;
}

/* Login personalizzato */
function MH_login(){
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

/* Modifica nomi ruoli predefiniti */
function MH_cambiaNomeRuoli() {
    global $wp_roles;

    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();

    // Elenco ruoli standard - togliere il commento per visualizzarli nella backend
    /*$roles = $wp_roles->get_names();
    print_r($roles);*/

    // Modifica nomi ruoli "author", "contributor" or "subscriber"...
    $wp_roles->roles['editor']['name'] = 'Staff';
    $wp_roles->role_names['editor'] = 'Staff';

    $wp_roles->roles['author']['name'] = 'Docente';
    $wp_roles->role_names['author'] = 'Docente';

    $wp_roles->roles['contributor']['name'] = 'Collaboratore';
    $wp_roles->role_names['contributor'] = 'Collaboratore';

    $wp_roles->roles['subscriber']['name'] = 'Allievo';
    $wp_roles->role_names['subscriber'] = 'Allievo'; 
       
}

/* Aggiungo un link nella toolbar per tutti */
function MH_adminbar($wp_admin_bar) {
    $args = array(
        'id' => 'gestionale',
        'title' => 'Gestionale', 
        'href' => get_bloginfo('url').'/gestionale/new/',
        'meta' => array()
    );
    $wp_admin_bar->add_node($args);

    // Link al gestionale sviluppo solo per amministratori
    if(current_user_can( 'manage_options' )){
        $args = array(
            'id' => 'gestionale2',
            'title' => 'Gestionale 2', 
            'href' => get_bloginfo('url').'/gestionale2/new/',
            'meta' => array()
        );
        $wp_admin_bar->add_node($args);
    }
}


/* Azioni */
add_action('login_head', 'MH_login');
add_action('init', 'MH_cambiaNomeRuoli');
//add_action('login_redirect', 'MH_accesso');
add_action('admin_bar_menu', 'MH_adminbar', 999);


/* INCLUSIONI */
include('shortcodes.php');

/* FUNZIONI "LIBERE" */

// Funzione per il calcolo dell'IVA (ora 22%)
function aggiungiIva($valore){
    $conIva = $valore + (($valore/100)*22);
    echo($conIva);
}

?>