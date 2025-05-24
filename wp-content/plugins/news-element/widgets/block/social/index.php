<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use News_Element\Khobish_Helper;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class ae_social_buttons extends Widget_Base {

    public function get_name() {
        return 'xl-social';
    }
 
    public function get_title() {
        return __('Social List', 'news-element');
    }

    public function get_icon() {
        return 'eicon-social-icons';
    }

    public function get_categories() {
        return array('khobish-element');
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_pricing_table',
            [
                'label' => __('Social items', 'news-element'),
            ]
        );

        $this->add_control(
            'type',
            [
                'label' => __('Show as', 'news-element'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'list',
                'options' => [

                    'list' => [
                        'title' => __('List', 'news-element'),
                        'icon' => 'eicon-folder',
                    ],
                    'box' => [
                        'title' => __('Box', 'news-element'),
                        'icon' => 'eicon-lightbox',
                    ],
                    'border' => [
                        'title' => __('Border', 'news-element'),
                        'icon' => 'eicon-folder-o',
                    ],
                ],
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'icon', [
                'label' =>   esc_html__( 'Icon', 'news-element' ),
                'type' => Controls_Manager::ICONS,
				'default'     => [
					'value'   => 'fas fa-chevron-left',
					'library' => 'solid',
				],
            ]
        );

        $repeater1->add_control(
            'sub', [
                'label' =>   esc_html__( 'Subtitle', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater1->add_control(
            'count', [
                'label' =>   esc_html__( 'Count', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater1->add_control(
            'bg', [
                'label' =>   esc_html__('Theme', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background: {{VALUE}};',
                ],                 
            ]
        );

        $repeater1->add_control(
            'clr', [
                'label' =>   esc_html__('Color', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} i' => 'color: {{VALUE}};',
                ],                 
            ]
        );

        $repeater1->add_control(
            'url', [
                'label' =>   esc_html__('Social link url', 'news-element'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' =>   esc_html__('http://your-link.com', 'news-element'),
            ]
        );

        $this->add_control(
            'lists',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater1->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ elementor.helpers.renderIcon( this, icon, {}, "i", "panel" ) || \'<i class="{{ icon }}" aria-hidden="true"></i>\' }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __('General', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'gap',
            [
                'label' =>   esc_html__( 'Gap', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                 'selectors' => [
                        '{{WRAPPER}} .ne-social-profile.style-one' => 'gap:{{SIZE}}{{UNIT}}',
                        '{{WRAPPER}} .ne-gutter' => 'margin: 0 0 -{{SIZE}}{{UNIT}} -{{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .ne-gutter>div[class^="ne-df-"]' => 'padding: 0 0 {{SIZE}}{{UNIT}} {{SIZE}}{{UNIT}};',                         
                 ],
            ]
        );

        $this->add_responsive_control(
            'width',
            [
                'label' =>   esc_html__( 'Column width', 'news-element' ),
                'type' =>  Controls_Manager::NUMBER,
                'default' => '50',
                 'selectors' => [
                        '{{WRAPPER}} .style-one a' => 'flex: 0 0 {{VALUE}}%;-ms-flex: 0 0 {{VALUE}}%;max-width:{{VALUE}}%',
                        '{{WRAPPER}} .ne-gutter .ne-df-50' => 'flex:0 0 {{VALUE}}%;width:{{VALUE}}%;',
                 ],
            ]
        );

        $this->add_control(
            'item_pad',
            [
                'label' => __('Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_control(
            'bdclr',
            [
                'label' =>   esc_html__( 'Border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a' => 'border:1px solid {{VALUE}};'
                ],
            ]
        );

        $this->add_responsive_control(
            'brd',
            [
                'label' =>   esc_html__( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                 'selectors' => [
                        '{{WRAPPER}} a' => 'border-radius:{{SIZE}}{{UNIT}}',
                 ],
            ]
        );

        $this->end_controls_section();

         $this->start_controls_section(
            'section_style3',
            [
                'label' => __('Icon', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'igap',
            [
                'label' =>   esc_html__( 'Gap', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                 'selectors' => [
                        '{{WRAPPER}} .style-one .social-left' => 'gap:{{SIZE}}{{UNIT}}',
                        '{{WRAPPER}} .style-two .ne-v-center' => 'gap:{{SIZE}}{{UNIT}}',
                 ],
            ]
        );

        $this->add_control(
            'iclr',
            [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a i' => 'color:{{VALUE}};'
                ],
            ]
        );

        $this->end_controls_section();

         $this->start_controls_section(
            'section_labels',
            [
                'label' => __('Label', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sclr',
            [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sub' => 'color:{{VALUE}};'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'c_typography',
                'selector' => '{{WRAPPER}} .sub',
                'label' => __( 'Typography', 'news-element' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_cny',
            [
                'label' => __('Counter', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'cclr',
            [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .count' => 'color:{{VALUE}};'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'c_c',
                'selector' => '{{WRAPPER}} .count',
                'label' => __( 'Typography', 'news-element' ),
            ]
        );

        $this->end_controls_section();


    }

    protected function render() {

        $settings = $this->get_settings();
        require dirname(__FILE__) .'/'. sanitize_key($settings['type']) .'.php';
    }

}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\ae_social_buttons());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\ae_social_buttons());
}
