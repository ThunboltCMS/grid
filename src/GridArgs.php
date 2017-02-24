<?php

namespace Thunbolt\Grid;

use Kdyby\Doctrine\EntityManager;
use Nette\Security\User;

class GridArgs {

	/** @var EntityManager */
	private $entityManager;

	/** @var IGridFactory */
	private $gridFactory;

	/** @var User */
	private $user;

	public function __construct(EntityManager $entityManager, IGridFactory $gridFactory, User $user) {
		$this->entityManager = $entityManager;
		$this->gridFactory = $gridFactory;
		$this->user = $user;
	}

	/**
	 * @return EntityManager
	 */
	public function getEntityManager() {
		return $this->entityManager;
	}

	/**
	 * @return IGridFactory
	 */
	public function getGridFactory() {
		return $this->gridFactory;
	}

	/**
	 * @return User
	 */
	public function getUser() {
		return $this->user;
	}

}
