<?php
$cur_script = $_SERVER['PHP_SELF'];

// initialize edit parameters
$my_sem->InitEditParams();

/*
echo "<pre>";
var_dump($my_sem->ef["speaker1"]);
echo "</pre>";
*/


// set values for some fields
$my_sem->eForm->legend="Додати засідання";
$my_sem->ef["id"]->value=0;


if ( !isset($_REQUEST["curAction"]) )
{ 
	$my_sem->eForm->warnings_off(); 
	include("registration_form.php");
}
else
{
	if ( $my_sem->SaveRecord() )
	{
		echo "Congratulations! Registration is successfull<br>";
	}
	else
	{
		$my_sem->eForm->warnings_on();
		include("registration_form.php");
	}
}
?>
