<?php

require_once("class.LangStr.php");
require_once("class.MLSOrganization.php");
require_once("class.MLSParticipant.php");
require_once("class.MLSTalk.php");
require_once("database.php");




//~ class SqliteDatabase {
	//~ 
	//~ public $file;
	//~ 
	//~ 
	//~ public function __construct();
	//~ 
	//~ function run_query($query)
	//~ {
	//~ try { $res =  sqlite_query($query, $con); }
	//~ catch (Exception $e)
	//~ {
		//~ printError("Caught exception: {$e->getMessage()}", true);
		//~ printError("{$errorString} :" . mysql_error(), true);
		//~ return false;
	//~ };
	//~ if ($res != false) {
		//~ printSuccess($successString, $debug);
		//~ if ($res!=true) printSuccess("Number of records: " . mysql_num_rows($res), $debug);
	//~ }
	//~ else      {	printError("{$errorString} :" . mysql_error(), true); };
	//~ return $res;
//~ };
	
	
	


class SeminarInfo {
	
	const CUR_TALK = 0;
	const YEAR_ONLY = 1;
	const YEAR_MONTH = 2;
	
	public function __construct() {	}
	
	public static function getOrganizationById(SQLite3 $db, $id)
	{
		$query = "select * from MLSSOrganizations where id={$id}";
		$res = $db->query($query);
		if ($res==false)
		{
			return null;
		};
		
		$org = $res->fetchArray();
		$id=$org["id"];
		$title = new LangStr($org["title_eng"],$org["title_ukr"],$org["title_rus"]);
		$address = $org["address"];
		$url = $org["url"];

		return new MLSOrganization($title, $url, $address, $id);
	}



	public static  function getParticipantById(SQLite3 $db, $id)
	{
		$query = "select * from MLSSParticipants where id={$id}";
		$res = $db->query($query);
		if ($res==false)
		{
			return null;
		};
		
		$speaker = $res->fetchArray();
		$id=$speaker["id"];
		$name = new LangStr($speaker["name_eng"],$speaker["name_ukr"],$speaker["name_rus"]);
		$middlename = new LangStr($speaker["middlename_eng"],$speaker["middlename_ukr"],$speaker["middlename_rus"]);
		$surname = new LangStr($speaker["surname_eng"],$speaker["surname_ukr"],$speaker["surname_rus"]);
		$sex=$speaker["sex"];
		
		// get emails
		$email=array();
		$query = "select * from MLSSParticipantEmails where part_id={$id}";
		$res = $db->query($query);
		if ($res!=false)
		{
			while($row=$res->fetchArray())
			{
				$email[] = $row["email"];
			};
		};
		
		//print_r("email");
		
		$homepage="";
		$organization=array();
		$query = "select * from MLSSParticipantOrganizations where part_id={$id}";
		$res = $db->query($query);
		if ($res!=false)
		{
			while($row=$res->fetchArray())
			{
				$orgId=$row["org_id"];
				$organization[] = self::getOrganizationById($db, $orgId);
			};
		};
		return new MLSParticipant($name, $middlename, $surname, $sex, $email, $homepage, $organization, $id);
	}
	




	public static function getTalksListById(SQLite3 $db, $ids)
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



	public static function getTalkById(SQLite3 $db, $id)
	{
		// get the lattest seminar
		//~ print "======== {$id} ==========" . PHP_EOL;
		$query = "select * from MLSSTalks where id={$id}";
		$res = $db->query($query);
		if ($res==false)
		{
			return null;
		};
		
		
		//~ $cnt=sqlite_num_rows($res);
		//~ if (sqlite_num_rows($res)==0)
		//~ {
			//~ return null;
		//~ };
		
		
		$tt = $res->fetchArray(SQLITE3_ASSOC);
		
		$title = new LangStr($tt["title_eng"],$tt["title_ukr"],$tt["title_rus"]);
		$room=$tt["room"];
		$date=$tt["date"];
		
		// get organization
		$placeId=$tt["org_place_id"];
		$place=self::getOrganizationById($db, $placeId);
		
		// get speakers
		$speakers=array();
		$query = "select * from MLSSTalkSpeakers where talk_id={$id}";
		$res = $db->query($query);
		if ($res!=false)
		{
			while($row=$res->fetchArray())
			{
				$spId=$row["part_id"];
				$speakers[] = self::getParticipantById($db, $spId);
			};
		};

		// get files
		$files=array();
		$query = "select * from MLSSTalkFiles where talk_id={$id}";
		$res = $db->query($query);
		if ($res!=false)
		{
			while($row=$res->fetchArray())
			{
				$files[] = new MLSTalkFile ( $row["file"], $row["description"] );
			};
		};		
		return new MLSTalk($speakers, $title, $date, $place, $room, $files);
	}
	
	
	public static function getYears($db)
	{
		// get the lattest seminar
		$query = "select distinct strftime('%Y',t.date) as Year from MLSSTalks as t order by t.date desc";
		$res = $db->query($query);
		if ($res==false)
		{
			return null;
		};
		
		$years=array();
		while($row=$res->fetchArray())
		{
			$years[] = $row["Year"];
		};
		return $years;
	}

	public static function getMonths($db, $year)
	{
		// get the lattest seminar
		$query = "select distinct strftime('%m',t.date) as Month, strftime('%Y',t.date) as Year ".
		         "from MLSSTalks as t where Year='{$year}' order by t.date desc";
		$res = $db->query($query);
		if ($res==false)
		{
			return null;
		};
		
		$months=array();
		while($row=$res->fetchArray())
		{
			$months[] = $row["Month"];
		};
		return $months;
	}
	
	
	public static function getLastTalk(&$db)
	{
		$query = "select id from MLSSTalks order by date desc limit 1";
		$res = $db->query($query);
		if ($res==false)
		{
			return null;
		};
		$row=$res->fetchArray();
		$id = $row['id']; //sqlite_result($res, 0, 0);
		return self::getTalksListById($db, $id);
	}
	
	public static function getTalksByYear($db, $year)
	{
		$query = "select id, strftime('%Y',t.date) as Year from MLSSTalks as t where Year='{$year}' order by t.date desc";
		$res = $db->query($query);
		if ($res==false)
		{
			return null;
		};
		$ids=array();
		while($row=$res->fetchArray())
		{
			$ids[] = $row["id"];
		};
		return self::getTalksListById($db, $ids);
	}
	
	public static function getTalksByMonth($db, $year, $month)
	{
		$query = "select id, strftime('%m',t.date) as Month, strftime('%Y',t.date) as Year " .
		         "from MLSSTalks as t where Year='{$year}' and Month='". str_pad($month, 2, '0') . "' order by t.date desc";
		$res = $db->query($query);
		if ($res==false)
		{
			return null;
		};
		$ids=array();
		while($row=$res->fetchArray())
		{
			$ids[] = $row["id"];
		};
		return self::getTalksListById($db, $ids);
	}		
	
};








?>
