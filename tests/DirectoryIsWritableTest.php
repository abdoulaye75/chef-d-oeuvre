<?php

use PHPUnit\Framework\TestCase;

class DirectoryIsWritableTest extends TestCase
{
	
	public function testFailure() {
		$this->assertDirectoryIsWritable('../views/pictures_vehicles/');
	}
}

?>