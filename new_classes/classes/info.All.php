<?php

require_once("info.Organizations.php");
require_once("info.Participants.php");
require_once("info.Talks.php");


foreach ($orgs as $oo)
{
	print "INSERT INTO Organizations VALUES ({$oo->listAll()});" . PHP_EOL;
};

foreach ($part as $pp)
{
	print "INSERT INTO Participants VALUES ({$pp->listAll()});" . PHP_EOL;
	foreach ($pp->email as $e)
    {
		print "INSERT INTO ParticipantEmails VALUES({$pp->id}, \"{$e}\");" . PHP_EOL;	
	};
	foreach ($pp->organization as $o)
    {
		print "INSERT INTO ParticipantOrganizations VALUES({$pp->id}, {$o->id});" . PHP_EOL. PHP_EOL;	
	};	
}

foreach ($talks as $tt)
{
	print "INSERT INTO Talks VALUES ({$tt->listAll()});" . PHP_EOL;
	foreach($tt->speakers as $sp)
    {
		print "INSERT INTO TalkSpeakers VALUES({$tt->id}, {$sp->id});" . PHP_EOL;
	};
};






?>
