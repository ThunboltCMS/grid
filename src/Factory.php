<?php

namespace Thunbolt\Grid;

use Nette\Application\Application;
use Nette\Application\IPresenter;
use Nette\Application\UI\Presenter;
use Nette\Localization\ITranslator;

class GridFactory implements IGridFactory {

	/** @var ITranslator */
	private $translator;

	/** @var Application */
	private $application;

	/**
	 * @param ITranslator $translator
	 * @param Application $application
	 */
	public function __construct(ITranslator $translator = NULL, Application $application = NULL) {
		$this->translator = $translator;
		$this->application = $application;
	}

	/**
	 * @return Grid
	 */
	public function create() {
		$grid = new Grid();
		if ($this->translator) {
			$grid->setTranslator($this->translator);
		}
		if ($this->application && $this->application->getPresenter() && $this->application->getPresenter()->names['module'] === 'Admin') {
			$grid->setAdminTemplate();
		}

		return $grid;
	}

}
