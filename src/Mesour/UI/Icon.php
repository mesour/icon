<?php
/**
 * This file is part of the Mesour Icon (http://components.mesour.com/component/icon)
 *
 * Copyright (c) 2015-2016 Matouš Němec (http://mesour.com)
 *
 * For full licence and copyright please view the file licence.md in root of this project
 */

namespace Mesour\UI;

use Mesour;

/**
 * @author Matouš Němec <matous.nemec@mesour.com>
 */
class Icon extends Mesour\Components\Control\AttributesControl implements Mesour\Icon\IIcon
{

	protected $defaults = [
		self::WRAPPER => [
			'el' => 'span',
			'attributes' => [
				'class' => '',
			],
		],
	];

	protected $prefix = 'fa fa-';

	protected $type = 'cog';

	protected $inRendering = false;

	public function __construct($name = null, Mesour\Components\ComponentModel\IContainer $parent = null)
	{
		parent::__construct($name, $parent);

		$this->setHtmlElement(
			Mesour\Components\Utils\Html::el($this->getOption(self::WRAPPER, 'el'))
		);
	}

	public function setType($type)
	{
		if (!is_string($type) && strlen($type) <= 0) {
			throw new Mesour\InvalidArgumentException('Type must be non empty string.');
		}
		$this->type = $type;
		return $this;
	}

	public function setPrefix($prefix)
	{
		if (!is_string($prefix)) {
			throw new Mesour\InvalidArgumentException('Prefix must be string.');
		}
		$this->prefix = $prefix;
		return $this;
	}

	public function getPrefix()
	{
		return $this->prefix;
	}

	public function getType()
	{
		return $this->type;
	}

	/**
	 * @return Mesour\Components\Utils\Html
	 */
	public function getControlPrototype()
	{
		return $this->getHtmlElement();
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @param bool $append
	 * @param bool $translated
	 */
	public function setAttribute($key, $value, $append = false, $translated = false)
	{
		if ($key === 'class' && !$this->inRendering) {
			throw new Mesour\NotSupportedException(
				'Can not set class directly. Use methods setType and setPrefix for specify class name.'
			);
		}
		parent::setAttribute($key, $value, $append, $translated);
	}

	public function create()
	{
		$wrapper = $this->getControlPrototype();
		$oldWrapper = clone $wrapper;

		$this->inRendering = true;

		$this->setAttribute('class', $this->formatClassName());

		$this->getAttributes();

		$this->inRendering = false;

		$this->setHtmlElement($oldWrapper);

		return $wrapper;
	}

	protected function formatClassName()
	{
		return $this->prefix . $this->type;
	}

}
