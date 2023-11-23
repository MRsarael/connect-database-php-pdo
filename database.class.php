<?php

require_once ('config.php');

/**
 * @author Rafael M. Almeida 
 * @email rafa.almeid@homtail.com
*/
class DB {
	protected static $instance;

	protected function __construct()
	{
		//...
	}

	public static function getInstance()
	{
		if(empty(self::$instance)) {
			try {
				self::$instance = new PDO("mysql:host=".DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME, DB_USER, DB_PASS);
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
				// self::$instance->query('SET NAMES utf8');
				self::$instance->query('SET CHARACTER SET utf8');
				self::$instance->exec("SET NAMES 'utf8';SET character_set_connection=utf8;SET character_set_client=utf8;SET character_set_results=utf8");
			} catch(PDOException $error) {
				echo $error->getMessage();
			}
		}

		return self::$instance;
	}
}
