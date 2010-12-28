<?php defined('SYSPATH') or die('No direct access allowed.');

switch(Kohana::$environment)
{
    case 'development':
        return array
        (
        	'default' => array
        	(
        		'type'       => 'mysql',
        		'connection' => array(
        			/**
        			 * The following options are available for MySQL:
        			 *
        			 * string   hostname     server hostname, or socket
        			 * string   database     database name
        			 * string   username     database username
        			 * string   password     database password
        			 * boolean  persistent   use persistent connections?
        			 *
        			 * Ports and sockets may be appended to the hostname.
        			 */
        			'hostname'   => 'localhost',
        			'database'   => 'kohana',
        			'username'   => 'root',
        			'password'   => FALSE,
        			'persistent' => FALSE,
        		),
        		'table_prefix' => '',
        		'charset'      => 'utf8',
        		'caching'      => FALSE,
        		'profiling'    => TRUE,
        	),
        );
        break;

    default:
        return array
        (
        	'default' => array
        	(
        		'type'       => 'mysql',
        		'connection' => array(
        			/**
        			 * The following options are available for MySQL:
        			 *
        			 * string   hostname     server hostname, or socket
        			 * string   database     database name
        			 * string   username     database username
        			 * string   password     database password
        			 * boolean  persistent   use persistent connections?
        			 *
        			 * Ports and sockets may be appended to the hostname.
        			 */
        			'hostname'   => 'localhost',
        			'database'   => 'kohana',
        			'username'   => 'root',
        			'password'   => 'password',
        			'persistent' => FALSE,
        		),
        		'table_prefix' => '',
        		'charset'      => 'utf8',
        		'caching'      => FALSE,
        		'profiling'    => TRUE,
        	),
        	'alternate' => array(
        		'type'       => 'pdo',
        		'connection' => array(
        			/**
        			 * The following options are available for PDO:
        			 *
        			 * string   dsn         Data Source Name
        			 * string   username    database username
        			 * string   password    database password
        			 * boolean  persistent  use persistent connections?
        			 */
        			'dsn'        => 'mysql:host=localhost;dbname=kohana',
        			'username'   => 'root',
        			'password'   => '',
        			'persistent' => FALSE,
        		),
        		/**
        		 * The following extra options are available for PDO:
        		 *
        		 * string   identifier  set the escaping identifier
        		 */
        		'table_prefix' => '',
        		'charset'      => 'utf8',
        		'caching'      => FALSE,
        		'profiling'    => TRUE,
        	),
        );
        break;
}


