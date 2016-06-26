<?php

namespace Thunbolt\Grid;

use Nette\Application\Application;
use Nette\Object;
use Thunbolt\Components\Notifications;
use Kdyby\Doctrine\EntityManager;
use Thunbolt\User\User;

abstract class BaseControl extends Object {

	/** @var EntityManager */
	protected $em;

	/** @var User */
	protected $user;

	/** @var GridCase */
	private $gridCase;

	/**
	 * @param GridCase $gridCase
	 */
	public function __construct(GridCase $gridCase) {
		$this->em = $gridCase->getEntityManager();
		$this->user = $gridCase->getUser();
		$this->gridCase = $gridCase;
	}

	/**
	 * @return Grid
	 */
	protected function getGrid() {
		return $this->gridCase->getGridFactory()->create();
	}

	/**
	 * @param string $resource
	 * @param string $privilege
	 */
	protected function isAllowed($resource, $privilege = NULL) {
		if (!$this->user->isAllowed($resource, $privilege)) {
			$this->flashMessage('core.requirements.isAllowed', 'error');
			$this->redirect('home.' . strtolower($this->gridCase->getPresenter()->names['module']));
		}
	}

	/**
	 * @param string $message %user == user_name
	 * @param string $icon
	 */
	protected function createNotification($message, $icon) {
		call_user_func_array([$this->gridCase->getNotifications(), 'createNotification'], func_get_args());
	}

	/**
	 * Saves the message to template, that can be displayed after redirect.
	 *
	 * @param  string $message
	 * @param  string $type
	 * @return \stdClass
	 */
	protected function flashMessage($message, $type = 'success') {
		$this->gridCase->getPresenter()->flashMessage($message, $type);
	}

	/**
	 * @param string $dest
	 * @param array $args
	 */
	public function redirect($dest, $args = []) {
		$this->gridCase->getPresenter()->redirect($dest, $args);
	}

	/**
	 * @param array $snippets
	 */
	public function redraw($snippets = []) {
		$this->gridCase->getPresenter()->redraw($snippets);
	}

}
