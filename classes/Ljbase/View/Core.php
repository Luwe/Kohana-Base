<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Placeholder for global methods and attributes used in all View objects
 * 
 * Can only be extended
 * 
 * To ensure interchangeability of a view object with different formats (XML, JSON, HTML) raw HTML should
 * not be planted in View objects. HTML and Form helper functions should therefore not be used
 * when different formats are desired.
 * 
 * @package    LJBase
 * @author     Lieuwe Jan Eilander
 * @copyright  (c) 2010-2013 Lieuwe Jan Eilander
 */
abstract class Ljbase_View_Core {

  /**
   * Website config group
   * @var  Kohana_Config_Group
   */
  protected $_config;

  /**
   * Loads a new config file
   *
   * @param   string  Config file to load
   * @return  void
   */
  public function __construct($config_file = 'website')
  {
    $this->_config = Kohana::$config->load($config_file);
  }
  
}
