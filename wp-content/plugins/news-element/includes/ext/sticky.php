<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;

if ( !class_exists('news_element_sticky_section_column') ) {
    class news_element_sticky_section_column
    {
        public static function init()
        {

            add_action('elementor/element/container/section_layout_container/after_section_end', [__CLASS__,'container_controll'], 10, 2);

            add_action('elementor/element/common/_section_style/after_section_end', [__CLASS__,'tp_element_translate'], 20, 2);
        }

        public static function tp_element_translate($element, $args)
        {
            $element->start_controls_section(
                'section_necomwid',
                [
                    'label' => esc_html__('Widget Extra', 'the-pack-addon'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            ); 

            $element->add_responsive_control(
                'ne_wid_pos',
                [
                    'label' => esc_html__('Position', 'the-pack-addon'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'absolute' => [
                            'title' => esc_html__('Absolute', 'the-pack-addon'),
                            'icon' => 'eicon-tabs',
                        ],
                        'fixed' => [
                            'title' => esc_html__('Fixed', 'the-pack-addon'),
                            'icon' => 'eicon-text-field',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}}.elementor-element.elementor-widget' => 'position:{{VALUE}};',
                    ],                    
                ]
            );

            $element->add_responsive_control(
                'nettras',
                [
                    'label' => esc_html__('Top position', 'the-pack-addon'),
                    'type' => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => -1000,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => -100,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'size_units' => ['px', '%'],
                    'selectors' => [
                        '{{WRAPPER}}' => 'top:{{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $element->add_responsive_control(
                'nebtras',
                [
                    'label' => esc_html__('Bottom position', 'the-pack-addon'),
                    'type' => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => -1000,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => -100,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'size_units' => ['px', '%'],
                    'selectors' => [
                        '{{WRAPPER}}' => 'bottom:{{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $element->add_responsive_control(
                'neltras',
                [
                    'label' => esc_html__('Left position', 'the-pack-addon'),
                    'type' => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => -1000,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => -100,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'size_units' => ['px', '%'],
                    'selectors' => [
                        '{{WRAPPER}}' => 'left:{{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $element->add_responsive_control(
                'nerrps',
                [
                    'label' => esc_html__('Right spacing', 'the-pack-addon'),
                    'type' => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => -1000,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => -100,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'size_units' => ['px', '%'],
                    'selectors' => [
                        '{{WRAPPER}}' => 'right:{{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $element->end_controls_section();
        }
            
        public static function container_controll($element, $args){

            $element->start_controls_section(
                'ne_container_opt',
                [
                    'label' => esc_html__('Container Extra', 'the-pack-addon'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            $element->add_control(
                'ne_econ_rel',
                [
                    'label' => esc_html__('Inner relative position', 'the-pack-addon'),
                    'type' => Controls_Manager::SWITCHER,
                    'selectors' => [
                        '{{WRAPPER}} .e-con-inner' => 'position: relative;',
                    ],
                ]
            );

            $element->add_control(
                'ne_dis_rel',
                [
                    'label' => esc_html__('Disable widget relative position', 'the-pack-addon'),
                    'type' => Controls_Manager::SWITCHER,
                    'selectors' => [
                        '{{WRAPPER}} .elementor-widget' => 'position: initial;',
                    ],
                ]
            );

            $element->add_control(
                'ne_stik_sidebar',
                [
                    'label' => esc_html__('Sticky sidebar', 'the-pack-addon'),
                    'type' => Controls_Manager::SWITCHER,
                    'selectors' => [
                        '{{WRAPPER}}.e-con.e-child' => 'position:sticky;top:0px;',
                    ],                    
                ]
            );

            $element->end_controls_section();

        }

    }

    news_element_sticky_section_column::init();
}

