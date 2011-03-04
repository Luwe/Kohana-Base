<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Session adapter default for LJBase is 'database'. Use the following SQL
 * query to create the table needed to run sessions under this adapter:
 *
 *      CREATE TABLE `session` (
 *        `id` VARCHAR(24) NOT NULL,
 *        `time` INT UNSIGNED NOT NULL,
 *        `data` TEXT NOT NULL,
 *        PRIMARY KEY (`id`),
 *        INDEX (`time`)
 *      ) ENGINE = MYISAM;
 */  
return array
(
  'native'   => array(
    'name'     => 'session',
    'lifetime' => 0,
  ),
  'cookie'   => array(
    'name'      => 'session',
    'encrypted' => TRUE,
    'lifetime'  => 0,
  ),
  'database' => array(
    'encrypted' => FALSE,
    'lifetime'  => 0,
    'group'     => 'default',
    'table'     => 'session',
    'columns'   => array(
      'session_id'  => 'id',
      'last_active' => 'time',
      'contents'    => 'data'
    ),
    'gc'        => 500,
  ),
);
