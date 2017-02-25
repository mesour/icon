<?php
/**
 * Mesour Components
 *
 * @license       LGPL-3.0 and BSD-3-Clause
 * @Copyright (c) 2015-2016 Matous Nemec <http://mesour.com>
 */

namespace Mesour\IconTests\Classes;

use Mesour;
use Mesour\Components\Localization\ITranslatable;
use Mesour\Components\Security\IAuthorised;

/**
 * @author  mesour <http://mesour.com>
 */
class DivIcon extends Mesour\UI\Control implements IAuthorised, ITranslatable
{

	use Mesour\Components\Localization\Translatable;
	use Mesour\Components\Security\Authorised;
	use Mesour\Icon\HasIcon;

	/**
	 * @var Mesour\Components\Utils\Html
	 */
	private $wrapper;

	/**
	 * @return Mesour\Components\Utils\Html
	 */
	public function getControlPrototype()
	{
		return !$this->wrapper ? ($this->wrapper = Mesour\Components\Utils\Html::el('div')) : $this->wrapper;
	}

	public function create()
	{
		parent::create();

		$wrapper = $this->getControlPrototype();
		$wrapper->add($this->createNewIcon('pencil'));

		return $wrapper;
	}

}
