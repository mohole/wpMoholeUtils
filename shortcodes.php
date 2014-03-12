<?php 

/* Persona - Pagina staff */
function MH_persona_shortcode( $atts, $content = null ) {
   return '<div class="persona well">' . $content . '</div>';
}

/* Mappa - Visualizza una Google Maps gia' settata sulla sede Mohole */
function MH_mappa( $atts) {
	  extract( shortcode_atts( array(
	      'altezza' => 450,
	      'larghezza' => 900,
	      ), $atts ) );
	      
      return '<iframe src="http://maps.google.it/maps?f=q&amp;source=http://maps.google.it/maps?f=q&amp;source=s_q&amp;hl=it&amp;geocode=&amp;q=Moholelab+Di+Cosimo+Lupo+E+C+Snc,+Via+Privata+Desiderio,+Milano,+MI&amp;aq=0&amp;oq=mohole&amp;sll=45.46407,9.171906&amp;sspn=0.150013,0.309677&amp;ie=UTF8&amp;hq=moholelab+di+cosimo+lupo+ec+snc&amp;hnear=Via+Privata+Desiderio,+Milano,+Lombardia&amp;t=m&amp;z=16&amp;iwloc=A&amp;output=embed" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="'.esc_attr($larghezza).'" height="'.esc_attr($altezza).'"></iframe>';
}

/* Schede - componente */
function scheda_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
	      'larghezza' => 'mezzo',
	), $atts ) );
	
	switch($larghezza){
		case 'tutto': $larghezza = 'span12'; break;
		case 'mezzo': $larghezza = 'span6'; break;
		case 'terzo': $larghezza = 'span4'; break;
		case 'quarto': $larghezza = 'span3'; break;
	}
	
	return '<div class="scheda '.esc_attr($larghezza).'" ><article class="box">' . $content . '</article></div>';
}

add_shortcode( 'persona', 'MH_persona_shortcode' );
add_shortcode( 'mappa', 'MH_mappa' );
add_shortcode( 'scheda', 'scheda_shortcode' );

?>