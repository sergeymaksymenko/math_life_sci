
<?php
$cur_script = $_SERVER['PHP_SELF'];
//include("search_init.php");
//$my_sem = new MyConfSearch($db_name, $table_name, $connData);
$curAction = ( isset($_REQUEST["curAction"]) ) ? $_REQUEST["curAction"] : "";

if ( $curAction == "Search" )
{ 
	echo "<p>CurAction is SEARCH</p>";
	$my_sem->InitSearchParams();
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
		$my_sem->InitEditDataByRecord("id", $_REQUEST["edit_rec"]);
		
		echo "<pre>";
		var_dump($my_sem->ef["id"]);
		echo "</pre>";
		
		//echo "<p>2</p>";
		$my_sem->eForm->legend="Edit record";
		//echo "<p>3</p>";
		$my_sem->eForm->warnings_off();
		//echo "<p>4</p>";
		$my_sem->eForm->show_all(true);		
		//echo "<p>5</p>";
		//echo $base_path."/add_participant/registration_form.php";
		include("../add_seminar/registration_form.php");
		//echo "<p>6</p>";
	};	
}
elseif ( $curAction == "Submit")
{
	//echo "<p>CurAction is Submit</p>";
	$my_sem->InitEditParams();
	//echo "<pre>"; print_r($my_sem->ef["id"]); echo "</pre>";
	//$my_sem->ef["id"]->set_value($_REQUEST["edit_rec"]);
	//echo "<pre>"; print_r($my_sem->ef["id"]); echo "</pre>";
	
	$res = $my_sem->UpdateRecord("id", $my_sem->ef["id"]->get_value());
	if ( $res )
	{
		echo "Record is succesfully saved!<br>";
	}
	else
	{
		$my_sem->eForm->legend="Edit record";
		$my_sem->eForm->warnings_on();
		$my_sem->eForm->show_all(true);	
		include("../add_seminar/registration_form.php");
	}
}
elseif ( $curAction == "Delete")
{
	//echo "<p>CurAction is DELETE</p>";
	if ( !isset($_REQUEST["delete_rec"]) )
	{
		echo "<p>Nothing to delete</p>";
	}
	elseif ( $my_sem->DeleteRecord("id", $_REQUEST["delete_rec"]) )
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
	$my_sem->SetDefaultSearchValues();
	include("search_form.php");
}

//$id_values = $my_sem->GetListOfFieldValues("id"); 


?>








