<?php

namespace MockDoctrineBundle\Document;

use MockDoctrineBundle\Annotation as MOCK_ODM;

/**
 * @MOCK_ODM\Document(targetCollection="Artist")
 */

class Artist {

	/**
	 * @MOCK_ODM\Id
	 */

	protected $_id;

	protected $name;

	public function getId() {
		return $this->_id;
	}

	/**
	 * Get name
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Set name
	 * @return $this
	 */
	public function setName($name) {
		$this->name = $name;
		return $this;
	}

}