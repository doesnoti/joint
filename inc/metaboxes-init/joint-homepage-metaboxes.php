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
   * Homepage
  */
  // MainScreen----------------------------------------------------------
  $cfg_homepage_mainscreen = array(
    'id'              => 'joint_homepage_mainscreen',          // meta box id, unique per meta box
    'title'           => esc_html__('Mainscreen content', 'joint-theme'),   // meta box title
    'pages'           => array('page'),      // post types, accept custom post types as well, default is array('post'); optional
    'single'          => true,      // Display metaboxes on a specific page (false if diplayed at all)
    'page_name'       => 'template-homepage.php',  // if single = true. Name of page for which to output metaboxes
    'context'         => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'        => 'high',            // order of meta box: high (default), low; optional
    'fields'          => array(),            // list of meta fields (can be added by field arrays)
    'local_images'    => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme'  => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  
  
  /*
   * Initiate your meta box
  */
  $homepage_mainscreen =  new AT_Meta_Box($cfg_homepage_mainscreen);
  
  /*
   * Add fields to your meta box
  */
  //Image field
  $homepage_mainscreen->addImage($prefix.'mainscreen_big_image', array('name' => esc_html__('Large secondary image', 'joint-theme')));
  //Image field
  $homepage_mainscreen->addImage($prefix.'mainscreen_small_image', array('name' => esc_html__('Small secondary image', 'joint-theme')));
  //Image field
  $homepage_mainscreen->addImage($prefix.'mainscreen_image', array('name' => esc_html__('Main image', 'joint-theme')));
  //Textarea field
  $homepage_mainscreen->addTextarea($prefix.'main_title', array('name' => esc_html__('Main headline', 'joint-theme')));
  //Text field
  $homepage_mainscreen->addText($prefix.'main_subtitle', array('name' => esc_html__('Main subtitle', 'joint-theme')));
  //Textarea field
  $homepage_mainscreen->addTextarea($prefix.'mainscreen_text', array('name' => esc_html__('Text under the headline', 'joint-theme')));
  //Page field
  $homepage_mainscreen->addPosts(
    $prefix.'mainscreen_left_link_value',
    array('post_type' => 'page'),
    array(
      'name' => esc_html__('Left-hand link value', 'joint-theme'),
      'desc' => esc_html__('The page to which the left-hand link leads', 'joint-theme'),
      'group' => 'start'
    )
  );
  //Text field
  $homepage_mainscreen->addText($prefix.'mainscreen_left_link_name', array('name' => esc_html__('Left-hand link text', 'joint-theme'), 'group' => 'end'));
  //Page field
  $homepage_mainscreen->addPosts(
    $prefix.'mainscreen_right_link_value',
    array('post_type' => 'page'),
    array(
      'name' => esc_html__('Right-hand link value', 'joint-theme'),
      'desc' => esc_html__('The page to which the right-hand link leads', 'joint-theme'),
      'group' => 'start'
    )
  );
  //Text field
  $homepage_mainscreen->addText($prefix.'mainscreen_right_link_name', array('name' => esc_html__('Right-hand link text', 'joint-theme'), 'group' => 'end'));

  /*
   * Don't Forget to Close up the meta box Declaration 
  */
  //Finish Meta Box Declaration 
  $homepage_mainscreen->Finish();


  // About section---------------------------------------------------
  $cfg_homepage_about = array(
    'id'              => 'joint_homepage_about',          // meta box id, unique per meta box
    'title'           => esc_html__('About us content', 'joint-theme'),   // meta box title
    'pages'           => array('page'),      // post types, accept custom post types as well, default is array('post'); optional
    'single'          => true,      // Display metaboxes on a specific page (false if diplayed at all)
    'page_name'       => 'template-homepage.php',  // if single = true. Name of page for which to output metaboxes
    'context'         => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'        => 'high',            // order of meta box: high (default), low; optional
    'fields'          => array(),            // list of meta fields (can be added by field arrays)
    'local_images'    => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme'  => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  
  $homepage_about =  new AT_Meta_Box($cfg_homepage_about);

  //Text field
  $homepage_about->addText($prefix.'about_title', array('name' => esc_html__('Title', 'joint-theme')));
  //Textarea field
  $homepage_about->addTextarea($prefix.'about_text', array('name' => esc_html__('Text under the headline', 'joint-theme')));
  //Page field
  $homepage_about->addPosts(
    $prefix.'about_link_value',
    array('post_type' => 'page'),
    array(
      'name' => esc_html__('Link value', 'joint-theme'),
      'desc' => esc_html__('The page to which the link leads', 'joint-theme'),
      'group' => 'start'
    )
  );
  //Text field
  $homepage_about->addText($prefix.'about_link_name', array('name' => esc_html__('Link text', 'joint-theme'), 'group' => 'end'));
  //Image field
  $homepage_about->addImage($prefix.'about_image', array('name' => esc_html__('Image', 'joint-theme')));

  //Finish Meta Box Declaration 
  $homepage_about->Finish();



  // First slider---------------------------------------------------
  $cfg_homepage_firts_slider = array(
    'id'              => 'joint_homepage_first_slider',          // meta box id, unique per meta box
    'title'           => esc_html__('First slider content', 'joint-theme'),   // meta box title
    'pages'           => array('page'),      // post types, accept custom post types as well, default is array('post'); optional
    'single'          => true,      // Display metaboxes on a specific page (false if diplayed at all)
    'page_name'       => 'template-homepage.php',  // if single = true. Name of page for which to output metaboxes
    'context'         => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'        => 'high',            // order of meta box: high (default), low; optional
    'fields'          => array(),            // list of meta fields (can be added by field arrays)
    'local_images'    => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme'  => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  
  $homepage_first_slider =  new AT_Meta_Box($cfg_homepage_firts_slider);

  //Image field
  $homepage_first_slider->addImage($prefix.'first_slider_top_img', array('name' => esc_html__('Top image', 'joint-theme')));
  //Text field
  $homepage_first_slider->addText($prefix.'first_slider_title', array('name' => esc_html__('Title', 'joint-theme')));
  //Number field
  $homepage_first_slider->addNumber(
    $prefix.'first_slider_count',
    array(
      'name' => esc_html__('Count', 'joint-theme'),
      'desc' => esc_html__('Enter the number of slides to be displayed', 'joint-theme'),
      'group' => 'start'
    )
  );
  //Select field
  $homepage_first_slider->addSelect(
    $prefix.'first_slider_sort',
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
  $homepage_first_slider->addImage($prefix.'first_slider_bot_img', array('name' => esc_html__('Bottom image', 'joint-theme')));

  //Finish Meta Box Declaration 
  $homepage_first_slider->Finish();



  // Second slider---------------------------------------------------
  $cfg_homepage_second_slider = array(
    'id'              => 'joint_homepage_second_slider',          // meta box id, unique per meta box
    'title'           => esc_html__('Second slider content', 'joint-theme'),   // meta box title
    'pages'           => array('page'),      // post types, accept custom post types as well, default is array('post'); optional
    'single'          => true,      // Display metaboxes on a specific page (false if diplayed at all)
    'page_name'       => 'template-homepage.php',  // if single = true. Name of page for which to output metaboxes
    'context'         => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'        => 'high',            // order of meta box: high (default), low; optional
    'fields'          => array(),            // list of meta fields (can be added by field arrays)
    'local_images'    => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme'  => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  
  $homepage_second_slider =  new AT_Meta_Box($cfg_homepage_second_slider);

  //Text field
  $homepage_second_slider->addText($prefix.'second_slider_title', array('name' => esc_html__('Title', 'joint-theme')));
  //Number field
  $homepage_second_slider->addNumber(
    $prefix.'second_slider_count',
    array(
      'name' => esc_html__('Count', 'joint-theme'),
      'desc' => esc_html__('Enter the number of slides to be displayed', 'joint-theme'),
      'group' => 'start'
    )
  );
  //Select field
  $homepage_second_slider->addSelect(
    $prefix.'second_slider_sort',
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
  $homepage_second_slider->addImage($prefix.'second_slider_img', array('name' => esc_html__('Image', 'joint-theme')));

  //Finish Meta Box Declaration 
  $homepage_second_slider->Finish();



  // Categories card---------------------------------------------------
  $cfg_homepage_category_card = array(
    'id'              => 'joint_homepage_category_card',          // meta box id, unique per meta box
    'title'           => esc_html__('Category card content', 'joint-theme'),   // meta box title
    'pages'           => array('page'),      // post types, accept custom post types as well, default is array('post'); optional
    'single'          => true,      // Display metaboxes on a specific page (false if diplayed at all)
    'page_name'       => 'template-homepage.php',  // if single = true. Name of page for which to output metaboxes
    'context'         => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'        => 'high',            // order of meta box: high (default), low; optional
    'fields'          => array(),            // list of meta fields (can be added by field arrays)
    'local_images'    => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme'  => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  
  $homepage_category_card =  new AT_Meta_Box($cfg_homepage_category_card);

  //Page field
  $homepage_category_card->addPosts(
    $prefix.'homepage_middle_block_link_value',
    array('post_type' => 'page'),
    array(
      'name' => esc_html__('Middle block link value', 'joint-theme'),
      'desc' => esc_html__('The page to which the link leads', 'joint-theme'),
      'group' => 'start'
    )
  );
  //Text field
  $homepage_category_card->addText($prefix.'homepage_middle_block_link_name', array('name' => esc_html__('Middle block link text', 'joint-theme'), 'group' => 'end'));
  //Text field
  $homepage_category_card->addText($prefix.'homepage_middle_block_text', array('name' => esc_html__('Middle block text', 'joint-theme')));
  //Text field
  $homepage_category_card->addText($prefix.'category_card_title', array('name' => esc_html__('Title', 'joint-theme')));
  //Text field
  $homepage_category_card->addText(
    $prefix.'category_card_count_text',
    array(
      'name' => esc_html__('Count text', 'joint-theme'),
      'desc' => esc_html__('Enter text to represent the number of posts in the category', 'joint-theme'),
    )
  );
  //Image field
  $homepage_category_card->addImage($prefix.'category_card_img', array('name'=> esc_html__('Image', 'joint-theme')));

  //Finish Meta Box Declaration 
  $homepage_category_card->Finish();
}