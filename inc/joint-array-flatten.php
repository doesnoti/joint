<?php
/*
 * Converts multi-dimensional array to a flat array.
*/

function joint_array_flatten( $input ) {
   if ( ! is_array( $input ) ) {
      return array( $input );
   }

   $output = array();

   foreach ( $input as $value ) {
      $output = array_merge( $output, joint_array_flatten( $value ) );
   }

   return $output;
}