<?php
$talks=array();
$action=SeminarInfo::CUR_TALK;
if ( isset($_REQUEST["y"]) && isset($_REQUEST["m"]) )
{ 
	$action=SeminarInfo::YEAR_MONTH;
	$talks = SeminarInfo::getTalksByMonth($db, $_REQUEST["y"], $_REQUEST["m"]);
}
elseif ( isset($_REQUEST["y"]) )
{
	$action=SeminarInfo::YEAR_ONLY;
	//$talks = SeminarInfo::getTalksByYear($db, $_REQUEST["y"]);	
	$talks = SeminarInfo::getLastTalk($db);
};

if ( count($talks) == 0 )
{
	$action=SeminarInfo::CUR_TALK;
	$talks = SeminarInfo::getLastTalk($db);
};

$years = SeminarInfo::getYears($db);

$MonthNamesEng=array('January', 'February', 'March', 'April', 'May', 'June', 'July',
'August', 'September', 'October', 'November', 'December');
$MonthNamesUkr=array('Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень',
'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень');

$MonthNamesRus=array('Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август',
'Сентябрь','Октябрь','Ноябрь','Декабрь');

$MonthsNames=array();
for($i=0; $i<12;$i++)
{
	$MonthsNames[] = new LangStr($MonthNamesEng[$i], $MonthNamesUkr[$i], $MonthNamesRus[$i]);
};

//$languages=array("ua", "ru", "en");


$Categories = new LangStr("Categories", "Категорії", "Категории");
$Archive = new LangStr("Archive", "Архів", "Архив");
$CurSeminar = new LangStr("Current seminar", "Поточний семінар", "Текущий семинар");


?>




<?php
$cnt_file_name="counter.txt";
$visits_ip_file_name="visits_ip.txt";


$handle = fopen($cnt_file_name, 'r');
if ($handle != false) {
	//	echo "File {$cnt_file_name} is correctly opened! <br>";
	// read at most 265 symbols from the file
    if ( ($buffer = fgets($handle, 256) ) !== false ) {
//		echo "The line from file is read:<br>{$buffer}<br>";
        $cnt = intval($buffer)+1;
    } else
    {
//		echo "Error reading line from file<br>";
		$cnt=1;
	};
    fclose($handle);
}
else
{
//	echo "Error opening file {$cnt_file_name} for reading <br>";
	$cnt=1;
};
// save counter to the file
$handle = fopen($cnt_file_name, 'w');
if ($handle != false) {
	fwrite($handle, "{$cnt}");
	fclose($handle);
};


function get_ip_address() {
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                    return $ip;
                }
            }
        }
    }
}

// save counter to the file
$handle = fopen($visits_ip_file_name, 'a+');
if ($handle != false) {
	fwrite($handle, "{$cnt}:\tip: ".get_ip_address(). "\tdate: ". date('Y-m-d G:i:s'). PHP_EOL);
	fclose($handle);
};

?>


<!DOCTYPE HTML>
<html>
<meta charset="UTF-8">
<meta name="Description" content="<?=$page_description->s($lang)?>">
<meta http-equiv="Keywords" content="<?=$page_keywords->s($lang)?>">
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html">
<link rel="stylesheet" type="text/css" href="<?=$base_path?>style.css" media="screen" />

<title><?=$page_title->s($lang)?></title>
<style type="text/css">
.TALK_TITLE {color:black; font-size:2.5ex; weight:bold}
.SPEAKER_TITLE {color:blue; font-size:2ex; }
.SPEAKER_ORG {font-size:1.5ex; }
</style>

<body>

<!--div id="full_page" style="width:80%; margin-left:10%; margin-right:10%; margin-top:2em;"-->

<div id="wrap">
	<div id="languages" style="text-align:right">

	<?php
	$params = ( isset($_REQUEST["y"]) ? "&y=".$_REQUEST["y"] : "" ) .
	          ( isset($_REQUEST["m"]) ? "&m=".$_REQUEST["m"] : "" );
	
	foreach($languages as $l) : ?>
		<a href="<?$cur_script?>?lang=<?=$l.$params?>"><?=$l?></a> &nbsp;&nbsp;
	<?php endforeach; ?>	



	</div>
	
	<div id="header">
		<div id="logo" title="<?=$page_title->s($lang)?>">
		<table style="width:100%; border:1">
		<tr>
		<td><img src="<?=$base_path?>images/math_life.jpg" height="120ex"></td>
		<td>
			<h1><a href="#"><?=$page_title->s($lang)?></a></h1>
		</td>
		</tr>
		</table>
		</div>
	</div>

	<div id="content">
		<div class="left">
			<?php
			foreach($talks as $t)
			{
				print "<div class=\"articles\">" . PHP_EOL;
				$t->toHtml($lang); // include("contents.php"); 
				print "</div><br>" .PHP_EOL;
			};
			?>		
		</div>
		
		<div class="right">
	
			<h2><?=$Categories->s($lang)?></h2>
			<ul>
				<li><a href='index.php?lang=<?=$lang?>'><?=$CurSeminar->s($lang)?></a></li>
			</ul>
			
			<h2><?=$Archive->s($lang)?></h2>
				<ul>
			<?php
			foreach($years as $y)
			{
				print "\t<li><a href='index.php?lang={$lang}&y={$y}'>{$y}</a></li>" . PHP_EOL;
				if ($action == SeminarInfo::CUR_TALK) continue;
				if ($_REQUEST["y"] == $y)
				{
					$months = SeminarInfo::getMonths($db, $y);
					print "\t<ul>".PHP_EOL;
					foreach($months as $m)
					{
						print "\t\t<li><a href='index.php?lang={$lang}&y={$y}&m={$m}'>{$MonthsNames[$m-1]->s($lang)}</a></li>".PHP_EOL;
					};
					print "\t</ul>".PHP_EOL;
				};
			};
			?>
				</ul>

		</div> <!--  end of right -->
	
		<div style="clear: both;"> </div>
		
	</div>  <!--  end of content -->

	<div id="footer">
		<div id="counter" style="text-align:right; font-size:0.5em;">Page visits counter: <?=$cnt?></div>
	</div>
	
</div>  <!--  end of wrapper -->
	
	



