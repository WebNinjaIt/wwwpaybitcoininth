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
use Elementor\Scheme_Typography;
use Elementor\Icons_Manager;
use Elementor\Repeater;

class Product_Spesification_Table_Widget extends Widget_Base {


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
    return 'temegum_spectable';
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

    return esc_html__( 'Specification Table', 'product-specification-for-elementor' );
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
    return 'fas fa-table';
  }

  public function get_keywords() {
    return [ 'wordpress', 'widget', 'table','spesification','product' ];
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



    $repeater = new Repeater();

    $repeater->add_control(
      'list_content',
      [
        'label' => esc_html__( 'Specification', 'product-specification-for-elementor' ),
        'type' => Controls_Manager::TEXTAREA,
        'default' => esc_html__( 'Lorem ipsum dolor sit amet', 'product-specification-for-elementor' ),
        'rows' => 3,
        'label_block' => true,
      ]
    );

    $repeater->add_control(
      'list_value_even',
      [
        'label' => esc_html__( '1st Value', 'product-specification-for-elementor' ),
        'type' => Controls_Manager::TEXT,
        'default' => '',
      ]
    );

    $repeater->add_control(
      'list_value_odd',
      [
        'label' => esc_html__( '2nd Value', 'product-specification-for-elementor' ),
        'type' => Controls_Manager::TEXT,
        'default' => '',
      ]
    );


    $this->start_controls_section(
      'section_price_items',
      [
        'label' => esc_html__( 'Product Specification', 'product-specification-for-elementor' ),
      ]
    );



    $this->add_control(
      'lists',
      [
        'label' => esc_html__( 'Specification Item', 'product-specification-for-elementor' ),
        'type' => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'list_content' => esc_html__( 'Specification #1', 'product-specification-for-elementor' ),
            'list_value_even' => esc_html__( 'Lorem ipsum', 'product-specification-for-elementor' ),
          ],
          [
            'list_content' => esc_html__( 'Specification #2', 'product-specification-for-elementor' ),
            'list_value_even' => esc_html__( 'Lorem ipsum', 'product-specification-for-elementor' ),
          ],
          [
            'list_content' => esc_html__( 'Specification #3', 'product-specification-for-elementor' ),
            'list_value_even' => esc_html__( 'Lorem ipsum', 'product-specification-for-elementor' ),
          ],
          [
            'list_content' => esc_html__( 'Specification #4', 'product-specification-for-elementor' ),
            'list_value_even' => esc_html__( 'Lorem ipsum', 'product-specification-for-elementor' ),
          ]
        ],
        'title_field' => '{{{ list_content }}}',
      ]
    );


    $this->end_controls_section();

/*
 * style params
 */

    $this->start_controls_section(
      'section_list_style',
      [
        'label' => esc_html__( 'Specification', 'product-specification-for-elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
      ]
    );    

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      [
        'name' => 'typography_spec_title',
        'selector' => '{{WRAPPER}} .temegum-spec-table .spec-content',
      ]
    );



    $this->add_control(
      'table_desc_width',
      [
        'label' => esc_html__( 'Width', 'product-specification-for-elementor' ),
        'type' => Controls_Manager::SLIDER,
        'range' => [
          '%' => [
            'min' => 10,
            'max' => 90,
            'step'=> 5
          ],
        ],
        'default' => [
          'size' => '50',
          'unit' => '%'
        ],
        'selectors' => [
          '{{WRAPPER}} .temegum-spec-table .spec-desc' => 'width: {{SIZE}}%;',
        ],
      ]
    );


    $this->add_responsive_control(
      'table_desc_padding',
      [
        'label' => esc_html__( 'Padding', 'product-specification-for-elementor' ),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', '%' ],
        'selectors' => [
          '{{WRAPPER}} .temegum-spec-table .spec-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $this->add_group_control(
      Group_Control_Border::get_type(),
      [
        'name' => 'table_desc_border',
        'selector' => '{{WRAPPER}} .temegum-spec-table .spec-desc',
      ]
    );

    $this->start_controls_tabs( 'table_list_styles' );

    $this->start_controls_tab(
      'table_desc_style',
      [
        'label' => esc_html__( 'Normal', 'product-specification-for-elementor' ),
      ]
    );


    $this->add_control(
      'list_desc_color',
      [
        'label' => esc_html__( 'Color', 'product-specification-for-elementor' ),
        'type' =>  Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .temegum-spec-table .spec-desc' => 'color: {{VALUE}};',
        ]
      ]
    );


    $this->add_control(
      'list_odddesc_bgcolor',
      [
        'label' => esc_html__( 'Odd Row Background', 'product-specification-for-elementor' ),
        'type' =>  Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .temegum-spec-table tr:nth-child(odd) td.spec-desc' => 'background-color: {{VALUE}};',
        ]
      ]
    );


    $this->add_control(
      'list_evendesc_bgcolor',
      [
        'label' => esc_html__( 'Even Row Background', 'product-specification-for-elementor' ),
        'type' =>  Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .temegum-spec-table tr:nth-child(even) td.spec-desc' => 'background-color: {{VALUE}};',
        ]
      ]
    );

    $this->end_controls_tab();
    $this->start_controls_tab(
      'table_list_hover_style',
      [
        'label' => esc_html__( 'Hover', 'product-specification-for-elementor' ),
      ]
    );


    $this->add_control(
      'list_hover_color',
      [
        'label' => esc_html__( 'Color', 'product-specification-for-elementor' ),
        'type' =>  Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .temegum-spec-table tr:hover .spec-desc' => 'color: {{VALUE}};',
        ]
      ]
    );

    $this->add_control(
      'list_desc_hover_border_color',
      [
        'label' => esc_html__( 'Border Color', 'product-specification-for-elementor' ),
        'type' => Controls_Manager::COLOR,
        'condition' => [
          'table_desc_border_border!' => '',
        ],
        'selectors' => [
          '{{WRAPPER}} .temegum-spec-table tr:hover td.spec-desc, {{WRAPPER}} .temegum-spec-table tr:focus td.spec-desc' => 'border-color: {{VALUE}};',
        ],
      ]
    );


    $this->add_control(
      'list_odddesc_hover_bgcolor',
      [
        'label' => esc_html__( 'Odd Row Background', 'product-specification-for-elementor' ),
        'type' =>  Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .temegum-spec-table tr:nth-child(odd):hover td.spec-desc' => 'background-color: {{VALUE}};',
        ]
      ]
    );


    $this->add_control(
      'list_evendesc_hover_bgcolor',
      [
        'label' => esc_html__( 'Even Row Background', 'product-specification-for-elementor' ),
        'type' =>  Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .temegum-spec-table tr:nth-child(even):hover td.spec-desc' => 'background-color: {{VALUE}};',
        ]
      ]
    );

    $this->end_controls_tab();
    $this->end_controls_tabs();

    $this->end_controls_section();


    $this->start_controls_section(
        'section_value_styles',
        [
          'label' => esc_html__( 'Value', 'product-specification-for-elementor' ),
          'tab'   => Controls_Manager::TAB_STYLE,
        ]
      );    

      $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
          'name' => 'typography_spec_value',
          'selector' => '{{WRAPPER}} .temegum-spec-table .spec-value',
        ]
      );

      $this->add_responsive_control(
        'table_value_padding',
        [
          'label' => esc_html__( 'Padding', 'product-specification-for-elementor' ),
          'type' => Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', 'em', '%' ],
          'selectors' => [
            '{{WRAPPER}} .temegum-spec-table .spec-value' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
        ]
      );

      $this->add_group_control(
        Group_Control_Border::get_type(),
        [
          'name' => 'table_value_border',
          'selector' => '{{WRAPPER}} .temegum-spec-table .spec-value',
        ]
      );

      $this->start_controls_tabs( 'table_value_styles' );

      $this->start_controls_tab(
        'table_value_style',
        [
          'label' => esc_html__( 'Normal', 'product-specification-for-elementor' ),
        ]
      );


      $this->add_control(
        'list_value_color',
        [
          'label' => esc_html__( 'Color', 'product-specification-for-elementor' ),
          'type' =>  Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
            '{{WRAPPER}} .temegum-spec-table .spec-value' => 'color: {{VALUE}};',
          ]
        ]
      );

      $this->add_control(
        'list_oddvalue_bgcolor',
        [
          'label' => esc_html__( 'Odd Row Background', 'product-specification-for-elementor' ),
          'type' =>  Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
            '{{WRAPPER}} .temegum-spec-table tr:nth-child(odd) td.spec-value' => 'background-color: {{VALUE}};',
          ]
        ]
      );


      $this->add_control(
        'list_evenvalue_bgcolor',
        [
          'label' => esc_html__( 'Even Row Background', 'product-specification-for-elementor' ),
          'type' =>  Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
            '{{WRAPPER}} .temegum-spec-table tr:nth-child(even) td.spec-value' => 'background-color: {{VALUE}};',
          ]
        ]
      );

      $this->end_controls_tab();
      $this->start_controls_tab(
        'table_value_hover_style',
        [
          'label' => esc_html__( 'Hover', 'product-specification-for-elementor' ),
        ]
      );


      $this->add_control(
        'list_value_hover_color',
        [
          'label' => esc_html__( 'Color', 'product-specification-for-elementor' ),
          'type' =>  Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
            '{{WRAPPER}} .temegum-spec-table tr:hover .spec-value' => 'color: {{VALUE}};',
          ]
        ]
      );

      $this->add_control(
        'list_value_hover_border_color',
        [
          'label' => esc_html__( 'Border Color', 'product-specification-for-elementor' ),
          'type' => Controls_Manager::COLOR,
          'condition' => [
            'table_value_border_border!' => '',
          ],
          'selectors' => [
            '{{WRAPPER}} .temegum-spec-table tr:hover td.spec-value, {{WRAPPER}} .temegum-spec-table tr:focus td.spec-value' => 'border-color: {{VALUE}};',
          ],
        ]
      );

      $this->add_control(
        'list_oddvalue_hover_bgcolor',
        [
          'label' => esc_html__( 'Odd Row Background', 'product-specification-for-elementor' ),
          'type' =>  Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
            '{{WRAPPER}} .temegum-spec-table tr:nth-child(odd):hover td.spec-value' => 'background-color: {{VALUE}};',
          ]
        ]
      );

      $this->add_control(
        'list_evenvalue_hover_bgcolor',
        [
          'label' => esc_html__( 'Even Row Background', 'product-specification-for-elementor' ),
          'type' =>  Controls_Manager::COLOR,
          'default' => '',
          'selectors' => [
            '{{WRAPPER}} .temegum-spec-table tr:nth-child(even):hover td.spec-value' => 'background-color: {{VALUE}};',
          ]
        ]
      );

      $this->end_controls_tab();
      $this->end_controls_tabs();

      $this->end_controls_section();

  }

  protected function render() {

    $settings = $this->get_settings_for_display();

    extract( $settings );

    if(!count($lists)) return;


    $compile  = '<div class="temegum-spec-table"><table cellspacing="0"><tbody>';

    foreach ($lists as $index => $list) {


            $repeater_setting_key = $this->get_repeater_setting_key( 'list_content', 'lists', $index );
            $this->add_inline_editing_attributes( $repeater_setting_key );
            $this->add_render_attribute( $repeater_setting_key , 'class', 'spec-content' );

            $list_value = '';

            $list_value_even = $list['list_value_even'];
            $list_value_odd = $list['list_value_odd'];

            $repeater_even_key = $this->get_repeater_setting_key( 'list_value_even', 'lists', $index );
            $this->add_inline_editing_attributes( $repeater_even_key );

             if($list_value_even !='' && $list_value_odd !=''){

                $this->add_render_attribute( $repeater_even_key , 'class', 'even-value' );

                $list_value = sprintf('<span class="has-double"><span '.$this->get_render_attribute_string( $repeater_even_key ).'>%1s</span><span class="odd-value">%2s</span></span>', $list_value_even , $list_value_odd );
             }
             elseif($list_value_odd !=''){
                $list_value = sprintf('<span '.$this->get_render_attribute_string( $repeater_even_key ).'>%1s</span>', $list_value_odd);
             }
             else{
                $list_value = sprintf('<span '.$this->get_render_attribute_string( $repeater_even_key ).'>%1s</span>', $list_value_even);
             }

           $compile.='<tr class="elementor-repeater-item-'.$list['_id'].'"><td class="spec-desc"><span '.$this->get_render_attribute_string( $repeater_setting_key ).'>'.esc_html($list['list_content']).'</span></td><td class="spec-value">'.$list_value.'</td></tr>';
    }

    $compile .= '</tbody></table></div>';

    print $compile;

  }
  protected function content_template() {
    ?>
<div class="temegum-spec-table"><table cellspacing="0"><tbody>
    <# 
    if ( settings.lists ) {

    _.each( settings.lists, function( list, index) {
      
          var list_value = '', list_value_even = list.list_value_even, list_value_odd = list.list_value_odd;
          var repeater_setting_key = view.getRepeaterSettingKey( 'list_content', 'lists', index );
          view.addInlineEditingAttributes( repeater_setting_key );
          view.addRenderAttribute( repeater_setting_key , 'class', 'spec-content' );

          var repeater_even_key = view.getRepeaterSettingKey( 'list_value_even', 'lists', index );
          view.addInlineEditingAttributes( repeater_even_key );


           if(list_value_even !='' && list_value_odd !=''){

              view.addRenderAttribute( repeater_even_key , 'class', 'even-value' );

              list_value = '<span class="has-double"><span ' + view.getRenderAttributeString( repeater_even_key ) + '>'+ list_value_even + '</span><span class="odd-value">'+ list_value_odd + '</span></span>';

           }
           else if(list_value_odd !=''){
              list_value = '<span ' + view.getRenderAttributeString( repeater_even_key ) + '>'+ list_value_odd + '</span>';
           }
           else{
              list_value = '<span ' + view.getRenderAttributeString( repeater_even_key ) + '>'+ list_value_even + '</span>';
           }

          #>
           <tr class="elementor-repeater-item-{{ list._id }}"><td class="spec-desc"><span {{{ view.getRenderAttributeString( repeater_setting_key ) }}}>{{{ list.list_content }}}</span></td><td class="spec-value">{{{list_value}}}</td></tr>
    <# });
    }
    #>
</tbody></table></div>
    <?php
  }

  public function enqueue_script( ) {
    wp_enqueue_style( 'temegum-spec-table',PST_ELEMENTOR_URL."css/style.css",array());
    wp_enqueue_script( 'temegum-spec-table', PST_ELEMENTOR_URL . 'js/spec-table.js', array('jquery'), '1.0', false );
  }

}


// Register widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Product_Spesification_Table_Widget() );

?>