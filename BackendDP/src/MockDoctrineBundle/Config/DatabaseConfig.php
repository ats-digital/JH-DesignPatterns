<?php

namespace MockDoctrineBundle\Config;

class DatabaseConfig {

	protected $name;
	protected $host;
	protected $port;

	function __construct($name) {
		$this->name = $name;
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

	/**
	 * Get host
	 * @return string
	 */
	public function getHost() {
		return $this->host;
	}

	/**
	 * Set host
	 * @return $this
	 */
	public function setHost($host) {
		$this->host = $host;
		return $this;
	}

	/**
	 * Get port
	 * @return integer
	 */
	public function getPort() {
		return $this->port;
	}

	/**
	 * Set port
	 * @return $this
	 */
	public function setPort($port) {
		$this->port = $port;
		return $this;
	}

}