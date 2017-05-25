<?php

namespace MockDoctrineBundle\Proxy;

use MockDoctrineBundle\Document\Artist;

class ArtistProxy extends Artist {

	function __get($name) {

		return array_key_exists($name, $this->values)
		? $this->values[$name] : null;
	}

}