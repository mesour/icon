<?php
/**
 * This file is part of the Mesour Icon (http://components.mesour.com/component/icon)
 *
 * Copyright (c) 2017 Matouš Němec (http://mesour.com)
 *
 * For full licence and copyright please view the file licence.md in root of this project
 */

namespace Mesour\Icon;

use Mesour;

/**
 * @author Matouš Němec <http://mesour.com>
 *
 * @method Mesour\Components\Control\IControl getParent()
 */
trait HasIcon
{

	/**
	 * @var string
	 */
	private $iconClass = null;

	public function setIconClass($iconClass)
	{
		if (is_object($iconClass)) {
			if (!$iconClass instanceof IIcon) {
				throw new Mesour\InvalidArgumentException(
					sprintf('Class "%s" must implements interface "%s".', get_class($iconClass), IIcon::class)
				);
			}
			$iconClass = get_class($iconClass);
		} else {
			if (!class_exists($iconClass)) {
				throw new Mesour\InvalidArgumentException(
					sprintf('Icon class "%s" does not exits.', $iconClass)
				);
			}
			$interfaces = class_implements($iconClass);
			if (!$interfaces || !count($interfaces) || !in_array(IIcon::class, $interfaces)) {
				throw new Mesour\InvalidArgumentException(
					sprintf('Class "%s" must implements interface "%s".', $iconClass, IIcon::class)
				);
			}
		}

		$this->iconClass = $iconClass;
		return $this;
	}

	/**
	 * @param string $type
	 * @return IIcon
	 */
	protected function createNewIcon($type)
	{
		/** @var IIcon $icon */
		$className = $this->getIconClass();
		$icon = new $className;
		$icon->setType($type);
		return $icon;
	}

	public function getIconClass()
	{
		if ($this->iconClass) {
			return $this->iconClass;
		}
		$parent = $this->getParent();
		if ($parent instanceof IHasIcon) {
			return $parent->getIconClass();
		} else {
			$this->iconClass = Mesour\UI\Icon::class;
		}
		return $this->iconClass;
	}

}
