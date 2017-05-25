<?php

namespace MockDoctrineBundle\Proxy;

use MockDoctrineBundle\Document\User;
use MockDoctrineBundle\Manager\DocumentManager;

class UserProxy extends User {

	protected $__initialized__;

	function __construct() {

		$this->__initialized__ = false;

	}

	public function getUsername() {

		if (!$this->__initialized__) {
			$this->initialize($this);
		}

		return parent::getUsername();
	}

	public function getFirstName() {

		if (!$this->__initialized__) {
			$this->initialize($this);
		}

		return parent::getFirstName();
	}

	public function getLastName() {

		if (!$this->__initialized__) {
			$this->initialize($this);
		}

		return parent::getLastName();
	}

	public function initialize() {

		$data = (new DocumentManager())->getRepository(parent::class)->findOneBy(['_id' => $this->getId()]);

		foreach (get_object_vars($data) as $key => $value) {
			$this->{$key} = $value;
		}

		$this->__initialized__ = true;

	}

}