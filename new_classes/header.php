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


<div id="main_part">
<table width="100%" border='1'>
<tr>
<td style="width:20%">
	<table border="">
	<tr><td>Current seminar</td></tr>
	<tr><td>Archive</td></tr>
<?php

$years = CurrentSeminar::getYears($db);
foreach($years as $y)
{
	print "\t<tr><td>{$y}</td></tr>".PHP_EOL;
};

?>	
	</table>
</td>
<td style="width:80%">
	<table border="0">
	<tr><td>
		<h1>Current seminar</h1>
	<?php
	$t = CurrentSeminar::getTalkById($db, 7);
	$t->toHtml($lang); // include("contents.php"); 
	?>		
	</td></tr>
	</table>
</td>
</tr>	
</table>


