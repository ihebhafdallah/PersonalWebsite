<?php
/**
 * PW Customizer Custom Controls
 *
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Custom Control Base Class
	 *
	 * @author Iheb Hafdallah <http://ihebhafdallah.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/ihebhafdallah
	 */
	class pw_Custom_Control extends WP_Customize_Control {
		protected function get_pw_resource_url() {
			if( strpos( wp_normalize_path( __DIR__ ), wp_normalize_path( WP_PLUGIN_DIR ) ) === 0 ) {
				// We're in a plugin directory and need to determine the url accordingly.
				return plugin_dir_url( __DIR__ );
			}

			return trailingslashit( get_template_directory_uri() );
		}
	}

	/**
	 * Custom Section Base Class
	 *
	 * @author Iheb Hafdallah <http://ihebhafdallah.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/ihebhafdallah
	 */
	class pw_Custom_Section extends WP_Customize_Section {
		protected function get_pw_resource_url() {
			if( strpos( wp_normalize_path( __DIR__ ), wp_normalize_path( WP_PLUGIN_DIR ) ) === 0 ) {
				// We're in a plugin directory and need to determine the url accordingly.
				return plugin_dir_url( __DIR__ );
			}

			return trailingslashit( get_template_directory_uri() );
		}
	}

	/**
	 * TinyMCE Custom Control
	 *
	 * @author Iheb Hafdallah <http://ihebhafdallah.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/ihebhafdallah
	 */
	class pw_TinyMCE_Custom_control extends pw_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'tinymce_editor';
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue(){
			wp_enqueue_script( 'pw-custom-controls-js', $this->get_pw_resource_url() . 'assets/js/customizer.js', array( 'jquery' ), '1.0', true );
			wp_enqueue_editor();
		}
		/**
		 * Pass our TinyMCE toolbar string to JavaScript
		 */
		public function to_json() {
			parent::to_json();
			$this->json['pwtinymcetoolbar1'] = isset( $this->input_attrs['toolbar1'] ) ? esc_attr( $this->input_attrs['toolbar1'] ) : 'bold italic bullist numlist alignleft aligncenter alignright link';
			$this->json['pwtinymcetoolbar2'] = isset( $this->input_attrs['toolbar2'] ) ? esc_attr( $this->input_attrs['toolbar2'] ) : '';
			$this->json['pwmediabuttons'] = isset( $this->input_attrs['mediaButtons'] ) && ( $this->input_attrs['mediaButtons'] === true ) ? true : false;
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content(){
		?>
			<div class="tinymce-control">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<textarea id="<?php echo esc_html( $this->id ); ?>" class="customize-control-tinymce-editor" <?php $this->link(); ?>><?php echo esc_html( $this->value() ); ?></textarea>
			</div>
		<?php
		}
	}
}
