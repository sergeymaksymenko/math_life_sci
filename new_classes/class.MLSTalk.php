<?php

require_once("class.LangStr.php");
require_once("class.MLSOrganization.php");
require_once("class.MLSParticipant.php");

class MLSTalk {

	public $speakers;
	public $title;
	public $date;
	public $place;
	public $room;
	public $files;
	
	public function __construct($speakers, LangStr $title, $date, MLSOrganization $place, $room, $files)
	{
		if (is_array($speakers))
		{
			$this->speakers = $speakers;
		}
		else
		{
			$this->speakers = array();
			$this->speakers[] = $speakers;
		};
		
		$this->title = $title;
		$this->date = new DateTime($date);
		$this->place = $place;
		$this->room = $room;
				
		if (is_array($files))
		{
			$this->files = $files;
		}
		else
		{
			$this->files = array();
			$this->files[] = $files;
		};
		
	}
};




?>
