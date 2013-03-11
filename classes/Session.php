<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Extended session class. Used to set a default adapter for use in the
 * Session class. 
 *
 * This works better than setting adapter when calling the
 * Session instance. In modules like Auth, the default adapter will
 * still be 'Native' in that case.
 *
 * @package  LJBase
 */
abstract class Session extends Kohana_Session {

  /**
   * Session default adapter
   * @var  string
   */
  public static $default = 'database';

}
