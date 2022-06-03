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
   * Activity page
  */
  $cfg_activity_page = array(
    'id'              => 'joint_activity_page',          // meta box id, unique per meta box
    'title'           => esc_html__('Activity page content', 'joint-theme'),   // meta box title
    'pages'           => array('page'),      // post types, accept custom post types as well, default is array('post'); optional
    'single'          => true,      // Display metaboxes on a specific page (false if diplayed at all)
    'page_name'       => 'template-activity-page.php',  // if single = true. Name of page for which to output metaboxes
    'context'         => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'        => 'high',            // order of meta box: high (default), low; optional
    'fields'          => array(),            // list of meta fields (can be added by field arrays)
    'local_images'    => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme'  => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );

  /*
   * Initiate your meta box
  */
  $activity_page =  new AT_Meta_Box($cfg_activity_page);

  /*
   * Add fields to your meta box
  */
  //Image field
  $activity_page->addImage($prefix.'activity_page_decor', array('name' => esc_html__('Decoration image', 'joint-theme')));
  //Text field
  $activity_page->addText($prefix.'activity_page_title', array('name' => esc_html__('Headline', 'joint-theme')));
  //Text field
  $activity_page->addText($prefix.'activity_page_text', array('name' => esc_html__('Text', 'joint-theme')));
  //Text field
  $activity_page->addText($prefix.'activity_page_filter_text', array('name' => esc_html__('Mobile filter button text', 'joint-theme')));
  //Text field
  $activity_page->addText($prefix.'activity_page_reset_text', array('name' => esc_html__('Reset button text', 'joint-theme')));

  /*
   * Don't Forget to Close up the meta box Declaration 
  */
  //Finish Meta Box Declaration 
  $activity_page->Finish();
}