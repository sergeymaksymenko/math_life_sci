<?php

require_once("info.Organizations.php");
require_once("info.Participants.php");
require_once("info.Talks.php");


foreach ($orgs as $oo)
{
	print "INSERT INTO MLSSOrganizations VALUES ({$oo->listAll()});" . PHP_EOL;
};

foreach ($part as $pp)
{
	print "INSERT INTO MLSSParticipants VALUES ({$pp->listAll()});" . PHP_EOL;
	foreach ($pp->email as $e)
    {
		print "INSERT INTO MLSSParticipantEmails VALUES({$pp->id}, \"{$e}\");" . PHP_EOL;	
	};
	foreach ($pp->organization as $o)
    {
		print "INSERT INTO MLSSParticipantOrganizations VALUES({$pp->id}, {$o->id});" . PHP_EOL. PHP_EOL;	
	};	
}

foreach ($talks as $tt)
{
	print "INSERT INTO MLSSTalks VALUES ({$tt->listAll()});" . PHP_EOL;
	foreach($tt->speakers as $sp)
    {
		print "INSERT INTO MLSSTalkSpeakers VALUES({$tt->id}, {$sp->id});" . PHP_EOL;
	};
};






?>
