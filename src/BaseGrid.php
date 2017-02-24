<?php

namespace Thunbolt\Grid;

use Kdyby\Doctrine\EntityManager;
use Thunbolt\Application\BaseControl;
use Thunbolt\User\User;

abstract class BaseGrid extends BaseControl {

	/** @var EntityManager */
	protected $em;

	/** @var User */
	protected $user;

	/** @var IGridFactory */
	private $factory;

	/**
	 * @param GridArgs $gridArgs
	 */
	public function __construct(GridArgs $gridArgs) {
		$this->em = $gridArgs->getEntityManager();
		$this->user = $gridArgs->getUser();
		$this->factory = $gridArgs->getGridFactory();
	}

	/**
	 * @return Grid
	 */
	protected function createGrid() {
		return $this->factory->create();
	}

	/**
	 * @param string $resource
	 * @param string $privilege
	 */
	protected function isAllowed($resource, $privilege = NULL) {
		if (!$this->user->isAllowed($resource, $privilege)) {
			$this->flashMessage('core.requirements.isAllowed', 'error');
			$this->redirect('home.' . strtolower($this->getPresenter()->names['module']));
		}
	}

}
