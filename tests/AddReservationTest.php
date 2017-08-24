<?php

use PHPUnit\Framework\TestCase;

class AddReservationTest extends TestCase
{
	
	public function testSuccess() {
		$this->assertTrue(isset($_POST['date'], $_POST['timeRent'], $_POST['dateBack'], $_POST['timeBack']), ['OK']);
	}

	public function testFailure() {
		$this->assertNotTrue(empty($_POST['date']) || empty($_POST['timeRent']) || empty($_POST['dateBack']) || empty($_POST['timeBack']), ['Pas ok']);
	}
}

?>