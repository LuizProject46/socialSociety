<?php
Class Db {

  public static $client_connection_pool = [];

	public static function connect() {

		global $ENV;
	  global $db;

	  if($ENV != "production") {
		$base = new PDO('mysql:host='. getenv('MYSQL_1_HOST') .';dbname='. getenv('SOCIAL_SOCIETY') .';port=3306', getenv('MYSQL_1_USER'), getenv('MYSQL_1_PASS'));
		}
		else {
			$base = new PDO('mysql:host=localhost;dbname=socialSociety;', "admin", "e3opu5wtmmypuo9w");
		}

		if($base) {
			$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$base->exec('SET NAMES utf8');
			$base->exec('SET CHARACTER SET utf8');
			$base->exec('SET LC_TIME_NAMES = "pt_BR"');
		}

		return $base;
	}

}
?>