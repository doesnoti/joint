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
   * Single
  */
  // Content
  $cfg_single = array(
    'id'              => 'joint_single',          // meta box id, unique per meta box
    'title'           => esc_html__('Single page content', 'joint-theme'),   // meta box title
    'pages'           => array('activity'),      // post types, accept custom post types as well, default is array('post'); optional
    'context'         => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'        => 'high',            // order of meta box: high (default), low; optional
    'fields'          => array(),            // list of meta fields (can be added by field arrays)
    'local_images'    => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme'  => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );

  /*
   * Initiate your meta box
  */
  $single =  new AT_Meta_Box($cfg_single);

  /*
   * Add fields to your meta box
  */
  //Textarea field
  $single->addTextarea($prefix.'single_text', array( 'name' => esc_html__('Text', 'joint-theme') ));

  /*
   * To Create a reapeater Block first create an array of fields
   * use the same functions as above but add true as a last param
   */
  $repeater_fields = array();
  //Text field
  $repeater_fields[] = $single->addText($prefix.'single_list_text_field_id', array( 'name' => esc_html__('Materials list text', 'joint-theme') ), true);
  /*
   * Then just add the fields to the repeater block
   */
  //repeater block
  $single->addRepeaterBlock($prefix.'re_single_list',array(
    'inline'   => false, 
    'name'     => 'Materials list',
    'fields'   => $repeater_fields, 
    'sortable' => false
  ));


  $repeater_fields = array();
  //Text field
  $repeater_fields[] = $single->addTextarea($prefix.'single_step_text_field_id', array( 'name' => esc_html__('Activity step text', 'joint-theme') ), true);
  //Image field
  $repeater_fields[] = $single->addImage($prefix.'single_step_image_field_id', array( 'name' => esc_html__('Activity step image', 'joint-theme') ), true);
  //repeater block
  $single->addRepeaterBlock($prefix.'re_single_steps',array(
    'inline'   => false, 
    'name'     => 'Activity steps list',
    'fields'   => $repeater_fields, 
    'sortable' => false
  ));

  //Finish Meta Box Declaration 
  $single->Finish();
}