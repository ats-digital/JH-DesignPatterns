<?php

namespace MockDoctrineBundle\Annotation;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 */

final class Document {

	function __construct($options) {

		$this->targetCollection = $options['targetCollection'];

	}

	/**
	 * Get targetCollection
	 * @return string
	 */
	public function getTargetCollection() {
		return $this->targetCollection;
	}

	/**
	 * Set targetCollection
	 * @return $this
	 */
	public function setTargetCollection($targetCollection) {
		$this->targetCollection = $targetCollection;
		return $this;
	}

}