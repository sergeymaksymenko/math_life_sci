<?php
// registration_form.php
// class describing the action types
$cur_script = $_SERVER['PHP_SELF'];

// initialize edit parameters
$my_part->InitEditParams();

// set values for some fields
$my_part->eForm->legend="Додати учасника";
$my_part->ef["id"]->value=0;


if ( !isset($_REQUEST["curAction"]) )
{ 
	$my_part->eForm->warnings_off(); 
	include("registration_form.php");
}
else
{
	if ( $my_part->SaveRecord() )
	{
		echo "Congratulations! Registration is successfull<br>";
	}
	else
	{
		$my_part->eForm->warnings_on();
		include("registration_form.php");
	}
}
?>
