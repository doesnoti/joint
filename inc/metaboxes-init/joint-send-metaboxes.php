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
   * Send
  */
  $cfg_send = array(
    'id'              => 'joint_send',          // meta box id, unique per meta box
    'title'           => esc_html__('Send content', 'joint-theme'),   // meta box title
    'pages'           => array('page'),      // post types, accept custom post types as well, default is array('post'); optional
    'single'          => true,      // Display metaboxes on a specific page (false if diplayed at all)
    'page_name'       => 'template-send.php',  // if single = true. Name of page for which to output metaboxes
    'context'         => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'        => 'high',            // order of meta box: high (default), low; optional
    'fields'          => array(),            // list of meta fields (can be added by field arrays)
    'local_images'    => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme'  => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );

  /*
   * Initiate your meta box
  */
  $send =  new AT_Meta_Box($cfg_send);

  /*
   * Add fields to your meta box
  */
  //Image field
  $send->addImage($prefix.'send_main_image', array('name' => esc_html__('Main image', 'joint-theme')));
  //Image field
  $send->addImage($prefix.'send_decor_image', array('name' => esc_html__('Decoration image', 'joint-theme')));
  //Text field
  $send->addText($prefix.'send_title', array('name' => esc_html__('Headline', 'joint-theme')));
  //Text field
  $send->addText($prefix.'send_comment_text', array('name' => esc_html__('Label for comment field', 'joint-theme')));
  //Text field
  $send->addText($prefix.'send_name_text', array('name' => esc_html__('Label for name field', 'joint-theme')));
  //Text field
  $send->addText($prefix.'send_phone_text', array('name' => esc_html__('Label for phone field', 'joint-theme')));
  //Text field
  $send->addText($prefix.'send_file_title', array('name' => esc_html__('Headline for file field', 'joint-theme')));
  //Text field
  $send->addText($prefix.'send_file_text', array('name' => esc_html__('Label for file field', 'joint-theme')));
  //Text field
  $send->addText($prefix.'send_file_fill_text', array('name' => esc_html__('Label for filled file field', 'joint-theme')));
  //Text field
  $send->addText($prefix.'send_submit_text', array('name' => esc_html__('Submit button text', 'joint-theme')));

  /*
   * Don't Forget to Close up the meta box Declaration 
  */
  //Finish Meta Box Declaration 
  $send->Finish();

  /*
   * Send success
  */
  $cfg_send_success = array(
    'id'              => 'joint_send_success',          // meta box id, unique per meta box
    'title'           => esc_html__('Send success popup content', 'joint-theme'),   // meta box title
    'pages'           => array('page'),      // post types, accept custom post types as well, default is array('post'); optional
    'single'          => true,      // Display metaboxes on a specific page (false if diplayed at all)
    'page_name'       => 'template-send.php',  // if single = true. Name of page for which to output metaboxes
    'context'         => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'        => 'high',            // order of meta box: high (default), low; optional
    'fields'          => array(),            // list of meta fields (can be added by field arrays)
    'local_images'    => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme'  => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );

  /*
   * Initiate your meta box
  */
  $send_success =  new AT_Meta_Box($cfg_send_success);

  /*
   * Add fields to your meta box
  */

  //Text field
  $send_success->addText($prefix.'send_success_title', array('name' => esc_html__('Headline', 'joint-theme')));
  //Text field
  $send_success->addText($prefix.'send_success_text', array('name' => esc_html__('Text', 'joint-theme')));
  //Image field
  $send_success->addImage($prefix.'send_success_image', array('name' => esc_html__('Image', 'joint-theme')));

  /*
   * Don't Forget to Close up the meta box Declaration 
  */
  //Finish Meta Box Declaration 
  $send_success->Finish();
}