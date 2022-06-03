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
   * Steps
  */
  // MainScreen----------------------------------------------------------
  $cfg_steps_mainscreen = array(
    'id'              => 'joint_steps_mainscreen',          // meta box id, unique per meta box
    'title'           => esc_html__('Steps mainscreen content', 'joint-theme'),   // meta box title
    'pages'           => array('page'),      // post types, accept custom post types as well, default is array('post'); optional
    'single'          => true,      // Display metaboxes on a specific page (false if diplayed at all)
    'page_name'       => 'template-steps.php',  // if single = true. Name of page for which to output metaboxes
    'context'         => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'        => 'high',            // order of meta box: high (default), low; optional
    'fields'          => array(),            // list of meta fields (can be added by field arrays)
    'local_images'    => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme'  => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );

  /*
   * Initiate your meta box
  */
  $steps_mainscreen =  new AT_Meta_Box($cfg_steps_mainscreen);

  /*
   * Add fields to your meta box
  */
  //Image field
  $steps_mainscreen->addImage($prefix.'steps_mainscreen_big_image', array('name' => esc_html__('Large secondary image', 'joint-theme')));
  //Image field
  $steps_mainscreen->addImage($prefix.'steps_mainscreen_small_image', array('name' => esc_html__('Small secondary image', 'joint-theme')));
  //Image field
  $steps_mainscreen->addImage($prefix.'steps_mainscreen_image', array('name' => esc_html__('Main image', 'joint-theme')));
  //Text field
  $steps_mainscreen->addText($prefix.'steps_main_title', array('name' => esc_html__('Main headline', 'joint-theme')));
  //Textarea field
  $steps_mainscreen->addTextarea($prefix.'steps_mainscreen_text', array('name' => esc_html__('Text under the headline', 'joint-theme')));

  /*
   * Don't Forget to Close up the meta box Declaration 
  */
  //Finish Meta Box Declaration 
  $steps_mainscreen->Finish();


  // Steps----------------------------------------------------------
  $cfg_steps = array(
    'id'              => 'joint_steps',          // meta box id, unique per meta box
    'title'           => esc_html__('Steps content', 'joint-theme'),   // meta box title
    'pages'           => array('page'),      // post types, accept custom post types as well, default is array('post'); optional
    'single'          => true,      // Display metaboxes on a specific page (false if diplayed at all)
    'page_name'       => 'template-steps.php',  // if single = true. Name of page for which to output metaboxes
    'context'         => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'        => 'high',            // order of meta box: high (default), low; optional
    'fields'          => array(),            // list of meta fields (can be added by field arrays)
    'local_images'    => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme'  => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );

  $steps =  new AT_Meta_Box($cfg_steps);

  //Image field
  $steps->addImage($prefix.'steps_1_image', array('name' => esc_html__('Image for the first step', 'joint-theme')));
  //Text field
  $steps->addText($prefix.'steps_1_title', array('name' => esc_html__('Headline for the first step', 'joint-theme')));
  //Text field
  $steps->addText($prefix.'steps_1_subtitle', array('name' => esc_html__('Subtitle for the first step', 'joint-theme')));
  //Textarea field
  $steps->addTextarea($prefix.'steps_1_text', array('name' => esc_html__('Text for the first step', 'joint-theme')));
  //Image field
  $steps->addImage($prefix.'steps_2_image', array('name' => esc_html__('Image for the second step', 'joint-theme')));
  //Text field
  $steps->addText($prefix.'steps_2_title', array('name' => esc_html__('Headline for the second step', 'joint-theme')));
  //Text field
  $steps->addText($prefix.'steps_2_subtitle', array('name' => esc_html__('Subtitle for the second step', 'joint-theme')));
  //Textarea field
  $steps->addTextarea($prefix.'steps_2_text', array('name' => esc_html__('Text for the second step', 'joint-theme')));
  //Image field
  $steps->addImage($prefix.'steps_3_image', array('name' => esc_html__('Image for the third step', 'joint-theme')));
  //Text field
  $steps->addText($prefix.'steps_3_title', array('name' => esc_html__('Headline for the third step', 'joint-theme')));
  //Text field
  $steps->addText($prefix.'steps_3_subtitle', array('name' => esc_html__('Subtitle for the third step', 'joint-theme')));
  //Textarea field
  $steps->addTextarea($prefix.'steps_3_text', array('name' => esc_html__('Text for the third step', 'joint-theme')));
  //Textarea field
  $steps->addTextarea($prefix.'steps_footnote', array('name' => esc_html__('Text for footnote', 'joint-theme')));

  //Finish Meta Box Declaration 
  $steps->Finish();


  // Steps slider----------------------------------------------------------
  $cfg_steps_slider = array(
    'id'              => 'joint_steps_slider',          // meta box id, unique per meta box
    'title'           => esc_html__('Steps slider', 'joint-theme'),   // meta box title
    'pages'           => array('page'),      // post types, accept custom post types as well, default is array('post'); optional
    'single'          => true,      // Display metaboxes on a specific page (false if diplayed at all)
    'page_name'       => 'template-steps.php',  // if single = true. Name of page for which to output metaboxes
    'context'         => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'        => 'high',            // order of meta box: high (default), low; optional
    'fields'          => array(),            // list of meta fields (can be added by field arrays)
    'local_images'    => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme'  => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );

  $steps_slider =  new AT_Meta_Box($cfg_steps_slider);

  //Text field
  $steps_slider->addText($prefix.'steps_slider_title', array('name' => esc_html__('Headline', 'joint-theme')));
 //Number field
  $steps_slider->addNumber(
    $prefix.'steps_slider_count',
    array(
      'name' => esc_html__('Count', 'joint-theme'),
      'desc' => esc_html__('Enter the number of slides to be displayed', 'joint-theme'),
      'group' => 'start'
    )
  );
  //Select field
  $steps_slider->addSelect(
    $prefix.'steps_slider_sort',
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
  $steps_slider->addImage($prefix.'steps_slider_image', array('name' => esc_html__('Image', 'joint-theme')));

  //Finish Meta Box Declaration 
  $steps->Finish();
}