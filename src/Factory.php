<?php

namespace Thunbolt\Grid;

use Nette\Application\Application;
use Nette\Application\IPresenter;
use Nette\Application\UI\Presenter;
use Nette\Localization\ITranslator;

class GridFactory implements IGridFactory {

	/** @var ITranslator */
	private $translator;

	/** @var Presenter|IPresenter */
	private $presenter;

	/**
	 * @param ITranslator $translator
	 */
	public function __construct(ITranslator $translator = NULL, Application $application = NULL) {
		if ($application) {
			$this->presenter = $application->getPresenter();
		}
		$this->translator = $translator;
	}

	/**
	 * @return Grid
	 */
	public function create() {
		$grid = new Grid();
		if ($this->translator) {
			$grid->setTranslator($this->translator);
		}
		if ($this->presenter->names['module'] === 'Admin') {
			$grid->setAdminTemplate();
		}

		return $grid;
	}

}
