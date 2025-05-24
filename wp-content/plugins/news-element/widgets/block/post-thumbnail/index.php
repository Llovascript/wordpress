<?php
namespace News_Element\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use News_Element\Khobish_Helper;

class ne_single_post_thumbnail extends Widget_Base{
    public function get_name() {
        return 'nesinglethumb';
    }

    public function get_title() {
        return   esc_html__( 'Post thumbnail', 'news-element' );
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
            'imgr',
            [
                'label' => __('Image size', 'news-element'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' =>  Khobish_Helper::ae_image_size_choose(),
                'multiple' => false,
            ]
        );

        $this->add_control(
            'caption',
            [
                'label' => esc_html__('Show caption', 'the-pack-addon'),
                'type' => Controls_Manager::SWITCHER,
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
            'thht',
            [
                'label' => esc_html__('Height', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                        'step' => 1,
                    ]
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ne-post-thumb img' => 'height: {{SIZE}}{{UNIT}};object-fit:cover;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'nabdr',
                'label' => esc_html__('Border', 'the-pack-addon'),
                'selector' => '{{WRAPPER}} .ne-post-thumb',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_caption',
            [
                'label' =>   esc_html__('Caption', 'news-element'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        do_action('newsmag_comm_style', $this,'fpr_','.ne-caption');

        $this->end_controls_section();
    }

    protected function render( ) {

        $settings = $this->get_settings();
        require dirname(__FILE__) .'/view.php';

    }
}

if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
    $widgets_manager->register(new \News_Element\Widgets\ne_single_post_thumbnail());
} else {
    $widgets_manager->register_widget_type(new \News_Element\Widgets\ne_single_post_thumbnail());
}
