<?php

class LangStr {
	public $eng;
	public $ukr;
	public $rus;
	
	public function __construct($eng="", $ukr="", $rus="")
	{
		$this->eng=$eng;
		$this->ukr=$ukr;
		$this->rus=$rus;
	}
	
	public function listAll()
	{
		return "\"{$this->ukr}\",\"{$this->rus}\",\"{$this->eng}\"";
	}

	public function s($lang)
	{
		if ($lang=='ua') { return $this->ukr; }
		elseif ($lang=='ru') { return $this->rus; }
		else { return $this->eng; }
	}
	
}



?>
