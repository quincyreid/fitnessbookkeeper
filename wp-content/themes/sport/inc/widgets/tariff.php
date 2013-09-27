<?php
/**
 * The carousel widget
 *
 */
 
 
 
class cro_tariff extends WP_Widget {

	
	public function __construct() {
		parent::__construct(
	 		'cro_tariff', // Base ID
			'Tariff &nbsp;&nbsp;&nbsp;&nbsp;[C]', // Name
			array( 'description' => __( 'Croma tariff widget', 'localize' ), ) // Args
		);
	}


	// WIDGET OUTPUT
	public function widget( $args, $instance ) {


		extract( $args );		

		$title 		= esc_attr($instance[ 'title' ]);
		$desc 		= esc_attr($instance[ 'desc' ]);
		$tariff 	= esc_attr($instance[ 'tariff' ]);
		$link 		= esc_attr($instance[ 'tariff' ]);
		$label 		= esc_attr($instance[ 'label' ]);
		$booksched 	= get_option('cro_tarrsched');
		$op 		= '';

		

		echo $before_widget;

		if ( ! empty( $title ) ){
			echo $before_title . $title . $after_title;
		}

		if ( ! empty( $desc ) ){
			echo '<p class="cro_tarrdesc">' . $desc . '</p>';
		}

		foreach ($booksched as $v) {
			if ($v['category'] == $tariff){
				$op .= '<tr><td>' .  $v['desc'] . '</td><td class="cro_tariff-tariff">' .  $v['tarr']  . '</td></tr>';
			}
		}

		if ($op != ''){
			echo '<table><tbody>' . $op  . '</tbody></table>';
		}

		if ($link != '' && $link != ''){
			echo '<p class="cro_tarifflinklabel"><a href="' . $link  . '">' .  $label . '</a></p>';
		}

		echo $after_widget;
			
	}
	
	
	

	// WIDGET VALUES UPDATE
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['desc'] = esc_attr( $new_instance['desc'] );
		$instance['tariff'] = esc_attr( $new_instance['tariff'] );
		$instance['link'] = esc_attr( $new_instance['link'] );
		$instance['label'] = esc_attr( $new_instance['label'] );
		return $instance;
	}

	
	// WIDGET FORM
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) || isset( $instance[ 'desc' ]) || isset( $instance[ 'tariff' ] )) {
			$title = $instance[ 'title' ];
			$desc = $instance[ 'desc' ];
			$tariff = $instance[ 'tariff' ];
			$link = $instance['link'];
			$label = $instance['label'];
		}
		else {
			$title = __( 'New title', 'localize' );
			$desc = '';
			$tariff = '';
			$link = '';
			$label = 'Sign Up now';
		}

		$args = array(
			'type'		=> 'input',
			'labelfor' 	=> $this->get_field_id( 'title' ),
			'label'		=> __('Title','localize'),
			'id'		=> $this->get_field_id( 'title' ),
			'idname'	=> $this->get_field_name( 'title' ),
			'val'		=> esc_attr( $title ),
			'options'	=> ''
		);
		echo cro_make_widget_formpart($args);

		$args = array(
			'type'		=> 'textarea',
			'labelfor' 	=> $this->get_field_id( 'desc' ),
			'label'		=> __('Description','localize'),
			'id'		=> $this->get_field_id( 'desc' ),
			'idname'	=> $this->get_field_name( 'desc' ),
			'val'		=> esc_attr( $desc ),
			'options'	=> ''
		);
		echo cro_make_widget_formpart($args);


		$args = array(
			'type'		=> 'tarifftype',
			'labelfor' 	=> $this->get_field_id( 'tariff' ),
			'label'		=> __('Tariff Category:','localize'),
			'id'		=> $this->get_field_id( 'tariff' ),
			'idname'	=> $this->get_field_name( 'tariff' ),
			'val'		=> esc_attr( $tariff ),
			'options'	=> ''
		);
		echo cro_make_widget_formpart($args);

		$args = array(
			'type'		=> 'input',
			'labelfor' 	=> $this->get_field_id( 'link' ),
			'label'		=> __('Link','localize'),
			'id'		=> $this->get_field_id( 'link' ),
			'idname'	=> $this->get_field_name( 'link' ),
			'val'		=> esc_attr( $link),
			'options'	=> ''
		);
		echo cro_make_widget_formpart($args);

		$args = array(
			'type'		=> 'input',
			'labelfor' 	=> $this->get_field_id( 'label' ),
			'label'		=> __('Label','localize'),
			'id'		=> $this->get_field_id( 'label' ),
			'idname'	=> $this->get_field_name( 'label' ),
			'val'		=> esc_attr( $label ),
			'options'	=> ''
		);
		echo cro_make_widget_formpart($args);

	}

} // class Foo_Widget


add_action( 'widgets_init', create_function( '', 'register_widget( "cro_tariff" );' ) );
 

 
?>