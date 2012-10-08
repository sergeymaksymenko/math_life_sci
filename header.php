<!DOCTYPE HTML>
<html>
<meta charset="UTF-8">
<meta name="Description" content="<?=$page_description->s($lang)?>">
<meta http-equiv="Keywords" content="<?=$page_keywords->s($lang)?>">
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html">
<link rel="stylesheet" type="text/css" href="<?=$base_path?>style.css" media="screen" />
<title><?=$page_title->s($lang)?></title>
<body>
<div id="wrap">
	<div id="languages" style="text-align:right">

	<?php
	$params = ( isset($_REQUEST["a"]) ? "&a" : "" ) .
	          ( isset($_REQUEST["y"]) ? "&y=".$_REQUEST["y"] : "" ) .
	          ( isset($_REQUEST["m"]) ? "&m=".$_REQUEST["m"] : "" );
	
	foreach($languages as $l) : ?>
		<a href="<?$cur_script?>?lang=<?=$l.$params?>"><?=$l?></a> &nbsp;&nbsp;
	<?php endforeach; ?>	

	</div>
	
	<div id="header">
		<div id="logo" title="<?=$page_title->s($lang)?>">
		<table style="width:100%; border:1">
		<tr>
		<td><img src="<?=$base_path?>images/math_life.jpg" height="76ex"></td>
		<td>
			<h1><span id='pagetitle'><?=$page_title->s($lang)?></span></h1><br>
		</td>
		</tr>
		</table>
		</div>
	</div>

	<div id="content">
		<div class="left">
			
			<p><strong><?=$Place->s($lang)?>:</strong></p>
			<p><?=$Address->s($lang)?>, <?=$Room->s($lang)?> <strong>208</strong></p>
			<br><br>
			
			
			<?php

			if ($action==SeminarInfo::ALL_SEMINARS)
			{
				$semlist = SeminarInfo::printAllSeminarsShortList($db, $lang3);
				print "<ul align='left'>" .PHP_EOL;
				foreach ($semlist as $row)
				{
					print "<li><strong>" . $row["date"] . "</strong><br>" .
					      $row["speakers"] . 
					       "<br><i>" . $row["title"] . "</i></li>". PHP_EOL;
				};
				print "</ul>" .PHP_EOL;
			}
			else
			{
				foreach($talks as $t)
				{
					print "<div class=\"articles\">" . PHP_EOL;
					$t->toHtml($lang); // include("contents.php"); 
					print "</div><br>" .PHP_EOL;
				};
			};
			?>		
		</div>
		
		<div class="right">
	
			<h2><?=$Categories->s($lang)?></h2>
			<ul>
				<li><a href='index.php?lang=<?=$lang?>'><?=$CurSeminar->s($lang)?></a></li>
				<li><a href='index.php?lang=<?=$lang?>&a'><?=$AllSeminars->s($lang)?></a></li>
			</ul>
			
			<h2><?=$Archive->s($lang)?></h2>
				<ul>
			<?php
			foreach($years as $y)
			{
				print "\t<li><a href='index.php?lang={$lang}&y={$y}'>{$y}</a></li>" . PHP_EOL;
				if ($action == SeminarInfo::YEAR_MONTH || $action == SeminarInfo::YEAR_ONLY )
				{
					if ( $_REQUEST["y"] != $y ) continue;
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
