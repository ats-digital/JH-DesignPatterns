<?php

namespace MockDoctrineBundle\Singleton;

use Doctrine\Common\Annotations\AnnotationReader as READER;

final class AnnotationReaderProvider {

	private static $instance = null;

	private function __construct() {
	}

	public static function getInstance() {

		if (static::$instance == null) {
			return new READER();
		}

		return static::$instance;

	}

}