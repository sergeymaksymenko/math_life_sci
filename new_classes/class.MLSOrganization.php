<?php

require_once("class.LangStr.php");

class MLSOrganization {
	
	public $title;
	public $url;

	public function __construct(LangStr $title, $url='')
	{
		$this->title=$title;
		$this->url=$url;
	}


}

?>
