<?php

namespace MockDoctrineBundle\Singleton;

final class DatabaseConfigProvider {

	private static $instance;

	public static function getInstance() {

		if (static::$instance == null) {
			static::$instance = (new \Mongo())->iToones;
		}

		return static::$instance;

	}

	private function __construct() {

	}

}