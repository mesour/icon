<?php
/**
 * This file is part of the Mesour Icon (http://components.mesour.com/component/icon)
 *
 * Copyright (c) 2015-2016 Matouš Němec (http://mesour.com)
 *
 * For full licence and copyright please view the file licence.md in root of this project
 */

namespace Mesour\Icon;

use Mesour;

/**
 * @author Matouš Němec (http://mesour.com)
 */
interface IIcon extends Mesour\Components\Control\IAttributesControl
{

	const WRAPPER = 'wrapper';

	public function setType($type);

	public function setPrefix($prefix);

	public function getPrefix();

	public function getType();

	/**
	 * @return Mesour\Components\Utils\Html
	 */
	public function getControlPrototype();

}
