<?php

namespace MockDoctrineBundle\Document;

use MockDoctrineBundle\Annotation as MOCK_ODM;
use MockDoctrineBundle\Document\Artist;

/**
 * @MOCK_ODM\Document(targetCollection="Tune")
 */

class Tune {

	/**
	 * @MOCK_ODM\Id
	 */

	protected $_id;

	protected $title;

	/**
	 * @MOCK_ODM\ReferenceOne(targetClass="MockDoctrineBundle\Document\Artist")
	 */

	protected $artist;

	public function getId() {
		return $this->_id;
	}

	/**
	 * Get title
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Set title
	 * @return $this
	 */
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}

	/**
	 * Get artist
	 * @return mixed
	 */
	public function getArtist() {
		return $this->artist;
	}

	/**
	 * Set artist
	 * @return $this
	 */
	public function setArtist($artist) {
		$this->artist = $artist;
		return $this;
	}

}