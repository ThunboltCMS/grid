<?php

namespace Thunbolt\Grid\Columns;

use Nette\Utils\Html;
use Ublaboo\DataGrid\Column\Column;
use Ublaboo\DataGrid\Row;

class BooleanColumn extends Column {

	/**
	 * @param Row $row
	 * @return Html
	 */
	public function render(Row $row) {
		return Html::el('div')->addAttributes(['class' => 'text-center'])->setHtml(Html::el('span')->addAttributes([
			'class' => 'text-center ' . (parent::render($row) ? 'fa fa-check text-success' : 'fa fa-remove text-danger')
		]));
	}

}
