<?php

namespace MockDoctrineBundle\Repository;

use MockDoctrineBundle\Hydrator\GenericHydrator;

class DocumentRepository {

	function __construct($collection, $className) {
		$this->collection = $collection;
		$this->className = $className;
	}

	public function findAll() {

		return $this->findBy([]);

	}

	public function findBy(array $query) {

		$query = static::preprocessQuery($query);

		$result = [];

		$mongoCursor = $this->collection->find($query);

		foreach ($mongoCursor as $entry) {
			$result[] = GenericHydrator::hydrate($this->className, $entry);
		}

		return $result;

	}

	public function findOneBy(array $query) {

		$query = static::preprocessQuery($query);

		$entry = ($this->collection->findOne($query));

		return GenericHydrator::hydrate($this->className, $entry);

	}

	public static function preprocessQuery(array $query) {

		return $query;

	}

}