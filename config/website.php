<?php defined('SYSPATH') or die('No direct access allowed.');

// Default settings for website
return array
(
  // Default website settings
  'title'   => 'Your Website Title',
  'favicon' => 'favicon.png',

  // Media file locations
  'media' => array(
    'css'    => 'media/css/',
    'images' => 'media/images/',
    'js'     => 'media/js/'
  ),
  
  // Initial media files to be added to each page
  'files' => array(
  
    // Stylesheets as (array('file' => 'file.css', 'media' => 'screen, projection'))
    'css'   => array(),
    
    // Javascripts
    'js'    => array(),
  ),
);
