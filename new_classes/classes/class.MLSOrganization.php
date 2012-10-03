<?php

require_once("class.LangStr.php");
//require_once("class.DbObject.php");

class MLSOrganization{
	
	
	private static $_id;
	public $id;
	public $title;
	public $url;
	public $address;


	public function __construct(LangStr $title, $url='', $address='', $id=-1)
	{
		self::$_id++;
		$this->id = ($id<1)?  self::$_id : $id;

		$this->title=$title;
		$this->url=$url;

	}

	public function listAll()
	{
		return "{$this->id},{$this->title->listAll()},\"{$this->address}\",\"{$this->url}\"";
	}

}

?>
