<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Highest level controller shell for a basic website.
 * 
 * Default controller which can be used for initial requests, but also for
 * subrequests within an HMVC structure or AJAX widgets. The response body
 * will be sent back in the format provided by the accept header.
 * 
 * @todo       Add Cookie support
 * @uses       Modules/Kostache v3.1.x <git://github.com/zombor/KOstache.git>
 * @package    LJBase
 * @author     Lieuwe Jan Eilander
 * @copyright  (c) 2010-2011 Lieuwe Jan Eilander
 */
abstract class Ljbase_Controller_Default extends Controller {

  /**
   * Set flags for dealing with initial, sub and ajax requests to this controller
   */
  const REQUEST_INITIAL  = 1;
  const REQUEST_SUB      = 2;
  const REQUEST_AJAX     = 3;

  /**
   * Holds the view object (as a string) for the current request
   * @var  str
   */
  public $view;

  /**
   * Holds the current session
   * @var  Kohana_Session
   */
  public $session;
  
  /**
   * Autorender request response
   * @var  boolean
   */
  public $auto_render = TRUE;
  
  /**
   * Is set to the used request type as provided by the REQUEST_ flags
   * @var  integer
   */
  protected $_request_type;
  
  /**
   * Allow or disallow initial requests being made to this controller
   * @var  array
   */
  protected $_allow_initial_request = TRUE;
   
  /**
   * Hold the response format for this request
   * @var  string  
   */
  protected $_response_format;
  
  /**
   * Supported output formats for this controller (accept-type => path to format template)
   * @var  array
   */
  protected $_accept_formats = array(
    'text/html'              => 'layout',
    'application/xhtml+xml'  => 'layout',
    'application/json'       => 'json',      
  );
  
  /**
   * Method which is executed before any action takes place   
   * 
   * @return  void 
   * @uses    Arr
   * @uses    Kohana::config()
   * @throws  Http_Exception_403  if initial requests to this controller are not allowed
   * @throws  Http_Exception_415  if response-format is not supported by this controller
   */
  public function before()
  {
    // Execute parent method
    parent::before();

    // Check if we're dealing with an initial, sub or ajax request
    if ($this->request->is_ajax()) 
    {
      $this->_request_type = self::REQUEST_AJAX;
    }
    elseif ($this->request->is_initial()) 
    {
      // Check if initial requests are allowed
      if ($this->_allow_initial_request !== TRUE)
        throw new Http_Exception_403('Initial requests are forbidden');

      $this->_request_type = self::REQUEST_INITIAL;
    }
    else
    {
      $this->_request_type = self::REQUEST_SUB;
    }
    
    if ($this->auto_render === TRUE)
    {
      // Get desired response formats
      $accept_types = Request::accept_type();
      $accept_types = Arr::extract($accept_types, array_keys($this->_accept_formats));
      
      // Throw exception if none of the accept-types are supported
      if( ! $accept_types = array_filter($accept_types))
        throw new Http_Exception_415('Unsupported accept-type', NULL);
    
      // Set response format to first matched element  
      $this->_response_format = key($accept_types);
      
      // Set path to view class
      $directory = Request::current()->directory() ? Request::current()->directory().'_' : '';
      
      // Set view class
      $this->view = 'View_'.$directory.Request::current()->controller().'_'.Request::current()->action();

      // Uppercase each word in the class name
      $this->view = join('_', array_map('ucwords', explode('_', $this->view)));
    }

    // Initialize session (default adapter is database)
    $this->session = Session::instance();
  }
  
  /**
   * Method which is executed after any action
   * 
   * @return  void
   * @throws  Http_Exception_404  if view not found 
   */
  public function after()
  {
    if ($this->auto_render === TRUE)
    {
      // Set header content-type to response format
      $this->response->headers('Content-Type', $this->_response_format);
      
      // Set response body
      Kostache_Layout::factory($this->_accept_formats[$this->_response_format])
        ->render(new $this->view);
    }
    
    // Execute parent method
    parent::after();
  }

  /**
   * Redirect function implementing reverse routing
   *
   * @param   string  Route name to be used for reverse routing
   * @param   string  Request controller
   * @param   string  Request action
   * @param   array   Overflow (for instance: directory or id to be added to the uri)
   * @return  void
   */
  protected function _redirect($route, $controller = 'home', $action = 'index', array $overflow = array())
  {
    // Add components for uri
    $components = array(
      'controller' => (string) $controller,
      'action'     => (string) $action,
    );
    $components += $overflow;

    // Create uri using components
    $uri = Route::get($route)->uri($components);

    // Redirect
    $this->request->redirect($uri);
  }
  
}
