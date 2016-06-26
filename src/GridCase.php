<?php

namespace Thunbolt\Grid;

use Kdyby\Doctrine\EntityManager;
use Nette\Application\Application;
use Nette\Application\IPresenter;
use Nette\Security\User;
use Thunbolt\Application\Presenter;
use Thunbolt\Components\Notifications;

class GridCase {

	/** @var EntityManager */
	private $entityManager;

	/** @var IGridFactory */
	private $gridFactory;

	/** @var IPresenter|Presenter|\Nette\Application\UI\Presenter */
	private $presenter;

	/** @var User */
	private $user;

	/** @var Notifications */
	private $notifications;

	public function __construct(EntityManager $entityManager, IGridFactory $gridFactory, Application $application,
								User $user, Notifications $notifications = NULL) {
		$this->entityManager = $entityManager;
		$this->gridFactory = $gridFactory;
		$this->presenter = $application;
		$this->user = $user;
		$this->notifications = $notifications;
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
	 * @return Application|IPresenter|\Nette\Application\UI\Presenter|Presenter
	 */
	public function getPresenter() {
		return $this->presenter;
	}

	/**
	 * @return User
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * @return Notifications
	 */
	public function getNotifications() {
		return $this->notifications;
	}

}
