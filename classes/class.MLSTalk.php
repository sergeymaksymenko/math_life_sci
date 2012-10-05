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
		print "<a class='TALK_DATE'>{$Date->s($lang)}: {$this->date->format('Y-m-d, H:i')}</a><br>" .PHP_EOL;
		print "<a class='TALK_TITLE'>{$this->title->s($lang)}</a> <br>" .PHP_EOL;
		
		foreach ($this->speakers as $sp)
		{
			print "<a class='SPEAKER_TITLE'>{$sp->name->s($lang)} {$sp->surname->s($lang)}</a>" .PHP_EOL;
			$cnt=count($sp->organization);
			if ($cnt==0)
			{
				print "<br>" . PHP_EOL;
				continue;
			};
			print "<a class='SPEAKER_ORG'>(";
			for ($i=0; $i<$cnt-1; $i++)
			{
				print "{$sp->organization[$i]->title->s($lang)}, ";
			}
			print "{$sp->organization[$cnt-1]->title->s($lang)})</a>" . PHP_EOL;
			print "<br>" . PHP_EOL;
		}
		if ( count($this->files)>0 )
		{
			//print "<span id='abstracts'>";
			foreach($this->files as $f)
			{
				//~ print "<a href=\"{$f->file}\"><font color='#FF4800'>{$f->descr}</font></a>";
				print "<a href=\"{$f->file}\"><span id='abstract'>{$f->descr}</span></a>";
				//~ if  ($f->file!="")
				//~ {
					//~ print "<a href=\"{$f->file}\">{$f->descr}</a> ";
				//~ };
			};
			print "<br>".PHP_EOL;
		};		
		//print "Place: <a href='{$this->place->url}'>{$this->place->title->s($lang)}</a>, {$this->place->address} <br>" .PHP_EOL;
		//print "Room: {$this->room} <br>" .PHP_EOL;
	}
};




?>
