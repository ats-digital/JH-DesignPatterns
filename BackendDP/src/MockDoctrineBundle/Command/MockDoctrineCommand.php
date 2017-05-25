<?php

namespace MockDoctrineBundle\Command;
use MockDoctrineBundle\Document\UserRating;
use MockDoctrineBundle\Manager\DocumentManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MockDoctrineCommand extends Command {

	/**
	 * {@inheritdoc}
	 */
	protected function configure() {
		$this
			->setName('app:mock:doctrine')
			->setDescription('Mocks standalone doctrine bundle')
		;
	}

	/**
	 * {@inheritdoc}
	 */
	protected function execute(InputInterface $input, OutputInterface $output) {

		$dm = new DocumentManager();

		$allUserRatings = $dm->getRepository(UserRating::class)->findAll();

		s($allUserRatings[0]->getUser()->getUsername());

	}

}