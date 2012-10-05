<?php

require_once("class.LangStr.php");
require_once("class.MLSOrganization.php");
require_once("class.MLSParticipant.php");
require_once("class.MLSTalk.php");
require_once("database.php");

class SeminarInfo {
	
	const CUR_TALK = 0;
	const YEAR_ONLY = 1;
	const YEAR_MONTH = 2;
	
	public function __construct() {	}
	
	public static function getOrganizationById(Database $db, $id)
	{
		$query = "select * from MLSSOrganizations where id={$id};";
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
		$title = new LangStr($org["title_eng"],$org["title_ukr"],$org["title_rus"]);
		$address = $org["address"];
		$url = $org["url"];

		return new MLSOrganization($title, $url, $address, $id);
	}



	public static  function getParticipantById(Database $db, $id)
	{
		$query = "select * from MLSSParticipants where id={$id};";
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
		$speaker = mysql_fetch_array($res, MYSQL_ASSOC);
		$id=$speaker["id"];
		$name = new LangStr($speaker["name_eng"],$speaker["name_ukr"],$speaker["name_rus"]);
		$middlename = new LangStr($speaker["middlename_eng"],$speaker["middlename_ukr"],$speaker["middlename_rus"]);
		$surname = new LangStr($speaker["surname_eng"],$speaker["surname_ukr"],$speaker["surname_rus"]);
		$sex=$speaker["sex"];
		
		// get emails
		$email=array();
		$query = "select * from MLSSParticipantEmails where part_id={$id};";
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
		$query = "select * from MLSSParticipantOrganizations where part_id={$id};";
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
	




	public static function getTalksListById(Database $db, $ids)
	{
		$talks=array();
		// check if $ids is array, then get information foreach talk from $ids 
		if (is_array($ids))
		{
			foreach($ids as $i)
			{
				$q=self::getTalkById($db, $i);
				if ($q!=null)
				{
					$talks[] = $q;
				};
			};
		}
		else // otherwise, $ids is just one number, and so 
		{
			$q=self::getTalkById($db, $ids);
			if ($q!=null)
			{
				$talks[] = $q;
			};
		};
		return $talks;
	}



	public static function getTalkById(Database $db, $id)
	{
		// get the lattest seminar
		$query = "select * from MLSSTalks where id={$id};";
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
		
		$title = new LangStr($tt["title_eng"],$tt["title_ukr"],$tt["title_rus"]);
		$room=$tt["room"];
		$date=$tt["date"];
		
		// get organization
		$placeId=$tt["org_place_id"];
		$place=self::getOrganizationById($db, $placeId);
		
		// get speakers
		$speakers=array();
		$query = "select * from MLSSTalkSpeakers where talk_id={$id};";
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
		$query = "select * from MLSSTalkFiles where talk_id={$id};";
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
		$query = "select distinct year(date) as Year from MLSSTalks order by date desc;";
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
		$query = "select distinct month(date) as Month, year(date) as Year from MLSSTalks having Year={$year} order by date desc;";
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
	
	
	public static function getLastTalk($db)
	{
		$query = "select id from MLSSTalks order by date desc limit 1;";
		$res = $db->run_query($query);
		if ($res==false)
		{
			return null;
		};
		$id = mysql_result($res, 0, 0);
		return self::getTalksListById($db, $id);
	}
	
	public static function getTalksByYear($db, $year)
	{
		$query = "select id, year(date) as Year from MLSSTalks having year={$year} order by date desc;";
		$res = $db->run_query($query);
		if ($res==false)
		{
			return null;
		};
		$ids=array();
		for($i=0; $i<mysql_num_rows($res); $i++)
		{
			$ids[] = mysql_result($res, $i, 0);
		};
		return self::getTalksListById($db, $ids);
	}
	
	public static function getTalksByMonth($db, $year, $month)
	{
		$query = "select id, month(date) as Month, year(date) as Year from MLSSTalks having year={$year} and Month={$month} order by date desc;";
		$res = $db->run_query($query);
		if ($res==false)
		{
			return null;
		};
		$ids=array();
		for($i=0; $i<mysql_num_rows($res); $i++)
		{
			$ids[] = mysql_result($res, $i, 0);
		};
		return self::getTalksListById($db, $ids);
	}		
	
};








?>
