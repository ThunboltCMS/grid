<?php

namespace Thunbolt\Grid;

use Thunbolt\Grid\Columns\PresenterAction;
use Ublaboo\DataGrid\DataGrid;
use Thunbolt\Grid\Columns\BooleanColumn;
use WebChemistry\Utils\DateTime;

class Grid extends DataGrid {

	public function setAdminTemplate() {
		$this->setTemplateFile(__DIR__ . '/templates/grid.latte');
	}

	public function addColumnBool($key, $name, $column = NULL) {
		$this->addColumnCheck($key);
		$column = $column ?: $key;

		return $this->addColumn($key, new BooleanColumn($this, $key, $column, $name));
	}

	public function addColumnDateTime($key, $name, $column = NULL) {
		$control = parent::addColumnDateTime($key, $name, $column);
		$control->setFormat(DateTime::$datetime);

		return $control;
	}

	public function addColumnDate($key, $name, $column = NULL) {
		$control = parent::addColumnDateTime($key, $name, $column);
		$control->setFormat(DateTime::$date);

		return $control;
	}

	public function addPresenterAction($key, $name, $href = NULL, array $params = NULL) {
		$this->addActionCheck($key);
		$href = $href ?: $key;

		if (NULL === $params) {
			$params = [$this->primary_key];
		}

		return $this->actions[$key] = new PresenterAction($this, $href, $name, $params);
	}

}
