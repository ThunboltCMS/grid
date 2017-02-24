<?php

namespace Thunbolt\Grid\DI;

use Nette\DI\CompilerExtension;
use Thunbolt\Grid\GridArgs;
use Thunbolt\Grid\GridFactory;
use Thunbolt\Grid\IGridFactory;

class GridExtension extends CompilerExtension {

	public function loadConfiguration() {
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('gridArgs'))
			->setClass(GridArgs::class);

		$builder->addDefinition($this->prefix('grid.factory'))
			->setClass(IGridFactory::class)
			->setFactory(GridFactory::class);
	}

}
