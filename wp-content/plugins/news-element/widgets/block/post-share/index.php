<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use News_Element\Khobish_Helper;

class ne_post_share extends Widget_Base{
    public function get_name() {
        return 'nepostashare';
    }

    public function get_title() {
        return   esc_html__( 'Post share', 'news-element' );
    }

    public function get_icon() {
        return 'dashicons dashicons-chart-bar';
    }

    public function get_categories() {
        return [ 'khobish-builder' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_title',
            [
                'label' =>   esc_html__( 'Content', 'news-element' ),
            ]
        );

        $repeater1 = new \Elementor\Repeater();

        $repeater1->add_control(
            'vendor', [
                'label' =>   esc_html__( 'Vendor', 'news-element' ),
                'type' => Controls_Manager::SELECT2,
                'options' => [
                    'facebook' => esc_html__( 'Facebook', 'the-pack-addon' ),
                    'x' => esc_html__( 'X', 'the-pack-addon' ),
                    'pinterest' => esc_html__( 'Pinterest', 'the-pack-addon' ),
                    'linkedin' => esc_html__( 'Linkedin', 'the-pack-addon' ),
                    'whatsapp' => esc_html__( 'Whatsapp', 'the-pack-addon' ),
                    'telegram' => esc_html__( 'Telegram', 'the-pack-addon' ),
                    'mail' => esc_html__( 'Email', 'the-pack-addon' ),
                    'threads' => esc_html__( 'Threads', 'the-pack-addon' ),
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
            'theme', [
                'label' =>   esc_html__('Theme', 'news-element'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background: {{VALUE}};',
                ],                
            ]
        ); 

        $this->add_control(
            'lists',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater1->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{ vendor }}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_dgeneral',
            [
                'label' =>   esc_html__('General', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'hidlbl', [
                'label' =>   esc_html__('Hide social label', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} a span' => 'display:none;',
                ],                
            ]
        );

        $this->add_control(
            'gro', [
                'label' =>   esc_html__('Grow item', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .has-text' => 'flex-grow:1;',
                ],                
            ]
        );

        $this->add_responsive_control(
            'gp',
            [
                'label' => esc_html__('Gap', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ne-post-share' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'dc', [
                'label' =>   esc_html__('Column direction', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .ne-post-share' => 'flex-direction:column;',
                ],                
            ]
        );

        $this->add_responsive_control(
            'wid',
            [
                'label' => esc_html__('Width', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ne-post-share a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ht',
            [
                'label' => esc_html__('Height', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ne-post-share a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'br',
            [
                'label' => esc_html__('Border radius', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ne-post-share a' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'klr',
            [
                'label' => esc_html__('Color', 'the-pack-addon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ne-post-share a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'blr',
            [
                'label' => esc_html__('Border color', 'the-pack-addon'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ne-post-share a' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'lig', [
                'label' =>   esc_html__('Label icon gap', 'news-element'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} a' => 'gap:{{SIZE}}{{UNIT}};',
                ],                
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'gty',
                'selector' => '{{WRAPPER}} .ne-post-share a',
                'label' => esc_html__('Typography', 'the-pack-addon'),
            ]
        );
        
        $this->end_controls_section();
    }

    protected function render( ) {

        $settings = $this->get_settings();
        require dirname(__FILE__) .'/view.php';

    }
}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\ne_post_share());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\ne_post_share());
}
