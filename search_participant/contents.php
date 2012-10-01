
<?php
$cur_script = $_SERVER['PHP_SELF'];
//include("search_init.php");
//$my_part = new MyConfSearch($db_name, $table_name, $connData);
$curAction = ( isset($_REQUEST["curAction"]) ) ? $_REQUEST["curAction"] : "";

if ( $curAction == "Search" )
{ 
	echo "<p>CurAction is SEARCH</p>";
	$my_part->InitSearchParams();
	include("search_form.php");
}
elseif ( $curAction == "Edit")
{
	echo "<p>CurAction is EDIT</p>";
	if ( !isset($_REQUEST["edit_rec"]) )
	{
		echo "<p>Nothing to edit</p>";
	}
	else
	{
		echo "<p>1</p>";
		$my_part->InitEditDataByRecord("id", $_REQUEST["edit_rec"]);
		
		echo "<pre>";
		var_dump($my_part->ef["id"]);
		echo "</pre>";
		
		echo "<p>2</p>";
		$my_part->eForm->legend="Edit record";
		//echo "<p>3</p>";
		$my_part->eForm->warnings_off();
		//echo "<p>4</p>";
		$my_part->eForm->show_all(true);		
		//echo "<p>5</p>";
		//echo $base_path."/add_participant/registration_form.php";
		include("../add_participant/registration_form.php");
		//echo "<p>6</p>";
	};	
}
elseif ( $curAction == "Submit")
{
	//echo "<p>CurAction is Submit</p>";
	$my_part->InitEditParams();
	//echo "<pre>"; print_r($my_part->ef["id"]); echo "</pre>";
	//$my_part->ef["id"]->set_value($_REQUEST["edit_rec"]);
	//echo "<pre>"; print_r($my_part->ef["id"]); echo "</pre>";
	
	$res = $my_part->UpdateRecord("id", $my_part->ef["id"]->get_value());
	if ( $res )
	{
		echo "Record is succesfully saved!<br>";
	}
	else
	{
		$my_part->eForm->legend="Edit record";
		$my_part->eForm->warnings_on();
		$my_part->eForm->show_all(true);	
		include("../add_participant/registration_form.php");
	}
}
elseif ( $curAction == "Delete")
{
	//echo "<p>CurAction is DELETE</p>";
	if ( !isset($_REQUEST["delete_rec"]) )
	{
		echo "<p>Nothing to delete</p>";
	}
	elseif ( $my_part->DeleteRecord("id", $_REQUEST["delete_rec"]) )
	{
		echo "<p>Record succesfully deleted!</p>";
	}
	else 
	{
		echo "<p>Error deleting record!</p>";
	};
		
		
		
}
else 
{
	//echo "<p>CurAction is UKNOWN</p>";
	$my_part->SetDefaultSearchValues();
	include("search_form.php");
}

//$id_values = $my_part->GetListOfFieldValues("id"); 


?>








