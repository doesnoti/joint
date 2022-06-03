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
   * Contacts
  */
  $cfg_contacts = array(
    'id'              => 'joint_contacts',          // meta box id, unique per meta box
    'title'           => esc_html__('Contacts content', 'joint-theme'),   // meta box title
    'pages'           => array('page'),      // post types, accept custom post types as well, default is array('post'); optional
    'single'          => true,      // Display metaboxes on a specific page (false if diplayed at all)
    'page_name'       => 'template-contacts.php',  // if single = true. Name of page for which to output metaboxes
    'context'         => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'        => 'high',            // order of meta box: high (default), low; optional
    'fields'          => array(),            // list of meta fields (can be added by field arrays)
    'local_images'    => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme'  => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );

  /*
   * Initiate your meta box
  */
  $contacts =  new AT_Meta_Box($cfg_contacts);

  /*
   * Add fields to your meta box
  */
  //Image field
  $contacts->addImage($prefix.'contacts_main_image', array('name' => esc_html__('Main image', 'joint-theme')));
  //Image field
  $contacts->addImage($prefix.'contacts_decor_image', array('name' => esc_html__('Decoration image', 'joint-theme')));
  //Text field
  $contacts->addText($prefix.'contacts_title', array('name' => esc_html__('Headline', 'joint-theme')));
  //Text field
  $contacts->addText($prefix.'contacts_name_text', array('name' => esc_html__('Label for name field', 'joint-theme')));
  //Text field
  $contacts->addText($prefix.'contacts_reason_text', array('name' => esc_html__('Label for reason field', 'joint-theme')));
  //Text field
  $contacts->addText($prefix.'contacts_phone_text', array('name' => esc_html__('Label for phone field', 'joint-theme')));
  //Text field
  $contacts->addText($prefix.'contacts_email_text', array('name' => esc_html__('Label for email field', 'joint-theme')));
  //Text field
  $contacts->addText($prefix.'contacts_comment_text', array('name' => esc_html__('Label for comment field', 'joint-theme')));
  //Text field
  $contacts->addText($prefix.'contacts_submit_text', array('name' => esc_html__('Submit button text', 'joint-theme')));
  //Page field
  $contacts->addPosts(
    $prefix.'contacts_link_value',
    array('post_type' => 'page'),
    array(
      'name' => esc_html__('Middle block link value', 'joint-theme'),
      'desc' => esc_html__('The page to which the middle block link leads', 'joint-theme'),
      'group' => 'start'
    )
  );
  //Text field
  $contacts->addText($prefix.'contacts_link_name', array('name' => esc_html__('Middle block link text', 'joint-theme'), 'group' => 'end'));
  //Text field
  $contacts->addText($prefix.'contacts_middle_block_text', array('name' => esc_html__('Middle block headline', 'joint-theme')));
  

  /*
   * Don't Forget to Close up the meta box Declaration 
  */
  //Finish Meta Box Declaration 
  $contacts->Finish();

  /*
   * Contacts success
  */
  $cfg_contacts_success = array(
    'id'              => 'joint_contacts_success',          // meta box id, unique per meta box
    'title'           => esc_html__('Contacts success popup content', 'joint-theme'),   // meta box title
    'pages'           => array('page'),      // post types, accept custom post types as well, default is array('post'); optional
    'single'          => true,      // Display metaboxes on a specific page (false if diplayed at all)
    'page_name'       => 'template-contacts.php',  // if single = true. Name of page for which to output metaboxes
    'context'         => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'        => 'high',            // order of meta box: high (default), low; optional
    'fields'          => array(),            // list of meta fields (can be added by field arrays)
    'local_images'    => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme'  => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );

  /*
   * Initiate your meta box
  */
  $contacts_success =  new AT_Meta_Box($cfg_contacts_success);

  /*
   * Add fields to your meta box
  */

  //Text field
  $contacts_success->addText($prefix.'contacts_success_title', array('name' => esc_html__('Headline', 'joint-theme')));
  //Text field
  $contacts_success->addText($prefix.'contacts_success_text', array('name' => esc_html__('Text', 'joint-theme')));
  //Image field
  $contacts_success->addImage($prefix.'contacts_success_image', array('name' => esc_html__('Image', 'joint-theme')));

  /*
   * Don't Forget to Close up the meta box Declaration 
  */
  //Finish Meta Box Declaration 
  $contacts_success->Finish();
}