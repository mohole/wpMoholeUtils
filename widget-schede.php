<?php 

/* Definizione widget Schede */
class MoholeSchede extends WP_Widget {

	// Costruttore
	public function __construct() {
		// Proprieta' base
		parent::__construct(
			'mohole_schede', // Base ID
			__('Scheda', 'text_domain'), // Name
			array( 'description' => __( 'Per creare schede con larghezze fisse di 1/4, 1/3, 1/2 e 1/1', 'text_domain' ), ) // Args
		);
	}

	
	// Form nella schermata Widget
 	public function form( $instance ) {
 		// Controllo se sono stati impostati titolo o testo
		if ( isset( $instance[ 'titolo' ] ) ||  isset( $instance[ 'testo' ] )) {
			$titolo = $instance[ 'titolo' ];
			$testo = $instance[ 'testo' ];
			$larghezza = $instance[ 'larghezza' ];
		} // nel caso creo dei valori fuffa
		else {
			$titolo = __( 'Titolo scheda', 'text_domain' );
			$testo = __( 'Testo scheda', 'text_domain' );
			$larghezza = __( 'mezzo', 'text_domain' );
		}

		// Marcatura della form del widget
		?> 
		
		<p>
			<label for="<?php echo $this->get_field_id( 'titolo' ); ?>"><?php _e( 'Titolo:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'titolo' ); ?>" name="<?php echo $this->get_field_name( 'titolo' ); ?>" type="text" value="<?php echo esc_attr( $titolo ); ?>" placeholder="Titolo scheda">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'testo' ); ?>"><?php _e( 'Testo:' ); ?></label> 
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'testo' ); ?>" name="<?php echo $this->get_field_name( 'testo' ); ?>" type="text"><?php echo esc_attr( $testo ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'larghezza' ); ?>"><?php _e( 'Larghezza:' ); ?></label> 
			<select id="<?php echo $this->get_field_id( 'larghezza' ); ?>" name="<?php echo $this->get_field_name( 'larghezza' ); ?>" class="widefat">
				<?php 

				// Creazione option dinamica
				$val = array('tutto','mezzo','terzo','quarto');
				$labels = array('Tutta la riga','1/2 riga','1/3 riga','1/4 riga');

				for($i=0;$i<count($val);$i++){ ?>
					<option value="<?php echo($val[$i]); ?>" <?php if($larghezza == $val[$i]){ echo('selected'); } ?> ><?php echo($labels[$i]); ?></option>
				<?php } ?>
			</select>
		</p>
	<?php }

	// Aggiornamento
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		// Pulisco i testi da caratteri "sporchi"
		$instance['titolo'] = strip_tags( $new_instance['titolo'] );
		$instance['testo'] = strip_tags( $new_instance['testo'] );
		$instance['larghezza'] = strip_tags( $new_instance['larghezza'] );
		return $instance;
	}

	// Marcatura da visualizzare nel tema
	public function widget( $args, $instance ) {
		// Estrazione argomenti
		extract( $args );
		$titolo = apply_filters( 'widget_title', $instance['titolo'] );
		$testo = $instance['testo'];
		$larghezza = $instance['larghezza'];

		switch($larghezza){
			case 'tutto': $larghezza = 'span12'; break;
			case 'mezzo': $larghezza = 'span6'; break;
			case 'terzo': $larghezza = 'span4'; break;
			case 'quarto': $larghezza = 'span3'; break;
		}

		// Stampa marcatura widget
		echo('<div class="scheda widget ' . $larghezza . '">');
			echo('<article class="box">');
				if($titolo){ echo("<h4>" . $titolo . "</h4>"); }
				echo($testo);
			echo('</article>');
		echo('</div>');
	}
}



function attivaWidget(){
	register_widget( 'MoholeSchede' );
}

// Attivazione widget
add_action( 'widgets_init', 'attivaWidget');


?>