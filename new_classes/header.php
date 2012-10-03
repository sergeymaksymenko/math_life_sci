<p align="right"><a href="index.php">ukr</a> <a href="index.php?en">eng</a></p>


<div id="full_page" style="width:80%; margin-left:10%; margin-right:10%; margin-top:2em;">


<div id="logo" class='FIELDSET' title="<?=$page_title->s($lang)?>">
<table border="1">
<tr>
<td><img src="<?=$base_path?>images/logo.jpg"></td>
<td align="center"><a class="S_LOGOTEXT">
<?=$page_title->s($lang)?></a></td>
</tr>
</table>
</div>




<?php

$talks=array();
$action=CurrentSeminar::CUR_TALK;
if ( isset($_REQUEST["y"]) && isset($_REQUEST["m"]) )
{ 
	$action=CurrentSeminar::YEAR_MONTH;
	$talks = CurrentSeminar::getTalksByMonth($db, $_REQUEST["y"], $_REQUEST["m"]);
}
elseif ( isset($_REQUEST["y"]) )
{
	$action=CurrentSeminar::YEAR_ONLY;
	//$talks = CurrentSeminar::getTalksByYear($db, $_REQUEST["y"]);	
	$talks = CurrentSeminar::getLastTalk($db);
};

if ( count($talks) == 0 )
{
	$action=CurrentSeminar::CUR_TALK;
	$talks = CurrentSeminar::getLastTalk($db);
};

?>

<?php
$MonthNames=array('January', 'February', 'March', 'April', 'May', 'June', 'July',
'August', 'September', 'October', 'November', 'December');
?>


<div id="main_part">
<table width="100%" border='1'>
<tr>
<td style="width:20%">
	<table border="">
	<tr><td><a href='index.php'>Current seminar</a></td></tr>
	<tr><td>Archive</td></tr>
<?php

$years = CurrentSeminar::getYears($db);
foreach($years as $y)
{
	print "\t<tr><td>&nbsp;<a href='index.php?y={$y}'>{$y}</a></td></tr>".PHP_EOL;
	if ($action == CurrentSeminar::CUR_TALK) continue;
	
	if ($_REQUEST["y"] == $y)
	{
		$months = CurrentSeminar::getMonths($db, $y);
		foreach($months as $m)
		{
			print "\t<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?y={$y}&m={$m}'>{$MonthNames[$m-1]}</a></td></tr>".PHP_EOL;
		};
	};
};

?>	
	</table>
</td>
<td style="width:80% valign:top">
	<table border="0">
	<tr><td>
		<h1>Current seminar</h1>
	<?php
	//$talks = CurrentSeminar::getTalksListById($db, array(1,2,3));
	//$talks = CurrentSeminar::getLastTalk($db);
	//$talks = CurrentSeminar::getTalksByYear($db, 2012);	
	//$talks = CurrentSeminar::getTalksByMonth($db, 2012, 2);
	//print_r($talks);
	foreach($talks as $t)
	{
		$t->toHtml($lang); // include("contents.php"); 
		print "<br>" .PHP_EOL;
	};
	?>		
	</td></tr>
	</table>
</td>
</tr>	
</table>


