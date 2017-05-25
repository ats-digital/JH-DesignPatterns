<?php

namespace MockDoctrineBundle\Document;
use MockDoctrineBundle\Annotation as MOCK_ODM;

/**
 * @MOCK_ODM\Document(targetCollection="User")
 */

class User {

	/**
	 * @MOCK_ODM\Id
	 */

	protected $_id;
	protected $username;
	protected $firstName;
	protected $lastName;

	public function getId() {
		return $this->_id;
	}

	/**
	 * Get username
	 * @return string
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * Set username
	 * @return $this
	 */
	public function setUsername($username) {
		$this->username = $username;
		return $this;
	}

	/**
	 * Get firstName
	 * @return string
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * Set firstName
	 * @return $this
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
		return $this;
	}

	/**
	 * Get lastName
	 * @return string
	 */
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * Set lastName
	 * @return $this
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
		return $this;
	}

}