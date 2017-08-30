<?php

require 'views/homeView.php';

class HomeCtrl
{
	private $homeView;

	public function __construct()
	{
		$this->homeView = new Homeview();
	}

	public function showPresentation() {
		$this->homeView->displayPresentation();
	}
}

?>