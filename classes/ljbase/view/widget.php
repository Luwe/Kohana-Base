<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Basic widget view. Can be used for subrequests (HMVC) or Ajax 
 * 
 * @package  LJBase
 */
abstract class Ljbase_View_Widget extends View_Core {
  
  /**
   * Setting render layout to FALSE to ensure full layout is not created
   * @var  boolean
   */
  public $render_layout = FALSE;
  
}
