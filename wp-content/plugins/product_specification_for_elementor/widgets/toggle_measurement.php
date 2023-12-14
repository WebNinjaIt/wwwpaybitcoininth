<?php
namespace Elementor;
/**
 * @package     WordPress
 * @subpackage  Product Specification Table Widget For Elementor
 * @author      support@themegum.com
 * @since       1.0.0
*/
defined('ABSPATH') or die();

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Box_Shadow;

class Product_Specification_Toggle_Elementor_Widget extends Widget_Base {


  public function __construct( $data = [], $args = null ) {
    parent::__construct( $data, $args );

    $is_type_instance = $this->is_type_instance();

    if ( ! $is_type_instance && null === $args ) {
      throw new \Exception( '`$args` argument is required when initializing a full widget instance.' );
    }

    add_action( 'elementor/element/before_section_start', [ $this, 'enqueue_script' ] );

    if ( $is_type_instance ) {
      $this->_register_skins();

      $widget_name = $this->get_name();

      /**
       * Widget skin init.
       *
       * Fires when Elementor widget is being initialized.
       *
       * The dynamic portion of the hook name, `$widget_name`, refers to the widget name.
       *
       * @since 1.0.0
       *
       * @param Widget_Base $this The current widget.
       */
      do_action( "elementor/widget/{$widget_name}/skins_init", $this );
    }
  }

  /**
   * Get widget name.
   *
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget name.
   */
  public function get_name() {
    return 'temegum_toggle_measurement';
  }

  /**
   * Get widget title.
   *
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget title.
   */
  public function get_title() {

    return esc_html__( 'Toggle Measurement', 'product-specification-for-elementor' );
  }

  /**
   * Get widget icon.
   *
   *
   * @since 1.0.0
   * @access public
   *
   * @return string Widget icon.
   */
  public function get_icon() {
    return 'fas fa-swatchbook';
  }

  public function get_keywords() {
    return [ 'wordpress', 'widget', 'toggle','measurement','button' ];
  }

  /**
   * Get widget categories.
   *
   *
   * @since 1.0.0
   * @access public
   *
   * @return array Widget categories.
   */
  public function get_categories() {
    return [ 'temegum' ];
  }

  protected function _register_controls() {



    $this->start_controls_section(
      'section_title',
      [
        'label' => esc_html__( 'Toggle Label', 'product-specification-for-elementor' ),
      ]
    );

    $this->add_control(
      'first_label',
      [
        'label' => esc_html__( '1st Label', 'product-specification-for-elementor' ),
        'type' => Controls_Manager::TEXT,
        'label_block' => true,
        'dynamic' => [
          'active' => false,
        ],
        'default' => esc_html__( '1st Label', 'product-specification-for-elementor' ),
      ]
    );

    $this->add_control(
      'second_label',
      [
        'label' => esc_html__( '2nd Label', 'product-specification-for-elementor' ),
        'type' => Controls_Manager::TEXT,
        'label_block' => true,
        'dynamic' => [
          'active' => false,
        ],
        'default' => esc_html__( '2nd Label', 'product-specification-for-elementor' ),
      ]
    );


    $this->add_responsive_control(
      'align',
      [
        'label' => esc_html__( 'Position', 'product-specification-for-elementor' ),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
          'left' => [
            'title' => esc_html__( 'Left', 'product-specification-for-elementor' ),
            'icon' => 'eicon-h-align-left',
          ],
          'center' => [
            'title' => esc_html__( 'Center', 'product-specification-for-elementor' ),
            'icon' => 'eicon-h-align-center',
          ],
          'right' => [
            'title' => esc_html__( 'Right', 'product-specification-for-elementor' ),
            'icon' => 'eicon-h-align-right',
          ],
        ],
        'default' => 'center',
        'selectors' => [
          '{{WRAPPER}} .universal-switch-wrap' => 'text-align: {{VALUE}};',
        ],
      ]
    );


    $this->add_control(
      'target_id',
      [
        'label' => esc_html__( 'Section CSS ID (optional)', 'product-specification-for-elementor' ),
        'type' => Controls_Manager::TEXT,
        'default' => '',
        'title' => esc_html__( 'CSS ID from section NOT this widget ID. You can founded on target section settings: Advanced > CSS ID', 'product-specification-for-elementor' ),
        'description' => esc_html__( 'Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows A-z 0-9 & underscore chars without spaces.', 'product-specification-for-elementor' ),
      ]
    );

    $this->end_controls_section();

/*
 * style params
 */

    $this->start_controls_section(
      'title_style',
      [
        'label' => esc_html__( 'Toggle Label', 'product-specification-for-elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
      ]
    );    


    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'typography_title',
        'selector' => '{{WRAPPER}} .switcher',
      ]
    );


    $this->add_responsive_control(
      'all_padding',
      [
        'label' => esc_html__( 'Vertical Padding', 'product-specification-for-elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', '%' ],
        'allowed_dimensions' => 'vertical',
        'placeholder' => [
          'top' => '',
          'right' => '0',
          'bottom' => '',
          'left' => '0',
        ],
        'selectors' => [
          '{{WRAPPER}} .universal-switch .switcher' => 'padding: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
        ],
      ]
    );


    $this->add_responsive_control(
      'main_padding',
      [
        'label' => esc_html__( '1st Label Padding', 'product-specification-for-elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', '%' ],
        'allowed_dimensions' => 'horizontal',
        'placeholder' => [
          'top' => '0',
          'right' => '',
          'bottom' => '0',
          'left' => '',
        ],
        'selectors' => [
          '{{WRAPPER}} .universal-switch .first-value span' => 'padding: 0 {{RIGHT}}{{UNIT}} 0 {{LEFT}}{{UNIT}};',
        ],
      ]
    );



    $this->add_responsive_control(
      'anual_padding',
      [
        'label' => esc_html__( '2nd Label Padding', 'product-specification-for-elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', '%' ],
        'allowed_dimensions' => 'horizontal',
        'placeholder' => [
          'top' => '0',
          'right' => '',
          'bottom' => '0',
          'left' => '',
        ],
        'selectors' => [
          '{{WRAPPER}} .universal-switch .second-value span' => 'padding: 0 {{RIGHT}}{{UNIT}} 0 {{LEFT}}{{UNIT}};',
        ],
      ]
    );


    $this->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => 'period_border',
        'selector' => '{{WRAPPER}} .universal-switch-wrap .universal-switch',
      ]
    );

    $this->add_control(
      'period_border_radius',
      [
        'label' => esc_html__( 'Border Radius', 'product-specification-for-elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors' => [
          '{{WRAPPER}} .universal-switch-wrap .universal-switch' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ]
      ]
    );

    $this->start_controls_tabs( 'period_styles' );

    $this->start_controls_tab(
      'period_style',
      [
        'label' => esc_html__( 'Normal', 'product-specification-for-elementor' ),
      ]
    );

    $this->add_control(
      'title_color',
      [
        'label' => esc_html__( 'Color', 'product-specification-for-elementor' ),
        'type' =>  Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .universal-switch .switcher' => 'color: {{VALUE}};',
        ]
      ]
    );

    $this->add_control(
      'title_bgcolor',
      [
        'label' => esc_html__( 'Background', 'product-specification-for-elementor' ),
        'type' =>  Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .universal-switch .switcher' => 'background-color: {{VALUE}};',
        ],
      ]
    );

    $this->end_controls_tab();
    $this->start_controls_tab(
      'period_active_style',
      [
        'label' => esc_html__( 'Active Label', 'product-specification-for-elementor' ),
      ]
    );

    $this->add_control(
      'period_active_color',
      [
        'label' => esc_html__( 'Color', 'product-specification-for-elementor' ),
        'type' =>  Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .universal-switch .switcher.active' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_control(
      'period_active_bgcolor',
      [
        'label' => esc_html__( 'Background', 'product-specification-for-elementor' ),
        'type' =>  Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .universal-switch .switcher.active' => 'background-color: {{VALUE}};',
        ],
      ]
    );

    $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->end_controls_section();


  }

  protected function render() {

    $settings = $this->get_settings_for_display();

    extract( $settings );

    $this->add_inline_editing_attributes( 'first_label', 'none' );
    $this->add_inline_editing_attributes( 'second_label', 'none' );

?>
    <div class="universal-switch-wrap">
      <ul class="universal-switch" data-target="<?php esc_attr_e($target_id);?>">
      <li class="switcher active first-value"><span <?php echo $this->get_render_attribute_string( 'first_label' ); ?>><?php print esc_html($first_label);?></span></li><li class="switcher second-value"><span <?php echo $this->get_render_attribute_string( 'second_label' ); ?>><?php print esc_html($second_label);?></span></li>
      </ul>
    </div>
<?php

  }

  public function enqueue_script( ) {

    wp_enqueue_style( 'temegum-spec-table',PST_ELEMENTOR_URL."css/style.css",array());
    wp_enqueue_script( 'temegum-spec-table', PST_ELEMENTOR_URL . 'js/spec-table.js', array('jquery'), '1.0', false );
  }


}


// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Product_Specification_Toggle_Elementor_Widget() );

?>