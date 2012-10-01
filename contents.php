<div>

<!--
<table width='100%'>
<tr width='100%'>
<td width='20%'>
</td>
<td width='80%'>
-->
	
<h1 align='center'><?=phrase("Поточне засідання", "Current seminar", $lang)?></h1>

<?php
// get last seminar
$query = "select * from ".$seminar_table_name." where date=(select max(date) from ".$seminar_table_name.");";
$res = $db->run_query($query);

$row=mysql_fetch_array($res, MYSQL_ASSOC);

$speakers=array();
if ($row["speaker1"]!=0)
{
$query = "select * from ".$partic_table_name." where id=". $row["speaker1"]. ";";
$res_sp1 = $db->run_query($query);
$speakers[] = mysql_fetch_array($res_sp1, MYSQL_ASSOC);
};

if ($row["speaker2"]!=0)
{
$query = "select * from ".$partic_table_name." where id=". $row["speaker2"]. ";";
$res_sp2 = $db->run_query($query);
$speakers[] = mysql_fetch_array($res_sp2, MYSQL_ASSOC);
};

if ($row["speaker3"]!=0)
{
$query = "select * from ".$partic_table_name." where id=". $row["speaker3"]. ";";
$res_sp3 = $db->run_query($query);
$speakers[] = mysql_fetch_array($res_sp3, MYSQL_ASSOC);
};

if ($row["speaker4"]!=0)
{
$query = "select * from ".$partic_table_name." where id=". $row["speaker4"]. ";";
$res_sp4 = $db->run_query($query);
$speakers[] = mysql_fetch_array($res_sp4, MYSQL_ASSOC);
};

$isStarted=false;
foreach ($speakers as $sp)
{
	//if ($isStarted) echo ", ";
	echo "<br><a class='SPEAKER'>" . $sp["name_${lang}"] . " " . $sp["surname_${lang}"] . "</a>";
	if (strlen($sp["org1_${lang}"])>0)
	{
		echo " (<a class='ORGANIZATION'>" . $sp["org1_${lang}"] . "</a>)";
	};
	echo PHP_EOL;
	//$isStarted=true;
};
echo "<br><a class='TALK'>". $row["title_{$lang}"] ."</a>". PHP_EOL;
echo "<br>" . phrase("Дата", "Date", $lang) . ": <a class='DATE_TIME'>". $row["date"] . "</a>, " 
            . phrase("час", "time", $lang) . ": <a class='DATE_TIME'>".$row["time"]."</a>". PHP_EOL;
?>



<!--
</td>
</tr>	
</table>	
-->
</div>
