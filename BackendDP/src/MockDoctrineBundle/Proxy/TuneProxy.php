<?php

namespace MockDoctrineBundle\Proxy;

use MockDoctrineBundle\Document\Tune;

class TuneProxy extends Tune {

	protected $__initialized__;

	function __construct() {

		$this->__initialized__ = false;

	}

	public function getArtist() {

		if (!$this->__initialized__) {
			$this->initialize($this);
		}

		return parent::getArtist();
	}

	public function initialize() {

		$data = (new DocumentManager())->getRepository(parent::class)->findOneBy(['_id' => $this->getId()]);

		foreach (get_object_vars($data) as $key => $value) {
			$this->{$key} = $value;
		}

		$this->__initialized__ = true;

	}

}