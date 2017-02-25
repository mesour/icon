<?php

namespace Mesour\IconTests;

use Mesour\IconTests\Classes\DivIcon;
use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/BaseTestCase.php';
require_once __DIR__ . '/Classes/DivIcon.php';

class HasIconTraitTest extends BaseTestCase
{

	public function testDefault()
	{
		$icon = new DivIcon();

		Assert::same(
			'<div><span class="fa fa-pencil"></span></div>',
			(string) $icon->render(),
			'Output of icon render doest not match'
		);
	}

}

$test = new HasIconTraitTest();
$test->run();
