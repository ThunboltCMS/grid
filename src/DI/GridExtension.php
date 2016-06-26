<?php

namespace Thunbolt\Grid\DI;

use Nette\DI\CompilerExtension;
use Thunbolt\Grid\GridCase;
use Thunbolt\Grid\GridFactory;
use Thunbolt\Grid\IGridFactory;

class GridExtension extends CompilerExtension {

	public function loadConfiguration() {
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('grid'))
			->setClass(GridCase::class);

		$builder->addDefinition($this->prefix('grid.factory'))
			->setClass(IGridFactory::class)
			->setFactory(GridFactory::class);
	}

}
