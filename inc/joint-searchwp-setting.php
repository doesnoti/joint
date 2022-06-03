<?php

// Increase SearchWP's fuzzy match minimum length.
add_filter( 'searchwp_fuzzy_min_length', function( $length ) {
  return 4;
} );

// Increase SearchWP's fuzzy matching threshold.
add_filter( 'searchwp_fuzzy_threshold', function( $threshold ) {
  return 70;
} );

// Tell SearchWP to use keyword stems for partial matches.
add_filter( 'searchwp_like_stem', function( $use_stem, $terms, $engine ) {
  return true;
}, 20, 3 );

function joint_searchwp_posts_per_page( $posts_per_page, $engine, $terms, $page ) {
  return 5;
}
add_filter( 'searchwp_posts_per_page', 'joint_searchwp_posts_per_page', 30, 4 );