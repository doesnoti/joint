<?php
/*
* Initialising metaboxes for post and pages
*/
if (is_admin()){
  /* 
   * prefix of meta keys, optional
   * use underscore (_) at the beginning to make keys hidden, for example $prefix = '_ba_';
   *  you also can make prefix empty to disable it
   * 
   */
  $prefix = 'joint_';
  /* 
   * configure your meta box
   */

  /*
   * Offer
  */
  // MainScreen----------------------------------------------------------
  $cfg_offer_mainscreen = array(
    'id'              => 'joint_offer_mainscreen',          // meta box id, unique per meta box
    'title'           => esc_html__('Offer mainscreen content', 'joint-theme'),   // meta box title
    'pages'           => array('page'),      // post types, accept custom post types as well, default is array('post'); optional
    'single'          => true,      // Display metaboxes on a specific page (false if diplayed at all)
    'page_name'       => 'template-offer.php',  // if single = true. Name of page for which to output metaboxes
    'context'         => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'        => 'high',            // order of meta box: high (default), low; optional
    'fields'          => array(),            // list of meta fields (can be added by field arrays)
    'local_images'    => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme'  => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );

  /*
   * Initiate your meta box
  */
  $offer_mainscreen =  new AT_Meta_Box($cfg_offer_mainscreen);

  /*
   * Add fields to your meta box
  */
  //Image field
  $offer_mainscreen->addImage($prefix.'offer_mainscreen_image', array('name' => esc_html__('Image', 'joint-theme')));
  //Textarea field
  $offer_mainscreen->addTextarea($prefix.'offer_main_title', array('name' => esc_html__('Main headline', 'joint-theme')));
  //Textarea field
  $offer_mainscreen->addTextarea($prefix.'offer_main_text', array('name' => esc_html__('Text under the headline', 'joint-theme')));

  /*
   * Don't Forget to Close up the meta box Declaration 
  */
  //Finish Meta Box Declaration 
  $offer_mainscreen->Finish();


  // Principle----------------------------------------------------------
  $cfg_offer_principle = array(
    'id'              => 'joint_offer_principle',          // meta box id, unique per meta box
    'title'           => esc_html__('Offer principles content', 'joint-theme'),   // meta box title
    'pages'           => array('page'),      // post types, accept custom post types as well, default is array('post'); optional
    'single'          => true,      // Display metaboxes on a specific page (false if diplayed at all)
    'page_name'       => 'template-offer.php',  // if single = true. Name of page for which to output metaboxes
    'context'         => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'        => 'high',            // order of meta box: high (default), low; optional
    'fields'          => array(),            // list of meta fields (can be added by field arrays)
    'local_images'    => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme'  => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );

  $offer_principle =  new AT_Meta_Box($cfg_offer_principle);

  //Textarea field
  $offer_principle->addTextarea($prefix.'offer_principle_title', array('name' => esc_html__('Headline', 'joint-theme')));

  /*
   * To Create a reapeater Block first create an array of fields
   * use the same functions as above but add true as a last param
   */
  $repeater_fields = array();
  //Image field
  $repeater_fields[] = $offer_principle->addImage($prefix.'offer_image_field_id', array( 'name' => esc_html__('Principle image', 'joint-theme') ), true);
  //Textarea field
  $repeater_fields[] = $offer_principle->addTextarea($prefix.'offer_title_field_id', array( 'name' => esc_html__('Principle headline', 'joint-theme') ), true);
  //Textarea field
  $repeater_fields[] = $offer_principle->addTextarea($prefix.'offer_text_field_id', array( 'name' => esc_html__('Principle text', 'joint-theme') ), true);
  /*
   * Then just add the fields to the repeater block
   */
  //repeater block
  $offer_principle->addRepeaterBlock($prefix.'re_offer',array(
    'inline'   => false, 
    'name'     => 'Principles card',
    'fields'   => $repeater_fields, 
    'sortable' => false
  ));

  //Finish Meta Box Declaration 
  $offer_principle->Finish();


  // Offer slider----------------------------------------------------------
  $cfg_offer_slider = array(
    'id'              => 'joint_offer_slider',          // meta box id, unique per meta box
    'title'           => esc_html__('Offer slider', 'joint-theme'),   // meta box title
    'pages'           => array('page'),      // post types, accept custom post types as well, default is array('post'); optional
    'single'          => true,      // Display metaboxes on a specific page (false if diplayed at all)
    'page_name'       => 'template-offer.php',  // if single = true. Name of page for which to output metaboxes
    'context'         => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'        => 'high',            // order of meta box: high (default), low; optional
    'fields'          => array(),            // list of meta fields (can be added by field arrays)
    'local_images'    => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme'  => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );

  $offer_slider =  new AT_Meta_Box($cfg_offer_slider);

  //Text field
  $offer_slider->addText($prefix.'offer_slider_title', array('name' => esc_html__('Title', 'joint-theme')));
  //Number field
  $offer_slider->addNumber(
    $prefix.'offer_slider_count',
    array(
      'name' => esc_html__('Count', 'joint-theme'),
      'desc' => esc_html__('Enter the number of slides to be displayed', 'joint-theme'),
      'group' => 'start'
    )
  );
  //Select field
  $offer_slider->addSelect(
    $prefix.'offer_slider_sort',
    array(
      'joint_new' => esc_html__('New', 'joint-theme'),
      'joint_popular' => esc_html__('Popular', 'joint-theme')
    ),
    array(
      'name' => esc_html__('Sort by', 'joint-theme'),
      'desc' => esc_html__('Select the criterion by which the slider items will be displayed', 'joint-theme'),
      'std'=> array('joint_new'),
      'group' => 'end'
    )
  );
  //Image field
  $offer_slider->addImage($prefix.'offer_slider_img', array('name' => esc_html__('Image', 'joint-theme')));

  //Finish Meta Box Declaration 
  $offer_slider->Finish();
}