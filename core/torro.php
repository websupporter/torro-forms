<?php
/**
 * Core: Torro class
 *
 * @package TorroForms
 * @subpackage Core
 * @version 1.0.0-beta.3
 * @since 1.0.0-beta.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Torro class
 *
 * This class acts as general access point for all class instances and functionality.
 *
 * This class instance is returned by the `torro()` function.
 *
 * @since 1.0.0-beta.1
 */
final class Torro {
	/**
	 * Instance
	 *
	 * @var null|Torro
	 * @since 1.0.0
	 */
	private static $instance = null;

	/**
	 * Singleton
	 *
	 * @since 1.0.0
	 * @return Torro
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Plugin Filename
	 *
	 * @var string
	 * @since 1.0.0
	 */
	private $plugin_file = '';

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 */
	private function __construct() {
		$this->plugin_file = dirname( dirname( __FILE__ ) ) . '/torro-forms.php';

		// load manager classes
		require_once( $this->get_path( 'core/managers/class-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-components-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-element-types-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-form-settings-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-settings-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-templatetags-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-actions-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-access-controls-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-result-handlers-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-extensions-manager.php' ) );

		// load instance manager classes
		require_once( $this->get_path( 'core/managers/class-instance-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-forms-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-containers-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-elements-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-element-answer-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-element-setting-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-results-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-result-values-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-participants-manager.php' ) );
		require_once( $this->get_path( 'core/managers/class-email-notifications-manager.php' ) );

		add_action( 'admin_init', array( $this, 'admin_notices' ) );
	}

	/**
	 * Forms keychain function
	 *
	 * @return null|Torro_Forms_Manager
	 * @since 1.0.0
	 */
	public function forms() {
		return Torro_Forms_Manager::instance();
	}

	/**
	 * Containers keychain function
	 *
	 * @return null|Torro_Containers_Manager
	 * @since 1.0.0
	 */
	public function containers(){
		return Torro_Containers_Manager::instance();
	}

	/**
	 * Elements keychain function
	 *
	 * @return null|Torro_Elements_Manager
	 * @since 1.0.0
	 */
	public function elements() {
		return Torro_Elements_Manager::instance();
	}

	/**
	 * Element setting keychain function
	 *
	 * @return null|Torro_Element_Answer_Manager
	 * @since 1.0.0
	 */
	public function element_answers() {
		return Torro_Element_Answer_Manager::instance();
	}

	/**
	 * Element setting keychain function
	 *
	 * @return null|Torro_Element_Setting_Manager
	 * @since 1.0.0
	 */
	public function element_settings() {
		return Torro_Element_Setting_Manager::instance();
	}

	public function results() {
		return Torro_Results_Manager::instance();
	}

	public function result_values() {
		return Torro_Result_Values_Manager::instance();
	}

	/**
	 * Participants keychain function
	 *
	 * @return null|Torro_Participants_Manager
	 * @since 1.0.0
	 */
	public function participants(){
		return Torro_Participants_Manager::instance();
	}

	public function email_notifications() {
		return Torro_Email_Notifications_Manager::instance();
	}

	/**
	 * Components keychain function
	 *
	 * @return null|Torro_Components_Manager
	 * @since 1.0.0
	 */
	public function components() {
		return Torro_Components_Manager::instance();
	}

	/**
	 * Element types keychain function
	 *
	 * @return null|Torro_Elements_Manager
	 * @since 1.0.0
	 */
	public function element_types() {
		return Torro_Element_Types_Manager::instance();
	}

	/**
	 * Form settings keychain function
	 *
	 * @return null|Torro_Form_Settings_Manager
	 * @since 1.0.0
	 */
	public function form_settings(){
		return Torro_Form_Settings_Manager::instance();
	}

	/**
	 * Settings keychain function
	 *
	 * @return null|Torro_Settings_Manager
	 * @since 1.0.0
	 */
	public function settings() {
		return Torro_Settings_Manager::instance();
	}

	/**
	 * Template Tags keychain function
	 *
	 * @return null|Torro_TemplateTags_Manager
	 * @since 1.0.0
	 */
	public function templatetags() {
		return Torro_TemplateTags_Manager::instance();
	}

	/**
	 * Actions keychain function
	 *
	 * @return null|Torro_Form_Actions_Manager
	 * @since 1.0.0
	 */
	public function actions() {
		return Torro_Form_Actions_Manager::instance();
	}

	/**
	 * Restrictions keychain function
	 *
	 * @return null|Torro_Form_Access_Controls_Manager
	 * @since 1.0.0
	 */
	public function access_controls() {
		return Torro_Form_Access_Controls_Manager::instance();
	}

	/**
	 * Result handler keychain function
	 *
	 * @return null|Torro_Form_Result_Handlers_Manager
	 * @since 1.0.0
	 */
	public function resulthandlers() {
		return Torro_Form_Result_Handlers_Manager::instance();
	}

	/**
	 * Extensions keychain function
	 *
	 * @return null|Torro_Extensions_Manager
	 * @since 1.0.0
	 */
	public function extensions() {
		return Torro_Extensions_Manager::instance();
	}

	/**
	 * Admin notices keychain function
	 *
	 * @return null|Torro_Admin_Notices
	 * @since 1.0.0
	 */
	public function admin_notices() {
		return Torro_Admin_Notices::instance();
	}

	/**
	 * AJAX keychain function
	 *
	 * @return null|Torro_AJAX
	 * @since 1.0.0
	 */
	public function ajax() {
		return Torro_AJAX::instance();
	}

	/**
	 * Checks if we are in a Torro Forms post type
	 *
	 * @return bool
	 * @since 1.0.0
	 */
	public function is_form() {
		if ( is_admin() ) {
			if ( ! empty( $_GET[ 'post' ] ) ) {
				$post = get_post( $_GET[ 'post' ] );

				if ( is_a( $post, 'WP_Post' ) && 'torro_form' === $post->post_type ) {
					return true;
				}
			}

			if ( ! empty( $_GET[ 'post_type' ] ) && 'torro_form' === $_GET[ 'post_type' ] && ! isset( $_GET[ 'page' ] ) ) {
				return true;
			}

			return false;
		}

		if ( 'torro_form' === get_post_type() ) {
			return true;
		}

		global $post;

		if ( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'form' ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Checks if we are a Torro Forms post type in admin
	 *
	 * @return bool
	 * @since 1.0.0
	 */
	public function is_formbuilder() {
		if ( is_admin() && $this->is_form() ) {
			return true;
		}

		return false;
	}

	/**
	 * Checks if we are on Torro Forms settings page
	 *
	 * @param string $tab
	 * @param string $section
	 *
	 * @return bool
	 * @since 1.0.0
	 */
	public function is_settingspage( $tab = null, $section = null ) {
		if ( is_admin() && isset( $_GET['page'] ) && 'Torro_Admin' === $_GET['page'] ) {
			if ( isset( $tab ) ) {
				if( ( isset( $_GET['tab'] ) && $tab !== $_GET['tab'] ) || ! isset( $_GET['tab'] ) ) {
					return false;
				}
			}

			if ( isset( $section ) ) {
				if ( ( isset( $_GET['section'] ) && $section !== $_GET['section'] ) || ! isset( $_GET['section'] ) ) {
					return false;
				}
			}

			return true;
		}

		return false;
	}

	/**
	 * Locates and optionally loads a plugin template.
	 *
	 * Works in a similar way like the WordPress function, but also checks for the template in the plugin and, if specified, an extension.
	 * It furthermore allows to pass data to the template.
	 *
	 * @param mixed $template_names
	 * @param boolean $load
	 * @param boolean $require_once
	 * @param array|null $data Data to pass on to the template.
	 * @param string|null $extension_path
	 *
	 * @return string $located
	 * @since 1.0.0
	 */
	public function locate_template( $template_names, $load = false, $require_once = true, $data = null, $extension_path = null ) {
		$located = locate_template( $template_names, false );

		if ( '' === $located ) {
			foreach ( ( array ) $template_names as $template_name ) {
				if ( ! $template_name ) {
					continue;
				}

				if ( $extension_path && file_exists( trailingslashit( $extension_path ) . 'templates/' . $template_name ) ) {
					$located = trailingslashit( $extension_path ) . $template_name;
					break;
				}

				$file = $this->get_path( 'templates/' . $template_name );
				if ( file_exists( $file ) ) {
					$located = $file;
					break;
				}
			}
		}

		if ( $load && '' !== $located ) {
			$this->load_template( $located, $require_once, $data );
		}

		return $located;
	}

	/**
	 * Loads a plugin template.
	 *
	 * Works in a similar way like the WordPress function, but allows to pass data to the template.
	 *
	 * @param string $_template_file
	 * @param boolean $require_once
	 * @param array|null $data Data to pass on to the template.
	 *
	 * @since 1.0.0
	 */
	public function load_template( $_template_file, $require_once = true, $data = null ) {
		if ( is_array( $data ) ) {
			extract( $data, EXTR_SKIP );
		}

		if ( $require_once ) {
			require_once $_template_file;
		} else {
			require $_template_file;
		}
	}

	/**
	 * Torro Email function
	 *
	 * @param string $to_email Mail address for sending to
	 * @param string $subject  Subject of mail
	 * @param string $content
	 *
	 * @return bool
	 * @since 1.0.0
	 */
	public function mail( $to_email, $subject, $content, $from_name = null, $from_email = null ) {
		global $torro_tmp_email_settings;

		$torro_tmp_email_settings = array(
			'from_name' => $from_name,
			'from_email' => $from_email
		);

		add_filter( 'wp_mail_from_name', 'torro_change_email_return_name' );
		add_filter( 'wp_mail_from', 'torro_change_email_return_address' );

		$result = wp_mail( $to_email, $subject, $content );

		remove_filter( 'wp_mail_from_name', 'torro_change_email_return_name' );
		remove_filter( 'wp_mail_from', 'torro_change_email_return_address' );
		unset( $torro_tmp_email_settings );

		return $result;
	}

	/**
	 * Returns path to plugin
	 *
	 * @param string $path adds sub path
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function get_path( $path = '' ) {
		return plugin_dir_path( $this->plugin_file ) . ltrim( $path, '/' );
	}

	/**
	 * Returns url to plugin
	 *
	 * @param string $path adds sub path
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function get_url( $path = '' ) {
		return plugin_dir_url( $this->plugin_file ) . ltrim( $path, '/' );
	}

	/**
	 * Returns asset url path
	 *
	 * @param string $name Name of asset
	 * @param string $mode css/js/png/gif/svg/vendor-css/vendor-js
	 * @param boolean $force whether to force to load the provided version of the file (not using .min conditionally)
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function get_asset_url( $name, $mode = '', $force = false ) {
		$urlpath = 'assets/';

		$can_min = true;

		switch ( $mode ) {
			case 'css':
				$urlpath .= 'dist/css/' . $name . '.css';
				break;
			case 'js':
				$urlpath .= 'dist/js/' . $name . '.js';
				break;
			case 'png':
			case 'gif':
			case 'svg':
				$urlpath .= 'dist/img/' . $name . '.' . $mode;
				$can_min = false;
				break;
			case 'vendor-css':
				$urlpath .= 'vendor/' . $name . '.css';
				break;
			case 'vendor-js':
				$urlpath .= 'vendor/' . $name . '.js';
				break;
			default:
				return '';
		}

		if ( $can_min && ! $force ) {
			if ( ! defined( 'SCRIPT_DEBUG' ) || ! SCRIPT_DEBUG ) {
				$urlpath = explode( '.', $urlpath );
				array_splice( $urlpath, count( $urlpath ) - 1, 0, 'min' );
				$urlpath = implode( '.', $urlpath );
			}
		}

		return $this->get_url( $urlpath );
	}

	/**
	 * Logging function
	 *
	 * @param $message
	 * @since 1.0.0
	 */
	public function log( $message ) {
		$wp_upload_dir = wp_upload_dir();
		$log_dir = trailingslashit( $wp_upload_dir['basedir'] ) . 'torro-logs';

		if ( ! file_exists( $log_dir ) || ! is_dir( $log_dir ) ) {
			mkdir( $log_dir );
		}

		$file = fopen( $log_dir . '/main.log', 'a' );
		fputs( $file, $message . chr( 13 ) );
		fclose( $file );
	}
}

/**
 * Torro super function
 *
 * @return Torro
 * @since 1.0.0
 */
function torro() {
	return Torro::instance();
}
