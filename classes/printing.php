<?php

// print messages
function printAction($str, $debug=false, $OUTPUT_IN_COMMENTS=true)
{
	//if ($debug) if ($str!="") echo "<a class='ACTION'>" . $str . "</a><br>\n";
	if ($debug && ( strlen($str)>0 ))
	{
		if ($OUTPUT_IN_COMMENTS) echo "\n<!-- ACTION: {$str} -->\n";
		else echo "<a class='ACTION'>{$str}</a><br>\n";
	}
};


function printError($str, $debug=false, $OUTPUT_IN_COMMENTS=true)
{
	if ($str!="")
	{
		if ($OUTPUT_IN_COMMENTS) echo "\n<!-- ERROR: {$str} -->\n";
		else echo "<a class='ERROR'>{$str}</a><br>\n";
	}
};

function printSuccess($str, $debug=false, $OUTPUT_IN_COMMENTS=true)
{
	if ($debug && ( strlen($str)>0 ))
	{
		if ($OUTPUT_IN_COMMENTS) echo "\n<!-- SUCCESS: {$str} -->\n";
		else echo "<a class='SUCCESS'>{$str}</a><br>\n";
	};
};


function printQuery($str, $debug=false, $OUTPUT_IN_COMMENTS=true)
{
	if ($debug && ( strlen($str)>0 ))
	{
		if ($OUTPUT_IN_COMMENTS) echo "\n<!-- QUERY: {$str} -->\n";
		else echo "Query: <a class='Query'>{$str}</a><br>\n";
	}
};

function printInfo($str, $debug=false, $OUTPUT_IN_COMMENTS=true)
{
	if ($debug && ( strlen($str)>0 ))
	{
		if ($OUTPUT_IN_COMMENTS) echo "\n<!-- INFO: {$str} -->\n";
		else echo ">> <a class='INFO'>{$str}</a><br>\n";
	};
};



//==================================================================================




function print_if_nonempty($str)
{
	return (  (strlen($str)>0) ? $str : "" );
};

function begin_form($name="", $action="", $method="GET", $params="")
{
	echo "<form name='{$name}' action='{$action}' method='{$method}' {$params}>\n";
};
function end_form() { echo "</form>\n"; };


function begin_table($params="") { echo "<table {$params}>\n"; };
function end_table() { echo "</table>\n"; };

function begin_row($params="") { echo "<tr {$params}>\n"; };
function end_row() { echo "</tr>\n"; };

function begin_col($params="") { echo "<td {$params}>\n"; };
function end_col() { echo "</td>\n"; };

function input_text($name="", $value="")
{
	echo "<input type='text' name='{$name}' value='{$value}' />";
};

function input_chkbox($name="", $value="", $checked=false)
{
	echo "<input type='checkbox' name={$name} value={$value} ". ( ($checked) ? "checked" : "" ) . " />";
};

function input_radio($name, $value, $checked=false)
{
	echo "<input type='radio' name={$name} value={$value} ". ( ($checked) ? "checked" : "" ) . " />";
};


function input_submit($value)
{
	echo "<input type='submit' value='{$value}' />";
};

function input_hidden($name, $value)
{
	echo "<input type='hidden' name='{$name}' value='{$value}' />";
};



function actionButton($scrName, $actName, $actVal, $caption)
{
	begin_form($action=$scrName);
		input_hidden($actName, $actVal);
		input_submit($caption);
	end_form();
};



function reloadButton($scrName, $actName, $caption)
{
	echo "<form action='{$scrName}' method='GET'><input type=submit value='{$caption}'></form>";
}; 
	

function actionTextFields($scrName, $captions, $names, $values, $sizes, $actName, $actVal, $caption)
{
	echo "<form action='{$scrName}' method='GET'>\n";
	for ($i=0; $i<count($names); $i++)
	{
       echo "{$captions[$i]}: <input type='text' name='{$names[$i]}' value='{$values[$i]}'  size='{$sizes[$i]}'/><br>\n";
	};
	echo "<input type='hidden' name='{$actName}' value='{$actVal}'/>\n";
	echo "<input type=submit value='{$caption}'>\n";
	echo "</form>\n";
};


// create two buttons select all / unselect all of checkboxes with name $name
function print_SelUnselAllBtns($name)
{
	echo "<input type='button' name='CheckAll' value='Выделить все' onClick=\"setAll('{$name}', true)\" class='PARAMS' >\n";
	echo "<input type='button' name='UnCheckAll' value='Отменить все' onClick=\"setAll('{$name}', false)\" class='PARAMS'>\n";
};

// prints records from mysqlResult in the table.
// if $chkBoxPref=="", then the first row will consists of check boxes
function show_query_results($result, $fldCapt, $chkBoxPref)
{
	$useChkBoxes = (strlen($chkBoxPref) != 0);

	echo "<table border='1'>\n";
    // extract field names if $fieldsName is empty
	$rowsCnt=mysql_numrows($result);
	$fieldsCnt=mysql_num_fields($result);

	$names=array();
	for ($i=0; $i<$fieldsCnt; $i++)
	{
		 $meta = mysql_fetch_field($result, $i);
		 $names[]=$meta->name;
	};
	// print table header
	echo "<tr>\n";

	//-----------
	// skip one cell for column of check-boxes if necessary
	if ($useChkBoxes) echo "<td></td>"; 
	//-----------	

	if ($fldCapt == 0)
	{
		for ($i=0; $i<count($names); $i++)
			 echo  "<td>{$names[$i]}</td>";
	}
	else
	{
		for ($i=0; $i<count($names); $i++)
			 echo  "<td>{$fldCapt[$i]}</td>";
	};
	
	echo "\n</tr>\n";
    // print table contents
	for ($r=0; $r<$rowsCnt; $r++)
	{
		echo "<tr>";
		//-----------
		// put check box if necesary
		if ($useChkBoxes) 
			echo "<td><input type='checkbox' name='{$chkBoxPref}' value = '{$r}'></td>";
		//-----------
		
		
		for ($i=0; $i<count($names); $i++)
		{
			$item=mysql_result($result, $r, $names[$i]);
			echo "<td>{$item}</td>";
		};
		echo "</tr>\n";
	};
	echo "</table>\n";
	

};

















function print_query_results($result, InputList $theObj, $fieldInd, $fieldCaption)
{
	$rowsCnt=mysql_numrows($result);
	$colsCnt=mysql_num_fields($result);

	if (count($theObj->items) != $rowsCnt)
	{
		printError("The number of records ({$rowsCnt}) differs from the number of items in object {$theObj->name} (".count($theObj->items).")");
		return false;
	};
	
	if ($fieldInd>$colsCnt)  $fieldInd = $colsCnt;
	
	// start printing table 
	echo "<table border='1'>\n";

	// print table header
	echo "<tr>\n";
	for ($i=0; $i<$fieldInd; $i++)
	{
		echo "<td>" . mysql_fetch_field($result, $i)->name . "</td>";
	};
	echo "<td>{$fieldCaption}</td>";
	for ($i=$fieldInd; $i<$colsCnt; $i++)
	{
		echo "<td>" . mysql_fetch_field($result, $i)->name . "</td>";
	};
	echo "\n</tr>\n";
	
    // print table contents
	for ($r=0; $r<$rowsCnt; $r++)
	{
		echo "<tr>\n";
		for ($i=0; $i<$fieldInd; $i++)
		{
			echo "<td>" . mysql_result($result, $r, $i) . "</td>";
		};
		echo "<td>{$theObj->print_item($r)}</td>";
		for ($i=$fieldInd; $i<$colsCnt; $i++)
		{
			echo "<td>" . mysql_result($result, $r, $i) . "</td>";
		};
		echo "\n</tr>\n";
	};
	echo "</table>\n";
	return true;

};

?>
