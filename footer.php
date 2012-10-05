<!--div id='footer'>
<hr width="100%">
<p align='center'>
<a href='http://www.imath.kiev.ua'>Institute of Mathematics of NASU</a> &nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;
<a href='http://www.imath.kiev.ua/~topology'>Topology department</a>
</p>
</div-->

<!--div id="footer">
<p align="right" style="padding: 0; margin: 0;">© S. Maksymenko, 2012&nbsp;&nbsp;&nbsp;&nbsp;</p>
</div-->

<!--
</td></tr>
</table>
-->




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

<div id="counter" style="text-align:right; font-size:0.5em;">Page visits counter: <?=$cnt?></div>
