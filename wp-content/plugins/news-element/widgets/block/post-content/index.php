<?php

namespace News_Element\Widgets;
use Elementor;
use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use News_Element\Khobish_Helper;
use WP_Query;

class news_ele_post_content extends Widget_Base{
    public function get_name() {
        return 'khbthmpstcont';
    }

    public function get_title() {
        return   esc_html__( 'Content', 'news-element' );
    }

    public function get_icon() {
        return 'dashicons dashicons-chart-pie';
    }

    public function get_categories() {
        return ['khobish-builder'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_general_style',
            [
                'label' =>   esc_html__( 'General', 'news-element' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

         $this->add_control(
            'prev_id',
            [
                'label' => __('Preview Post', 'news-element'),
                'type' => Controls_Manager::SELECT2,
                'options' => Khobish_Helper::khobish_drop_posts('post'),
                'multiple' => false,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'color',
            [
                'label' =>   esc_html__( 'Content Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-builder' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_align',
            [
                'label' =>   esc_html__( 'Content Align', 'news-element' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' =>   esc_html__( 'Left', 'news-element' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' =>   esc_html__( 'Center', 'news-element' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' =>   esc_html__( 'Right', 'news-element' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' =>   esc_html__('Justified', 'news-element'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .content-builder' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'dropcap',
            [
                'label' => __( 'Dropcap', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'toc',
            [
                'label' => __( 'Enable toc', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_tocs',
            [
                'label' =>   esc_html__( 'TOC', 'news-element' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'toc' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'inline_toc',
            [
                'label' => __( 'Inline TOC', 'news-element' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'toc_after',
            [
                'label' => __( 'Insert after paragraph', 'news-element' ),
                'type' => Controls_Manager::SLIDER,
            ]
        );


        $this->add_control(
            'toc_lbl',
            [
                'label' => __( 'Label', 'news-element' ),
                'type' => Controls_Manager::TEXT,
                'label_block'=> true
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_heading',
            [
                'label' =>   esc_html__( 'Heading', 'news-element' ),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'h1',
            [
                'label' =>   esc_html__( 'H1', 'news-element' ),
                'type' => Controls_Manager::RAW_HTML,
                'separator'=>'after'
            ]
        );

        do_action('newsmag_heading_style', $this,'h1_','.content-builder>h1');

        $this->add_control(
            'h2',
            [
                'label' =>   esc_html__( 'H2', 'news-element' ),
                'type' => Controls_Manager::RAW_HTML,
                'separator'=>'after'
            ]
        );

        do_action('newsmag_heading_style', $this,'h2_','.content-builder>h2');

        $this->add_control(
            'h3',
            [
                'label' =>   esc_html__( 'H3', 'news-element' ),
                'type' => Controls_Manager::RAW_HTML,
                'separator'=>'after'
            ]
        );

        do_action('newsmag_heading_style', $this,'h3_','.content-builder>h3');

        $this->add_control(
            'h4',
            [
                'label' =>   esc_html__( 'H4', 'news-element' ),
                'type' => Controls_Manager::RAW_HTML,
                'separator'=>'after'
            ]
        );

        do_action('newsmag_heading_style', $this,'h4_','.content-builder>h4');

        $this->add_control(
            'h5',
            [
                'label' =>   esc_html__( 'H5', 'news-element' ),
                'type' => Controls_Manager::RAW_HTML,
                'separator'=>'after'
            ]
        );

        do_action('newsmag_heading_style', $this,'h5_','.content-builder>h5');

        $this->add_control(
            'h6',
            [
                'label' =>   esc_html__( 'H6', 'news-element' ),
                'type' => Controls_Manager::RAW_HTML,
                'separator'=>'after'
            ]
        );

        do_action('newsmag_heading_style', $this,'h6_','.content-builder>h6');

        $this->end_controls_section();

        $this->start_controls_section(
            'section_pgraf',
            [
                'label' =>   esc_html__('Paragraph', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        do_action('newsmag_heading_style', $this,'p_','.content-builder>p');

        $this->end_controls_section();

        $this->start_controls_section(
            'section_img',
            [
                'label' =>   esc_html__('Image', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->start_controls_tabs('maling');

        $this->start_controls_tab(
            'img1',
            [
                'label' => esc_html__( 'Left', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'img1-mr',
            [
                'label' =>   esc_html__('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .content-builder .wp-block-image .alignleft' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'img2',
            [
                'label' => esc_html__( 'Center', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'img2-mr',
            [
                'label' =>   esc_html__('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .content-builder .wp-block-image .aligncenter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'img3',
            [
                'label' => esc_html__( 'Right', 'news-element' ),
            ]
        );

        $this->add_responsive_control(
            'img3-mr',
            [
                'label' =>   esc_html__('Margin', 'news-element'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .content-builder .wp-block-image .alignright' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section(); 

        $this->start_controls_section(
            'section_bloquot',
            [
                'label' =>   esc_html__('Blockquote', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'qtbg',
            [
                'label' => __( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-builder .wp-block-quote' => 'background:{{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
          'qtmar',
          [
             'label' =>   esc_html__( 'Margin', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', '%', 'em' ],
             'selectors' => [
                    '{{WRAPPER}} .content-builder .wp-block-quote' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_responsive_control(
          'qtpd',
          [
             'label' =>   esc_html__( 'Padding', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', '%', 'em' ],
             'selectors' => [
                    '{{WRAPPER}} .content-builder .wp-block-quote' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_responsive_control(
          'qtipos',
          [
             'label' =>   esc_html__( 'Quote position', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'allowed_dimensions'=> ['top', 'left'],
             'size_units' => [ 'px', '%', 'em' ],
             'selectors' => [
                    '{{WRAPPER}} .content-builder .wp-block-quote p:before' => 'top: {{TOP}}{{UNIT}};left:{{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'qttyp',
                'label' =>   esc_html__( 'Title typo', 'news-element' ),
                'selector' => '{{WRAPPER}} .content-builder .wp-block-quote p',
            ]
        );

        $this->add_responsive_control(
          'qttmr',
          [
             'label' =>   esc_html__( 'Title margin', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', '%', 'em' ],
             'selectors' => [
                    '{{WRAPPER}} .content-builder .wp-block-quote p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'qtcity',
                'label' =>   esc_html__( 'Cite typo', 'news-element' ),
                'selector' => '{{WRAPPER}} .content-builder .wp-block-quote cite',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_toc',
            [
                'label' =>   esc_html__('Toc', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
                'condition' => [
                    'toc' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'tocwpd',
            [
               'label' =>   esc_html__( 'Wrapper padding', 'news-element' ),
               'type' => Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px', '%', 'em' ],
               'selectors' => [
                      '{{WRAPPER}} .ne-toc-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               ],
            ]
          );

          $this->add_control(
            'tocbk',
            [
                'label' => __( 'Border color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ne-toc-wrap' => 'border:1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tocbm',
            [
                'label' => __( 'Bottom margin', 'news-element' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ne-toc-wrap' => 'margin-bottom:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'tocbrd',
            [
                'label' => __( 'Border radius', 'news-element' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ne-toc-wrap' => 'border-radius:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        do_action('newsmag_heading_style', $this,'toch_','.toc-label','Title');

        $this->add_control(
            'tolpd',
            [
                'label' => __( 'List left padding', 'news-element' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ne-toc-wrap ul' => 'padding-left:{{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'tolp',
            [
                'label' => __( 'List column count', 'news-element' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ne-toc-wrap ul' => 'column-count:{{SIZE}};',
                ],
            ]
        );

        do_action('newsmag_heading_style', $this,'tochli_','.ne-toc-wrap a','List');

        $this->end_controls_section();

        $this->start_controls_section(
            'section_dcaps',
            [
                'label' =>   esc_html__('Dropcap', 'news-element'),
                'tab' => Controls_Manager::TAB_SETTINGS,
                'condition' => [
                    'dropcap' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
          'dmar',
          [
             'label' =>   esc_html__( 'Margin', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', '%', 'em' ],
             'selectors' => [
                    '{{WRAPPER}} .content-builder>p:first-child:first-letter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_responsive_control(
          'dmpd',
          [
             'label' =>   esc_html__( 'Padding', 'news-element' ),
             'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', '%', 'em' ],
             'selectors' => [
                    '{{WRAPPER}} .content-builder>p:first-child:first-letter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
             ],
          ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'drpty',
                'label' =>   esc_html__( 'Typography', 'news-element' ),
                'selector' => '{{WRAPPER}} .content-builder>p:first-child:first-letter',
            ]
        );

        $this->add_control(
            'drpklr',
            [
                'label' =>   esc_html__( 'Color', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-builder>p:first-child:first-letter' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'drppd',
            [
                'label' =>   esc_html__( 'Background', 'news-element' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-builder>p:first-child:first-letter' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'drpbdr',
                'label' =>   esc_html__( 'Border', 'news-element' ),
                'selector' => '{{WRAPPER}} .content-builder>p:first-child:first-letter',
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
    $widgets_manager->register(new \News_Element\Widgets\news_ele_post_content());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\news_ele_post_content());
}
