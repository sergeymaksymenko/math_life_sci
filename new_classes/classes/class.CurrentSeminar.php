<?php

require_once("class.LangStr.php");
require_once("class.MLSOrganization.php");
require_once("class.MLSParticipant.php");
require_once("class.MLSTalk.php");
require_once("class.DbObject.php");
require_once("database.php");

class CurrentSeminar {
	
	public function __construct() {	}
	
	public static function getOrganizationById(Database $db, $id)
	{
		$query = "select * from Organizations where id={$id};";
		$res = $db->run_query($query);
		if ($res==false)
		{
			return null;
		};
		$cnt=mysql_num_rows($res);
		if (mysql_num_rows($res)==0)
		{
			return null;
		};
		$org = mysql_fetch_array($res, MYSQL_ASSOC);
		$id=$org["id"];
		$title = new LangStr($org["title_ukr"],$org["title_rus"],$org["title_eng"]);
		$address = $org["address"];
		$url = $org["url"];

		return new MLSOrganization($title, $url, $address, $id);
	}



	public static  function getParticipantById(Database $db, $id)
	{
		$query = "select * from Participants where id={$id};";
		$res = $db->run_query($query);
		if ($res==false)
		{
			return null;
		};
		$cnt=mysql_num_rows($res);
		if (mysql_num_rows($res)==0)
		{
			return null;
		};
		$org = mysql_fetch_array($res, MYSQL_ASSOC);
		$id=$org["id"];
		$name = new LangStr($org["name_ukr"],$org["name_rus"],$org["name_eng"]);
		$middlename = new LangStr($org["middlename_ukr"],$org["middlename_rus"],$org["middlename_eng"]);
		$surname = new LangStr($org["surname_ukr"],$org["surname_rus"],$org["surname_eng"]);
		$sex=$org["sex"];
		
		// get emails
		$email=array();
		$query = "select * from ParticipantEmails where part_id={$id};";
		$res = $db->run_query($query);
		if ($res!=false)
		{
			$cnt=mysql_num_rows($res);
			for ($i=0; $i<$cnt; $i++)
			{
				$email[] = mysql_result($res, $i, "email");
			};
		};
		
		//print_r("email");
		
		$homepage="";
		$organization=array();
		$query = "select * from ParticipantOrganizations where part_id={$id};";
		$res = $db->run_query($query);
		if ($res!=false)
		{
			$cnt=mysql_num_rows($res);
			for ($i=0; $i<$cnt; $i++)
			{
				$orgId=mysql_result($res, $i, "org_id");
				$organization[] = self::getOrganizationById($db, $orgId);
			};
		};
		return new MLSParticipant($name, $middlename, $surname, $sex, $email, $homepage, $organization, $id);
	}
	

	//~ 
	public static function getTalkById(Database $db, $id)
	{
		// get the lattest seminar
		$query = "select * from Talks where id={$id};";
		$res = $db->run_query($query);
		if ($res==false)
		{
			return null;
		};
		$cnt=mysql_num_rows($res);
		if (mysql_num_rows($res)==0)
		{
			return null;
		};
		
		
		$tt = mysql_fetch_array($res, MYSQL_ASSOC);
		
		$title = new LangStr($tt["title_ukr"],$tt["title_rus"],$tt["title_eng"]);
		$room=$tt["room"];
		$date=$tt["date"];
		
		// get organization
		$placeId=$tt["org_place_id"];
		$place=self::getOrganizationById($db, $placeId);
		
		// get speakers
		$speakers=array();
		$query = "select * from TalkSpeakers where talk_id={$id};";
		$res = $db->run_query($query);
		if ($res!=false)
		{
			$cnt=mysql_num_rows($res);
			for ($i=0; $i<$cnt; $i++)
			{
				$spId=mysql_result($res, $i, "part_id");
				$speakers[] = self::getParticipantById($db, $spId);
			};
		};

		$files=array();
		// get files
		$files=array();
		$query = "select * from TalkFiles where talk_id={$id};";
		$res = $db->run_query($query);
		if ($res!=false)
		{
			$cnt=mysql_num_rows($res);
			for ($i=0; $i<$cnt; $i++)
			{
				$files[] = mysql_result($res, $i, "file");
			};
		};		
		return new MLSTalk($speakers, $title, $date, $place, $room, $files);
	}
	
	
	public static function getYears($db)
	{
		// get the lattest seminar
		$query = "select distinct year(date) as Year from Talks order by date desc;";
		$res = $db->run_query($query);
		if ($res==false)
		{
			return null;
		};
		
		$years=array();
		$cnt=mysql_num_rows($res);
		for ($i=0; $i<$cnt; $i++)
		{
			$years[] = mysql_result($res, $i, 0);
		};
		return $years;
	}

	public static function getMonths($db, $year)
	{
		// get the lattest seminar
		$query = "select month(date) as Month, year(date) as Year from Talks having Year={$year} order by date desc;";
		$res = $db->run_query($query);
		if ($res==false)
		{
			return null;
		};
		
		$months=array();
		$cnt=mysql_num_rows($res);
		for ($i=0; $i<$cnt; $i++)
		{
			$months[] = mysql_result($res, $i, 0);
		};
		return $months;
	}
	
};








?>
