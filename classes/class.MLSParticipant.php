<?php

require_once("class.LangStr.php");
require_once("class.MLSOrganization.php");
//require_once("class.DbObject.php");


class MLSParticipant {
	
	private static $_id;
	
	public $name;
	public $middlename;
	public $surname;
	public $sex;
	public $email;
	public $homepage;
	public $organization;

	
	public function __construct(LangStr $name, LangStr $middlename, LangStr $surname, $sex, $email, $homepage, $organization, $id=-1)
	{
		self::$_id++;
		$this->id = ($id<1)?  self::$_id : $id;
		
		
		$this->name = $name;
		$this->middlename = $middlename;
		$this->surname = $surname;
		$this->sex = $sex;
		
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
		
	
	public function listAll()
	{
		return "{$this->id},{$this->name->listAll()},{$this->middlename->listAll()},{$this->surname->listAll()},{$this->sex}";
	}
	
};








?>
