<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>White Love</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/WhiteLove/style.css" media="screen" />
</head>
<body>



<?php
	include_once("func.php");
//	include_once("pream.php");
//	include("header.php");
	
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

$years = CurrentSeminar::getYears($db);

$MonthNames=array('January', 'February', 'March', 'April', 'May', 'June', 'July',
'August', 'September', 'October', 'November', 'December');

$languages=array("ua", "ru", "en");

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











<div id="wrap">

	<div style="text-align:right; border:1" id="languages">
	<?php foreach($languages as $l) : ?>
		<a href="<?$cur_script?>?lang=<?=$l?>"><?=$l?></a> &nbsp;&nbsp;
	<?php endforeach; ?>	
	</div>
	

	<div id="header">
		<div id="logo" title="<?=$page_title->s($lang)?>">
		<table style="width:100%; border:1">
		<tr>
		<td><img src="<?=$base_path?>images/logo.jpg"></td>
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
				$t->toHtml($lang); // include("contents.php"); 
				print "<br>" .PHP_EOL;
			};
			?>		

			<h2><a href="#">License and terms of use</a></h2>
			<div class="articles">
				White Love Rounded is a CSS template that is free and fully standards compliant. <a href="http://www.free-css-templates.com/">Free CSS templates</a> designed this template.
				This template is allowed for all uses, including commercial use, as it is released under the <strong>Creative Commons Attributions 2.5</strong> license. The only stipulation to the use of this free template is that the links appearing in the footer remain intact. Beyond that, simply enjoy and have fun with it!	 
				<br /><br />
				<img src="images/pic.jpg" alt="Example pic" style="border: 3px solid #ccc;" />
				<br /><br />
				Donec nulla. Aenean eu augue ac nisl tincidunt rutrum. Proin erat justo, pharetra eget, posuere at, malesuada 
				et, nulla. Donec pretium nibh sed est faucibus suscipit. Nunc nisi. Nullam vehicula. In ipsum lorem, bibendum sed, 
				consectetuer et, gravida id, erat. Ut imperdiet, leo vel condimentum faucibus, risus justo feugiat purus, vitae 
				congue nulla diam non urna.
			</div>
			<h2><a href="#">Title with a link - Example of heading 2</a></h2>
			<div class="articles">
				Donec nulla. Aenean eu augue ac nisl tincidunt rutrum. Proin erat justo, pharetra eget, posuere at, malesuada 
				et, nulla. Donec pretium nibh sed est faucibus suscipit. Nunc nisi. Nullam vehicula. In ipsum lorem, bibendum sed, 
				consectetuer et, gravida id, erat. Ut imperdiet, leo vel condimentum faucibus, risus justo feugiat purus, vitae 
				congue nulla diam non urna.
			</div>
		</div>

		<div class="right"> 

			<h2>Categories :</h2>
			<ul>
			<li><a href="#">World Politics</a></li> 
			<li><a href="#">Europe Sport</a></li> 
			<li><a href="#">Networking</a></li> 
			<li><a href="#">Nature - Africa</a></li>
			<li><a href="#">SuperCool</a></li> 
			<li><a href="#">Last Category</a></li>
			</ul>

			<h2>Archives</h2>
			<ul>
			<li><a href="#">January 2007</a></li> 
			<li><a href="#">February 2007</a></li> 
			<li><a href="#">March 2007</a></li> 
			<li><a href="#">April 2007</a></li>
			<li><a href="#">May 2007</a></li> 
			<li><a href="#">June 2007</a></li> 
			<li><a href="#">July 2007</a></li> 
			<li><a href="#">August 2007</a></li> 
			<li><a href="#">September 2007</a></li>
			<li><a href="#">October 2007</a></li>
			<li><a href="#">November 2007</a></li>
			<li><a href="#">December 2007</a></li>
			</ul>

		</div>
		<div style="clear: both;"> </div>
	</div>

	<div id="footer">
		Designed by <a href="http://www.free-css-templates.com/">Free CSS Templates</a>, Thanks to <a href="http://www.openwebdesign.org/">website design</a>
	</div>

</div>

</body>
</html>
