<?php

require_once("class.LangStr.php");
require_once("class.MLSOrganization.php");
require_once("class.MLSParticipant.php");
//require_once("class.DbObject.php");

class MLSTalkFile {
	public $file;
	public $descr;
	public function __construct($file, $descr)
	{
		$this->file = $file;
		$this->descr = $descr;
	}
	
	public function listAll()
	{
		return "{$this->file},{$this->descr}";
	}
};

class MLSTalk {

	private static $_id;

	public $speakers;
	public $title;
	public $date;
	public $place;
	public $room;
	public $files;
	
	public function __construct($speakers, LangStr $title, $date, MLSOrganization $place, $room, $files, $id=-1)
	{
		self::$_id++;
		$this->id = ($id<1)?  self::$_id : $id;
				
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
	
	public function listAll()
	{
		return "{$this->id},{$this->title->listAll()},\"{$this->date->format('Y-m-d H:i:s')}\",1,\"{$this->room}\"";
	}
	
/*
  	public function toHtml($lang)
	{
		print "Date: {$this->date->format('Y-m-d, H:i')} <br>" .PHP_EOL;
		print "<a class='TALK_TITLE'>{$this->title->s($lang)}</a> <br>" .PHP_EOL;
		foreach ($this->speakers as $sp)
		{
			print "<a class='SPEAKER_TITLE'>{$sp->name->s($lang)} {$sp->surname->s($lang)}</a> <br>" .PHP_EOL;
			foreach ($sp->organization as $org)
			{
				print "<a class='SPEAKER_ORG'>({$org->title->s($lang)})</a><br>" .PHP_EOL;
			}
		}
		//print "Place: <a href='{$this->place->url}'>{$this->place->title->s($lang)}</a>, {$this->place->address} <br>" .PHP_EOL;
		//print "Room: {$this->room} <br>" .PHP_EOL;
	}
*/

  	public function toHtml($lang)
	{
		$Date = new LangStr("Date", "Дата", "Дата");
		print "<span class='TALK_DATE'>{$Date->s($lang)}: {$this->date->format('Y-m-d, H:i')}</span><br>" .PHP_EOL;
		print "<span class='TALK_TITLE'>{$this->title->s($lang)}</span> <br>" .PHP_EOL;
		
		foreach ($this->speakers as $sp)
		{
			//print_r($sp);
			
			print "<a href='index.php?&lang={$lang}&p={$sp->id}'><span class='SPEAKER_TITLE'>{$sp->name->s($lang)} {$sp->surname->s($lang)}</span></a>" .PHP_EOL;
			$cnt=count($sp->organization);
			if ($cnt==0)
			{
				print "<br>" . PHP_EOL;
				continue;
			};
			print "<span class='SPEAKER_ORG'>(";
			$firstOrg=true;
			for ($i=0; $i<$cnt; $i++)
			{
				if ($firstOrg) { $firstOrg = false; } else { $firstOrg=true; print ", "; };
				if ($sp->organization[$i]->url=="")
				{
					print "{$sp->organization[$i]->title->s($lang)}";
				}
				else
				{
					print "<a href='{$sp->organization[$i]->url}' target='blank'>{$sp->organization[$i]->title->s($lang)}</a>";
				}
			}
			//print "{$sp->organization[$cnt-1]->title->s($lang)})</span>" . PHP_EOL;
			print ")<br>" . PHP_EOL;
		}
		if ( count($this->files)>0 )
		{
			$cnt=count($this->files);
			for ($i=0; $i<$cnt-1; $i++)
			{
				print "<a href=\"{$this->files[$i]->file}\"><span id='abstract'>{$this->files[$i]->descr}</span></a> &nbsp;|&nbsp; ";
			};
			print "<a href=\"{$this->files[$cnt-1]->file}\"><span id='abstract'>{$this->files[$cnt-1]->descr}</span></a><br>" . PHP_EOL;
		};		
		//print "Place: <a href='{$this->place->url}'>{$this->place->title->s($lang)}</a>, {$this->place->address} <br>" .PHP_EOL;
		//print "Room: {$this->room} <br>" .PHP_EOL;
	}
};




?>
