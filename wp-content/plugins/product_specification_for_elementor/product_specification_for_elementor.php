<?php
defined('ABSPATH') or die();
/* 
 * Plugin Name: Product Specification Table Widget For Elementor
 * Plugin URI: http://themegum.com/
 * Description: Product specification with two measurent. Also including toggle switch button to change measurent, ex: metric or imperial.
 * Version: 1.0.0
 * Author: TemeGUM
 * Author URI: http://themegum.com
 * Domain Path: /languages/
 * Text Domain: product-specification-for-elementor
 */

final class Product_specification_for_Elementor{

  private static $_instance = null;

  public static function instance() {

    if ( is_null( self::$_instance ) ) {
      self::$_instance = new self();
    }
    return self::$_instance;

  }

  public function __construct() {

        define('PST_ELEMENTOR_URL', trailingslashit(plugin_dir_url( __FILE__ )));
        define('PST_ELEMENTOR_DIR',plugin_dir_path(__FILE__));

        load_plugin_textdomain('product-specification-for-elementor', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');

        if(!function_exists('is_plugin_active')){
          include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        }

        if(is_plugin_active('elementor/elementor.php')){
          $this->init();
        }
        else{
            add_action( 'admin_notices', array( $this, 'deactive_notice'), 10 );
            $this->deactive();
        }

  }

  public function init(){


      add_action('elementor/init',array( $this, '_register_elementor_category' ) );
      add_action( 'elementor/widgets/widgets_registered', array($this, '_elementor_widget_register') );

      add_filter( 'pre_set_site_transient_update_plugins',array($this,'get_update_plugin'));


  }

  public function _register_elementor_category($manager){


      \Elementor\Plugin::$instance->elements_manager->add_category(
        'temegum',
        [
          'title' => 'TemeGUM',
          'icon' => 'feicon-font',
        ],
        1
      );

  }

  public function _elementor_widget_register($widgets_manager){


      if(defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')){

        require_once( PST_ELEMENTOR_DIR."widgets/spesification_table.php" );
        require_once( PST_ELEMENTOR_DIR."widgets/toggle_measurement.php" );

      }
  }


  function get_update_plugin($transient){

      if ( empty( $transient->checked ) ) {
        return $transient;
      }


      $plugin_file = plugin_basename(__FILE__);
      $plugin_root = WP_PLUGIN_DIR;

      $plugin_data = get_file_data( "$plugin_root/$plugin_file", 
      array(
        'Name' => 'Plugin Name',
        'PluginURI' => 'Plugin URI',
        'Version' => 'Version',
        'Description' => 'Description',
        'Author' => 'Author',
        'AuthorURI' => 'Author URI',
        'TextDomain' => 'Text Domain',
        'DomainPath' => 'Domain Path',
        'Network' => 'Network',
        '_sitewide' => 'Site Wide Only',
        'SN'=>'Purchase Number'
      ), 'plugin' );


      $version= $plugin_data['Version'];
      $slug= $plugin_file;


    $post_option = array(
      'timeout' => ( ( defined('DOING_CRON') && DOING_CRON ) ? 30 : 3),
      'body' => array(
        'plugin'      => $slug,
        'version'      => $version,
        'style'      => get_template(),
      ),
      'user-agent' => 'WordPress; ' . get_bloginfo( 'url' )
    );

    $url = $http_url = 'http://update.themegum.com/plugin/update-check/';

    if ( $ssl = wp_http_supports( array( 'ssl' ) ) )
      $url = set_url_scheme( $url, 'https' );
  
    $raw_response = wp_remote_post( $url, $post_option );
    
    if ( $ssl && is_wp_error( $raw_response ) ) {
      $raw_response = wp_remote_post( $http_url, $post_option );
    }

    if ( is_wp_error( $raw_response ) || 200 != wp_remote_retrieve_response_code( $raw_response ) )
      return $transient;

    $response = json_decode( wp_remote_retrieve_body( $raw_response ), true );

    if($response){
  
        $obj = new stdClass();
        $obj->slug = $response['slug'];
        $obj->new_version = $response['new_version'];
        $obj->url = $response['url'];
        $obj->package = $response['package'];
        $obj->name = $response['name'];
        $transient->response[$plugin_file] = $obj;
    }

    return $transient;
  }

  function deactive_notice(){

    echo "<div class='error'>" .  esc_html__( 'Product Specification Table Widget For Elementor deactivated. The plugin need Elementor plugin, please install the plugin first.' ,'product-specification-for-elementor'). "</div>";

  }

  function deactive(){
    deactivate_plugins( array('monthly_anual_pricetable_for_elementor/monthly_anual_pricetable_for_elementor.php'), true, is_network_admin() );
  }

}

Product_specification_for_Elementor::instance();
