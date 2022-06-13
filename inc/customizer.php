<?php

/**
 * Customizer WebColors
 *
 */

if (!function_exists('WebColors_customize_register')) {
    function WebColors_customize_register( $wp_customize ) {
        $wp_customize->add_section('web_colors', [
            'title' => __('Website Colors', 'pw'),
            'priority' => 114,
        ]);
    
        $wp_customize->add_setting('web_color', [
            'default' =>'03a9f4',
            'sanitize_callback' => 'esc_attr',
        ]);
    
        $wp_customize->add_control(new WP_Customize_Color_Control (
            $wp_customize,
            'web_color',
            [
            'section' => 'web_colors',
            'label' => __('Main Color', 'pw'),
            ]
        ));
    }
    add_action( 'customize_register', 'WebColors_customize_register' );
}


/**
 * Customizer Setup and Custom Controls
 *
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class pw_initialise_customizer_settings {

	public function __construct() {

		// Register our sections
		add_action( 'customize_register', array( $this, 'pw_add_customizer_sections' ) );

		// Register our sample Custom Control controls
		add_action( 'customize_register', array( $this, 'pw_register_faq' ) );

	}


	/**
	 * Register the Customizer sections
	 */
	public function pw_add_customizer_sections( $wp_customize ) {
		/**
		 * Add our section that contains examples of our Custom Controls
		 */
		$wp_customize->add_section( 'faq', [
				'title' => __( 'Common Questions', 'pw' ),
				'priority' => 115
			]
		);

	}

	/**
	 * Register our sample custom controls
	 */
	public function pw_register_faq( $wp_customize ) {
		// 
		/**
		 * 1st question & answer
		 */
		$wp_customize->add_setting('question-1', [
            'transport' => 'postMessage',
            'default' =>'',
            'sanitize_callback' => 'esc_attr',
        ]);
    
        $wp_customize->add_control('question-1', [
            'type' => 'text',
            'section' => 'faq',
            'label' => __('The first question', 'pw'),
			'description' => __( 'Add the title of the first question', 'pw' ),
        ]);

		
		$wp_customize->add_setting( 'answer-1', [
				'default' =>'',
				'transport' => 'postMessage',
				'sanitize_callback' => 'wp_kses_post'
		]);
		$wp_customize->add_control( new pw_TinyMCE_Custom_control( $wp_customize, 'answer-1',[
				'label' => __('First answer', 'pw'),
				'description' => __( 'Add the answer to the first question', 'pw' ),
				'section' => 'faq',
				'input_attrs' => [
					'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
				]
				
		]));
		// 
		/**
		 * 2 question & answer
		 */
		$wp_customize->add_setting('question-2', [
            'transport' => 'postMessage',
            'default' =>'',
            'sanitize_callback' => 'esc_attr',
        ]);
    
        $wp_customize->add_control('question-2', [
            'type' => 'text',
            'section' => 'faq',
            'label' => __('The second question', 'pw'),
			'description' => __( 'Add the title of the second question', 'pw' ),	
        ]);

		
		$wp_customize->add_setting( 'answer-2', [
				'default' =>'',
				'transport' => 'postMessage',
				'sanitize_callback' => 'wp_kses_post'
		]);
		$wp_customize->add_control( new pw_TinyMCE_Custom_control( $wp_customize, 'answer-2',[
				'label' => __('Second answer', 'pw'),
				'description' => __( 'Add the answer to the second question', 'pw' ),
				'section' => 'faq',
				'input_attrs' => [
					'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
				]
				
		]));
		// 
		/**
		 * 3rd question & answer
		 */
		$wp_customize->add_setting('question-3', [
            'transport' => 'postMessage',
            'default' =>'',
            'sanitize_callback' => 'esc_attr',
        ]);
    
        $wp_customize->add_control('question-3', [
            'type' => 'text',
            'section' => 'faq',
            'label' => __('The third question', 'pw'),
			'description' => __( 'Add the title of the third question', 'pw' ),
        ]);

		
		$wp_customize->add_setting( 'answer-3', [
				'default' =>'',
				'transport' => 'postMessage',
				'sanitize_callback' => 'wp_kses_post'
		]);
		$wp_customize->add_control( new pw_TinyMCE_Custom_control( $wp_customize, 'answer-3',[
				'label' => __('Third answer', 'pw'),
				'description' => __( 'Add the answer to the third question', 'pw' ),
				'section' => 'faq',
				'input_attrs' => [
					'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
				]
				
		]));
	}
}

/**
 * Load all our Customizer Custom Controls
 */
require_once trailingslashit( dirname(__FILE__) ) . 'custom-controls.php';
/**
 * Initialise our Customizer settings
 */
$pw_settings = new pw_initialise_customizer_settings();


