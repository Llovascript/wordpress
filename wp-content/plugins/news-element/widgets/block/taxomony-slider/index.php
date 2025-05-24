<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use News_Element\Khobish_Helper;
use Elementor\Utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Newselement_Taxonomy_Slide extends Widget_Base {

    // Enqueue styles
	public function get_style_depends() {
		return ['swiper','e-swiper'];
	}

	// Enqueue scripts
	public function get_script_depends() {
		return ['swiper'];
	}

    public function get_name() {
        return 'netaxslider';
    }

    public function get_title() {
        return   esc_html__('Taxonomy slider', 'news-element');
    }

    public function get_icon() {
        return 'dashicons dashicons-update';
    }

    public function get_categories() {
        return ['khobish-builder'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_heading',
            [
                'label' =>   esc_html__('Taxonomy', 'news-element'),
            ]
        );

        $r1 = new \Elementor\Repeater();
        $r1->add_control(
            'meta', [
                'label' =>   esc_html__( 'Taxonomy', 'news-element' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => false,
                'options' =>  Khobish_Helper::khobish_all_terms(),
            ]
        );

        $r1->add_control(
            'img', [
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'label' => __('Image', 'news-element'),
                'label_block' => true
            ]
        );

        $r1->add_control(
            'high',
            [
                'label' => __( 'Tooltip', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );

        $this->add_control(
            'taxi',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $r1->get_controls(),
                'prevent_empty' => false,
                'title_field' => '{{{ meta }}}',
            ]
        );

        $this->add_control(
            'prefix',
            [
                'label' => __( 'Counter suffix', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );

        $this->add_control(
            'img',
            [
                'label' => __('Image size', 'news-element'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' =>  Khobish_Helper::ae_image_size_choose(),
                'multiple' => false,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_gnrl', 
            [
                'label' =>   esc_html__('General', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'disp',
            [
                'label' => esc_html__('Display type', 'educat'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'grid' => [
                        'title' => esc_html__('Grid', 'educat'),
                        'icon' => 'dashicons dashicons-screenoptions',
                    ],
                    'slide' => [
                        'title' => esc_html__('Slide', 'educat'),
                        'icon' => 'dashicons dashicons-image-flip-horizontal',
                    ]                   
                ],
                'default' => 'grid',
            ]
        );

        $this->add_responsive_control(
            'itspce',
            [
                'label' => __( 'Column gap', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'condition' => [
                    'disp' => ['grid'],
                ],                 
                'selectors' => [
                    '{{WRAPPER}} .news-slider' => 'row-gap: {{SIZE}}{{UNIT}};column-gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cntsp',
            [
                'label' => __( 'Image content gap', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tax-item' => 'gap:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'dcol',
            [
                'label' => __('Display grid', 'news-element'),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .tax-item' => 'flex-direction: column;',
                ]
            ]
        );

        $this->add_control(
            'gbg',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tax-item' => 'background: {{VALUE}};',
                ]
            ]
        );
 
        $this->add_control(
            'gbdbg',
            [
                'label' => __( 'Border', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tax-item' => 'border:1px solid {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'ghbg',
            [
                'label' => __( 'Hover background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tax-item:hover' => 'background: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'gbhdbg',
            [
                'label' => __( 'Hover border', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tax-item:hover' => 'border:1px solid {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'gbrd',
            [
                'label' => esc_html__('Border radius', 'the-pack-addon'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .tax-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'gpad',
            [
                'label' => esc_html__('Padding', 'the-pack-addon'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .tax-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_img',
            [
                'label' =>   esc_html__('Image', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'imgwd',
            [
                'label' => __( 'Width', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 500,
                    ]
                ],
                'size_units' => ['px','%'],   
                'selectors' => [
                    '{{WRAPPER}} .thumb img' => 'width:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'imght',
            [
                'label' => __( 'Height', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 500,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .thumb img' => 'height:{{SIZE}}{{UNIT}};object-fit:cover;',
                ],
            ]
        );

        $this->add_responsive_control(
            'imgbr',
            [
                'label' => __( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 500,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .thumb img' => 'border-radius:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_highlt',
            [
                'label' =>   esc_html__('Tooltip', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'tlvp',
            [
                'label' => __( 'Vertical position', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 500,
                        'min' => -500,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .highlight' => 'top:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'tlhp',
            [
                'label' => __( 'Horizontal position', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 500,
                        'min' => -500,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .highlight' => 'left:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'tl_pad',
            [
                'label' => __('Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .highlight' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        
        $this->add_responsive_control(
            'tlbr',
            [
                'label' => __( 'Border radius', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .highlight' => 'border-radius:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'tlbg',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .highlight' => 'background: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'tlclr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .highlight' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tltyp',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .highlight',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_con',
            [
                'label' =>   esc_html__('Content', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'nvsp',
            [
                'label' => __( 'Spacing', 'news-element' ),
                'type' =>  Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tax-content' => 'gap:{{SIZE}}{{UNIT}};display:flex;align-items:center;',
                ],
            ]
        );

        $this->add_control(
            'n_bgf',
            [
                'label' => esc_html__('Hide taxonomy counter', 'the-pack-addon'),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .tax-count' => 'display: none;',
                ],
            ]
        );


        $this->start_controls_tabs('gt');

        $this->start_controls_tab(
            't1',
            [
                'label' => esc_html__('Label', 'the-pack-addon'),
            ]
        );

        $this->add_control(
            'tclr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tax-label' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttyp',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .tax-label',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            't2',
            [
                'label' => esc_html__('Count', 'the-pack-addon'),
                'condition' => [
                    'n_bgf!' => ['yes'],
                ],                
            ]
        );

        $this->add_control(
            'cclr',
            [
                'label' => __( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tax-count' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ctyp',
                'label' => __('Typography', 'news-element'),
                'selector' => '{{WRAPPER}} .tax-count',
            ] 
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        do_action('newsmag_swiper_control', $this);

    }

    protected function render() {
        $settings = $this->get_settings();
        require dirname(__FILE__) .'/'. $settings['disp'] .'.php';        

    }
}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\Newselement_Taxonomy_Slide());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\Newselement_Taxonomy_Slide());
}
