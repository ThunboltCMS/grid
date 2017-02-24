<?php

namespace Thunbolt\Grid\Columns;

use Nette\Utils\Html;
use Ublaboo\DataGrid\Column\Action;
use Ublaboo\DataGrid\Exception\DataGridColumnRendererException;
use Ublaboo\DataGrid\Row;

class PresenterAction extends Action {

	/**
	 * Render row item into template
	 * @param  Row $row
	 * @return mixed
	 */
	public function render(Row $row) {
		/**
		 * Renderer function may be used
		 */
		try {
			return $this->useRenderer($row);
		} catch (DataGridColumnRendererException $e) {
			/**
			 * Do not use renderer
			 */
		}

		$link = $this->grid->getPresenter()->link($this->href, $this->getItemParams($row, $this->params) + $this->parameters);

		$a = Html::el('a')->href($link);

		$this->tryAddIcon($a, $this->getIcon($row), $this->getName());

		if (!empty($this->data_attributes)) {
			foreach ($this->data_attributes as $key => $value) {
				$a->data($key, $value);
			}
		}

		if (!empty($this->attributes)) {
			$a->addAttributes($this->attributes);
		}

		$a->addText($this->translate($this->getName()));

		if ($this->title) {
			$a->title($this->translate($this->getTitle($row)));
		}

		if ($this->class) {
			$a->class($this->getClass($row));
		}

		if ($confirm = $this->getConfirm($row)) {
			$a->data(static::$data_confirm_attribute_name, $confirm);
		}

		return $a;
	}

}