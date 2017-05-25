<?php

namespace MockDoctrineBundle\Command;

use MockDoctrineBundle\Document\Artist;
use MockDoctrineBundle\Document\User;
use MockDoctrineBundle\Proxy\ArtistProxy;
use MockDoctrineBundle\Proxy\TuneProxy;
use MockDoctrineBundle\Proxy\UserProxy;

class ProxyConfig {

	public static function getConfig() {

		return [
			User::class => UserProxy::class,
			Tune::class => TuneProxy::class,
			Artist::class => ArtistProxy::class,
		];

	}

	public static function lookupProxyClassPath($className) {

		$cfg = static::getConfig();

		if (!isset($cfg[$className])) {
			return $className;
		}

		return $cfg[$className];

	}

}