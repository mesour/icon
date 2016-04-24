<?php

namespace Mesour\IconTests;

use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/BaseTestCase.php';

class DefaultTest extends BaseTestCase
{

	public function testDefault()
	{
		$icon = new \Mesour\UI\Icon;

		Assert::same(
			'<span class="fa fa-cog"></span>',
			(string) $icon->render(),
			'Output of icon render doest not match'
		);
	}

	public function testType()
	{
		$icon = new \Mesour\UI\Icon;

		$icon->setType('pencil');

		Assert::same(
			'<span class="fa fa-pencil"></span>',
			(string) $icon->render(),
			'Output of icon render doest not match'
		);
	}

	public function testPrefix()
	{
		$icon = new \Mesour\UI\Icon;

		$icon->setPrefix('my-icon my-icon-');

		Assert::same(
			'<span class="my-icon my-icon-cog"></span>',
			(string) $icon->render(),
			'Output of icon render doest not match'
		);
	}

}

$test = new DefaultTest();
$test->run();
