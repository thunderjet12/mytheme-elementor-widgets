<?php
/**
 * @package game play theme
 * @author SBird Themes
 */




namespace ElementorHelloWorld\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;




// Exit if accessed directly
if (! defined( 'ABSPATH' )) exit;



class Hero_Component extends Widget_Base  {
    

    /**
     * Instance
     * 
     * @since 1.0.0
     * 
     * @access private
     * 
     * @static
     * 
     * @var Plugin The single instance of the class.
     */
    private static $_instance =null;



  /**
   * Retrieve the widget name.
   *
   * @since 1.0.0
   *
   * @access public
   *
   * @return string Widget name.
   */

   public function get_name() {
       return 'gphero';
   }


    
  /**
   * Retrieve the widget title.
   *
   * @since 1.0.0
   *
   * @access public
   *
   * @return string Widget title.
   * 
   * 
   */
   public function get_title() {
       return __( 'Gm Hero', 'gp_hero');
   }


  /**
   * Retrieve the widget icon.
   *
   * @since 1.0.0
   *
   * @access public
   *
   * @return string Widget icon.
   */

   public function get_icon() {
       return 'fa fa-pencil';
   }


  /**
   * Retrieve the list of categories the widget belongs to.
   *
   * Used to determine where to display the widget in the editor.
   *
   * Note that currently Elementor supports only one category.
   * When multiple categories passed, Elementor uses the first one.
   *
   * @since 1.0.0
   *
   * @access public
   *
   * @return array Widget categories.
   */

   public function get_categories() {
       return ['general'];
   }


     /**
   * Register the widget controls.
   *
   * Adds different input fields to allow the user to change and customize the widget settings.
   *
   * @since 1.0.0
   *
   * @access protected
   */
   
   protected function _register_controls() {
    $this->start_controls_section(
        'section_content',
        [
            'label' => __( 'Content', 'gp_hero' ),
        ]
    );

    $this->add_control(
        'title',
        [
            'label' => __( 'Title', 'gp_hero' ),
            'type' => Controls_Manager::TEXT,
            'default' => __( 'Title', 'gp_hero' ),
        ]
    );

    $this->add_control(
        'description',
        [
            'label' => __( 'Description', 'gp_hero' ),
            'type' => Controls_Manager::TEXTAREA,
            'default' => __( 'Description', 'gp_hero' ),
        ]
    );


    $this->add_control(
        'content',
        [
            'label' => __( 'Content', 'gp_hero' ),
            'type' => Controls_Manager::WYSIWYG,
            'default' => __( 'Content', 'gp_hero' ),
        ]
    );


    $this->end_controls_section();

   }


     /**
   * Render the widget output on the frontend.
   *
   * Written in PHP and used to generate the final HTML.
   *
   * @since 1.0.0
   *
   * @access protected
   */

   protected function render() {
       $settings = $this->get_settings_for_display();
  
       $this->add_inline_editing_attributes( 'title', 'none' );
       $this->add_inline_editing_attributes( 'description', 'basic' );
       $this->add_inline_editing_attributes( 'content', 'advanced' );
        echo "<div id='hero' >  </div>";
       ?>
       <h2 <?php echo $this->get_render_attribute_string( 'title' ) ?>  >  <?php echo $settings['title']; ?></h2>
       <h2 <?php echo $this->get_render_attribute_string( 'description' ) ?>  >  <?php echo $settings['description']; ?></h2>
       <h2 <?php echo $this->get_render_attribute_string( 'content' ) ?>  >  <?php echo $settings['content']; ?></h2>
       <!-- <div id="hero" >  </div> -->
       
       <?php 

   }

   /**
   * Render the widget output in the editor.
   *
   * Written as a Backbone JavaScript template and used to generate the live preview.
   *
   * @since 1.1.0
   *
   * @access protected
   */
   protected function _content_template () {
       ?>
       <#
       view.addInlineEditingAttributes( 'title', 'none' );
       view.addInlineEditingAttributes( 'description', 'basic' );
       view.addInlineEditingAttributes( 'content', 'advanced' );
       #>

       <h2 {{{ view.getRenderAttributeString('title') }}} > {{{ settings.title }}} </h2>
       <h2 {{{ view.getRenderAttributeString('description') }}} > {{{ settings.description }}} </h2>
       <h2 {{{ view.getRenderAttributeString('content') }}} > {{{ settings.content }}} </h2>
       <div id="hero" >  </div>
       <?php
   }





}

// new Hero_Component();
