<?php

namespace MockDoctrineBundle\Annotation;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 */

final class ReferenceOne {

	function __construct($options) {

		$this->targetClass = $options['targetClass'];
		$this->lazy = isset($options['lazy']) && $options['lazy'] == true;

	}

	/**
	 * Get targetClass
	 * @return string
	 */
	public function getTargetClass() {
		return $this->targetClass;
	}

	/**
	 * Set targetClass
	 * @return $this
	 */
	public function setTargetClass($targetClass) {
		$this->targetClass = $targetClass;
		return $this;
	}

	/**
	 * Get lazy
	 * @return boolean
	 */
	public function isLazy() {
		return $this->lazy;
	}

	/**
	 * Set lazy
	 * @return $this
	 */
	public function setLazy($lazy) {
		$this->lazy = $lazy;
		return $this;
	}

}