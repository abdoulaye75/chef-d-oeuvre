<?php

use PHPUnit\Framework\TestCase;

class LessThanOrEqualTest extends TestCase
{
	
	public function testFailure() {
		$this->assertLessThanOrEqual(2, 2);
	}
}

?>