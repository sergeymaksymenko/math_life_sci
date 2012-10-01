<?php

require_once("class.LangStr.php");
require_once("class.MLSOrganization.php");

class MLSParticipant{
	
	
	public $name;
	public $surname;
	public $email;
	public $homepage;
	public $organization;

	
	public function __construct(LangStr $name, LangStr $surname, $email, $homepage, $organization)
	{
		$this->name = $name;
		$this->surname = $surname;
		if (is_array($email))
		{
			$this->email = $email;
		}
		else
		{
			$this->email=array();
			$this->email[] = $email;			
		};
		if (is_array($homepage))
		{
			$this->homepage = $homepage;
		}
		else
		{
			$this->homepage=array();
			$this->homepage[] = $homepage;			
		};
		
		if (is_array($organization))
		{
			$this->organization = $organization;
		}
		else
		{
			$this->organization=array();
			$this->organization[] = $organization;			
		};

	}
		
	
	
	
};








?>
