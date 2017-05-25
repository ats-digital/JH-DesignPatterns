<?php

namespace MockDoctrineBundle\Document;

use MockDoctrineBundle\Annotation as MOCK_ODM;
use MockDoctrineBundle\Document\User;

/**
 * @MOCK_ODM\Document(targetCollection="UserRating")
 */

class UserRating {

	/**
	 * @MOCK_ODM\Id
	 */

	protected $_id;

	private $rating;

	/**
	 * @MOCK_ODM\ReferenceOne(targetClass="MockDoctrineBundle\Document\User", lazy=true)
	 */

	private $user;

	/**
	 * @MOCK_ODM\ReferenceOne(targetClass="MockDoctrineBundle\Document\Tune")
	 */

	private $tune;

	public function getId() {
		return $this->_id;
	}

	/**
	 * Get rating
	 * @return integer
	 */
	public function getRating() {
		return $this->rating;
	}

	/**
	 * Set rating
	 * @return $this
	 */
	public function setRating($rating) {
		$this->rating = $rating;
		return $this;
	}

	/**
	 * Get user
	 * @return mixed
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * Set user
	 * @return $this
	 */
	public function setUser($user) {
		$this->user = $user;
		return $this;
	}

	/**
	 * Get tune
	 * @return mixed
	 */
	public function getTune() {
		return $this->tune;
	}

	/**
	 * Set tune
	 * @return $this
	 */
	public function setTune($tune) {
		$this->tune = $tune;
		return $this;
	}

}