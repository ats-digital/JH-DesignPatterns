<?php

namespace MockDoctrineBundle\Hydrator;

use MockDoctrineBundle\Annotation\Document;
use MockDoctrineBundle\Annotation\Id;
use MockDoctrineBundle\Annotation\ReferenceOne;
use MockDoctrineBundle\Command\ProxyConfig;
use MockDoctrineBundle\Singleton\AnnotationReaderProvider;
use MockDoctrineBundle\Singleton\DatabaseConfigProvider;

class GenericHydrator {

	public static function hydrate($className, array $mongoObj, $lazy = false) {

		$proxyClass = (ProxyConfig::lookupProxyClassPath($className));
		$result = new $proxyClass;

		if ($lazy) {

			$idProperty = static::getMappedIdProperty($className);

			$idProperty->setAccessible(true);

			$idProperty->setValue($result, (new \MongoId($mongoObj['_id'])));

			return $result;

		}

		$reader = AnnotationReaderProvider::getInstance();

		$properties = (new \ReflectionClass($className))->getProperties();

		foreach ($properties as $property) {

			$pName = $property->getName();

			if (array_key_exists($pName, $mongoObj)) {

				$property->setAccessible(true);

				$annotations = $reader->getPropertyAnnotations($property);

				$value = $mongoObj[$pName];

				foreach ($annotations as $a) {

					if ($a instanceof ReferenceOne) {

						$targetClass = $a->getTargetClass();

						$targetClassAnnotations = $reader
							->getClassAnnotations(
								new \ReflectionClass($targetClass)
							)
						;

						foreach ($targetClassAnnotations as $_annotation) {

							if ($_annotation instanceof Document) {
								$targetCollection = $_annotation->getTargetCollection();
							}
						}

						if (!$targetCollection) {
							throw new \Exception(
								sprintf(
									'Class %s is not @Document Annotated',
									$targetClass
								)
							);
						}

						$rawValue = DatabaseConfigProvider::getInstance()->{$targetCollection}->findOne(['_id' => $mongoObj[$pName]['$id']]);

						$value = self::hydrate($targetClass, $rawValue, $a->isLazy());

					}

				}

				$property->setValue($result, $value);

			}

		}

		return $result;

	}

	public static function getMappedIdProperty($className) {

		$reader = AnnotationReaderProvider::getInstance();
		$properties = (new \ReflectionClass($className))->getProperties();

		$mappedIdProperty = null;

		foreach ($properties as $property) {

			foreach ($reader->getPropertyAnnotations($property) as $annotation) {
				if ($annotation instanceof Id) {
					$mappedIdProperty = $property;
				}
			}

		}

		if (!$mappedIdProperty) {

			throw new \Exception("Class " . $className . " does not provide an @Id property");

		}

		return $mappedIdProperty;

	}

}
