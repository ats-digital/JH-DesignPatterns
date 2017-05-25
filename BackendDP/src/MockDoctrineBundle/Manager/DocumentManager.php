<?php

namespace MockDoctrineBundle\Manager;

use MockDoctrineBundle\Annotation\Document;
use MockDoctrineBundle\Repository\DocumentRepository;
use MockDoctrineBundle\Singleton\AnnotationReaderProvider;
use MockDoctrineBundle\Singleton\DatabaseConfigProvider;

class DocumentManager {

	private $dcp;

	function __construct() {
		$this->dcp = DatabaseConfigProvider::getInstance();
	}

	public function getDatabaseConnection() {
		return $this->dcp;
	}

	public function getRepository($className) {

		$reader = AnnotationReaderProvider::getInstance();

		$targetClass = new \ReflectionClass($className);

		$classNameAnnotations = $reader
			->getClassAnnotations(
				$targetClass
			)
		;

		$targetCollection = null;

		foreach ($classNameAnnotations as $_annotation) {

			if ($_annotation instanceof Document) {
				$targetCollection = $_annotation->getTargetCollection();
			}
		}

		if (!$targetCollection) {
			throw new \Exception(
				sprintf(
					'Class %s is not Object Managed',
					$className
				)
			);
		}

		return new DocumentRepository(
			$this->getCollectionConnection($targetCollection),
			$className
		);
	}

	/**
	 * Get dcp
	 * @return mixed
	 */
	public function getDcp() {
		return $this->dcp;
	}

	public function getCollectionConnection($targetCollection) {
		return $this->getDatabaseConnection()->{$targetCollection};
	}

}