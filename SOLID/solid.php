<?php

require_once __DIR__ . '/vendor/autoload.php';

class Store {

	protected $name;
	protected $address;

	function __construct($name, $address) {
		$this->name = $name;
		$this->address = $address;
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
	 * Get address
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * Set address
	 * @return $this
	 */
	public function setAddress($address) {
		$this->address = $address;
		return $this;
	}

}

interface Locator {

	public function getCoordinates(Store $store);

}

class GoogleMapsLocator implements Locator {

	public function getCoordinates(Store $store) {
		return self::class . ' has localized ' . $store->getAddress();
	}

}

class OpenStreetMapsLocator implements Locator {

	public function getCoordinates(Store $store) {
		return self::class . ' has localized ' . $store->getAddress();
	}

}

class StoreService {

	function __construct(Locator $locator) {
		$this->locator = $locator;
	}

	public function locate(Store $store) {

		return $this->locator->getCoordinates($store);

	}

}

class LocatorFactory {

	const GMAPS_PROVIDER = 'GOOGLEMAPS';
	const OSM_PROVIDER = 'OPENSTREETMAPS';

	public static function getInstance($alias) {

		switch ($alias) {
		case self::GMAPS_PROVIDER:
			return new GoogleMapsLocator();
			break;

		case self::OSM_PROVIDER:
			return new OpenStreetMapsLocator();
			break;

		default:
			throw new \Exception("Unknown provider " . $alias);
			break;
		}

	}

}

final class LocatorConfigSingleton {

	private static $instance = null;

	public static function getInstance() {

		if (static::$instance == null) {

			$configFile = file_get_contents('config.json');
			static::$instance = json_decode($configFile, true)['locator'];

		}

		return static::$instance;

	}

	private function __construct() {
	}

}

$store = new Store('Jasmine Hall', 'Centre Urbain Nord');

$locatorAlias = LocatorConfigSingleton::getInstance();

$storeService = new StoreService(LocatorFactory::getInstance($locatorAlias));

s($storeService->locate($store));