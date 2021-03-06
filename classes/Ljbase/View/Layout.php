<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Highest level template shell. Uses a default template for entire website and
 * sets all default attributes.
 * 
 * Can only be extended
 * 
 * @package    LJBase
 * @author     Lieuwe Jan Eilander
 * @copyright  (c) 2010-2013 Lieuwe Jan Eilander
 */
abstract class Ljbase_View_Layout extends Ljbase_View_Core {
  
  /**
   * Array of javascript files relative to the js mediapath in config
   * @var  array
   */
  protected $_scripts = array();
  
  /**
   * Array of stylesheet files relative to the css mediapath in config (file.css => media)
   * @var  array
   */
  protected $_stylesheets = array();
  
  /**
   * Set global website title
   * 
   * @return  string
   */
  public function title()
  {
    return (string) $this->_config['title'];
  } 
  
  /**
   * Basic favicon, override if not used as described here
   * 
   * @return  string
   */
  public function favicon()
  {
    return URL::site($this->_config['media']['images'].$this->_config['favicon'], NULL, FALSE);
  }
  
  /**
   * Transform self::$_scripts array for use in template
   * 
   * @return  array
   */
  public function scripts()
  {
    // Add initial global scripts
    $this->_scripts = array_merge($this->_config['files']['js'], $this->_scripts); 
    
    $scripts = array();
    
    foreach ($this->_scripts as $file)
    {
      $file = $this->_format_media_uri($file, 'js');
      $scripts[] = $file;
    }
 
    return $scripts;
  }
  
  /**
   * Transform self::$_stylesheets array for use in template
   * 
   * @return  array
   */
  public function stylesheets() 
  {
    // Add initial global stylesheets
    $this->_stylesheets = array_merge($this->_config['files']['css'], $this->_stylesheets); 
    
    $stylesheets = array();
    
    foreach ($this->_stylesheets as $stylesheet)
    {      
      $file = $this->_format_media_uri($stylesheet['file'], 'css');
      $stylesheets[] = array('file' => $file, 'media' => $stylesheet['media']);
    }
     
    return $stylesheets;    
  }
  
  /**
   * Format js and css files so they return the correct absolute url
   * 
   * @param  array  formatted urls
   */
  protected function _format_media_uri($file, $extension = 'css')
  {
    // Check if filename has extension
    if ( ! strchr($file, '.'.$extension))
    {
      $file .= '.'.$extension;
    }
    
    // Check if filename has protocol
    if ( ! strchr($file, '://'))
    {
      $file = URL::site($this->_config['media'][$extension].$file, NULL, FALSE);
    }
    
    return $file;
  }
  
}
