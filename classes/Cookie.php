<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Extended cookie class. Used to set a Cookie::$salt for use in the
 * Cookie class. 
 *
 * Salt provided here is strictly illustrational! Always override 
 * Cookie::$salt with your own salting in your application!
 *
 * @package  LJBase
 */
class Cookie extends Kohana_Cookie {

  /**
   * Cookie salt (override with your own!)
   * @var  string
   */
  public static $salt = '44d1a678b1a93c77766046eead5e171e1576eadd';

}
