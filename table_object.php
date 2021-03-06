<?

class MyTableObject {
	public $db;         // database: object of class Database
	public $table_name; // name of the table
	
	public $ef;   // array of objects of class myInputField containing information about fields for 
	public $eForm; // object of class dbFieldSet

	public $sf;   // array of objects of class mySearchField containing information about registration fields
	public $sForm; // object of class dbFieldSet

	public $sort_by_field;
	public $sort_direction;

	public $def_sort_by_field;
	public $def_sort_dir;
	
	public $id_field; // the field 
	
/*
	 constructor of class MyTableObject
	 * 
	 *  @param  string $db_name
	 *          name of table  
	 *  @param  string $table_name
	 *          name of database  
	 *  @param  ConnectionData &$connData
	 *          object of class ConnectionData
	 *  @param  array &$fp
	 *          array of elelements of class myFieldParams
*/
	public function __construct(Database & $db, $table_name, 
	                            &$fp, $def_sort_by_field, $def_sort_dir, $id_field)
	{
		// set parameters for database 
		$this->db = $db;
		//$this->db->debug_off();
		// set table name
		$this->table_name=$table_name;
		
		// fill arrays ef and sf
		$this->ef = array();
		$this->sf = array();
		foreach($fp as $key=>$f)
		{
			//print_r($f);
			
			if ($f->eType=="text")
			{
				//echo "<p>The type of field {$key}: '{$f->eType}'</p>" . PHP_EOL;
				$this->ef[$key] = new myInputTextField($f->eCaption, $f->eWarning, 
				        $f->eParams["value"], $f->eParams["class"], $f->eParams["size"],
				        $f->eMandatory, $f->eVisible, $f->eEnabled);
			} 
			elseif ($f->eType=="numeric")
			{
				//echo "<p>The type of field {$key}: '{$f->eType}'</p>" . PHP_EOL;
				$this->ef[$key] = new myInputNumField($f->eCaption, $f->eWarning, 
				        $f->eParams["value"], $f->eParams["class"], $f->eParams["size"],
				        $f->eMandatory, $f->eVisible, $f->eEnabled);
			} 			
			elseif ($f->eType=="textarea")
			{
				//echo "<p>The type of field {$key}: '{$f->eType}'</p>" . PHP_EOL;
				$this->ef[$key] = new myInputTextArea($f->eCaption, $f->eWarning, 
				        $f->eParams["value"], $f->eParams["class"], $f->eParams["rows"],  $f->eParams["cols"],
				        $f->eMandatory, $f->eVisible, $f->eEnabled);
			}
			elseif ($f->eType=="select")
			{
				//echo "<p>The type of field {$key}: '{$f->eType}'</p>" . PHP_EOL;
				$this->ef[$key] = new myInputSelect($f->eCaption, $f->eWarning, 
				        $f->eParams["values"], $f->eParams["default_key"], $f->eParams["class"],
				        $f->eMandatory, $f->eVisible, $f->eEnabled);
			} 
			else 
			{
				//echo "<p>The type of field {$key}: '{$f->eType}' is unknown</p>" . PHP_EOL;
				continue;
			};
			$this->sf[$key] = new mySearchField($f->sCaption, $f->sDefChecked);
		}
		
		printInfo("Creating object MyTableObject", $this->db->debug);
		printInfo("Number of fields : " .  count($this->ef), $this->db->debug);
		
		$this->sForm = new dbSearchForm("Search form", "sf");
		$this->eForm = new dbEditForm("Edit form", "ef");
		
		
		$this->def_sort_by_field = $def_sort_by_field;
		$this->def_sort_dir = $def_sort_dir;
		$this->id_field = $id_field;
		
		$this->CreateTable($fp);
		
	}
	
	//===== prints 
	public function PrintEditForm()
	{
		//$this->eForm->legend="Registration form";
		$this->eForm->print_form($this->ef);
	}
	
	public function InitEditParams()
	{
		printInfo("Initialize edit parameters", $this->db->debug);
		foreach ($this->ef as $key => $eitem)
		{
			$name=$this->eForm->name_key($key);
			printInfo($name, $this->db->debug);
			if ( isset($_REQUEST[$name]) )  { $eitem->set_value($_REQUEST[$name]); }
			else { $eitem->set_default_value(); };
			printInfo($eitem->get_value(), $this->db->debug);
		};
	}
	
	public function CheckEditParams()
	{
		printInfo("Checking edit parameters", $this->db->debug);
		$res=true;
		foreach ($this->ef as $eitem)
		{
			if (!$eitem->visible) continue;
			$res = $res && $eitem->value_is_correct();
		};
		// moreover produce additional checks
/*
		$this->ef["birthday"]->value = check_date($this->ef["birthday"]->value);
		$this->ef["arrival_date"]->value = check_date($this->ef["arrival_date"]->value);
		$this->ef["departure_date"]->value = check_date($this->ef["departure_date"]->value);
*/
		return $res;
	}
	
	// save registration data
	public function SaveRecord()
	{
		printInfo("Save records", $this->db->debug);
		if ( !$this->CheckEditParams() ) return false;

		$values = array();
		foreach($this->ef as $key=>$eitem)
		{
			$values[$key]=mysql_real_escape_string($eitem->get_value());
		};
		//$this->db->connect();
		//$this->db->open();
		//$this->db->init_tables_list();
		$this->db->insert_one_record_set($this->table_name, $values);
		//$this->db->close();
		return true;
	}
	
	
	// search functions 
	public function PrintSearchParamsForm()
	{
		$this->sForm->print_form($this->sf, $this->sort_by_field, $this->sort_direction);
	}
	
	
	public function InitSearchParams()
	{
		printInfo("Initialize search parameters", $this->db->debug);
	// echo "<pre>"; print_r($_POST); echo "</pre>";

		foreach ($this->sf as $key => $item)
		{
			$name=$this->sForm->name_key($key);
			$item->checked = isset($_REQUEST[$name]);
			//$item->sort_by=false;
		};
		
		$name = $this->sForm->name_sort_by();
		$this->sort_by_field = ( isset($_REQUEST[$name]) ) ?  $_REQUEST[$name] : $this->def_sort_by_field;

		$name = $this->sForm->name_sort_dir();
		$this->sort_direction = ( isset($_REQUEST[$name]) ) ?  $_REQUEST[$name] : $this->def_sort_dir;
	}
		


	public function SetDefaultSearchValues()
	{
		printInfo("Setting defauls search values", $this->db->debug);
		foreach ($this->sf as $key => $item)
		{
			$item->checked = $item->default_value;
		};
		$this->sort_by_field = $this->def_sort_by_field;
		$this->sort_direction = $this->def_sort_dir;
	}	

	
	public function SearchForRecords()
	{
		printInfo("Look for records", $this->db->debug);
		// count the number of selected fields
		$cnt=0;
		foreach ($this->sf as $item)
		{
			if ($item->checked) $cnt++;
		};
		
		if ($cnt==0) return false;
		
		$query="SELECT {$this->id_field}";
		$prev=true;
		foreach ($this->sf as $key => $item) 
		{
			if (!$item->checked) continue;
			if ($key == $this->id_field) continue;

			if ($prev)	$query = $query . ", ";
			$query = $query . $key;
			$prev=true;
		};
		
		$query = $query . " FROM " . $this->table_name .
		         " ORDER BY " . $this->sort_by_field . " " .
		         ( ($this->sort_direction==SortDir::ASC) ? "ASC" : "DESC" ) .
		         ";";
	
		//echo "$query<br>";
		//$this->db->connect();
		//$this->db->open();
		$res = $this->db->run_query($query);
		if ($res==false) return false;
		echo "<h2>Search results:</h2>";
		if (mysql_num_rows($res)==0) 
		{
			echo "<p>No records found</p>" . PHP_EOL;
		}
		else
		{
			echo "<p>Records found: " . mysql_num_rows($res) ."</p>" . PHP_EOL;
			show_query_results($res, 0, "");
		};
		mysql_free_result($res);
		//$this->db->close();
		return true;
	}	
	
	public function GetListOfFieldValues($fld)
	{
		$query = "SELECT {$fld} FROM {$this->table_name} ORDER BY {$fld} ASC;";
		//echo "$query<br>";
		$res = $this->db->run_query($query);
		if ($res==false) return false;
		$values=array();
		for ($i=0; $i<mysql_num_rows($res); $i++)
		{
			$values[] = mysql_result($res, $i);
		};
		mysql_free_result($res);
		return $values;
	}
	
	
	public function DeleteRecord($fld, $val)
	{
		$query = "DELETE FROM {$this->table_name} WHERE {$fld}='{$val}';";
		//echo "$query<br>";
		$res = $this->db->run_query($query);
		if ($res==false) return false;
		mysql_free_result($res);
		return true;
	}

	public function UpdateRecord($fld, $val)
	{
		printInfo("Updating record with field '{$fld}' = value '{$val}'", $this->db->debug);
		if ( !$this->CheckEditParams() ) return false;
		$query = "UPDATE {$this->table_name} SET ";
		//echo "$query<br>";
		$prev=false;
		foreach($this->ef as $key=>$item)
		{
			if ($prev) $query = $query . ", ";
			//echo "1. $query<br>";
			$query = $query . "{$key}='" . mysql_real_escape_string($item->get_value()) . "'";
			//echo "2. $query<br>";
			$prev=true;
			//echo "3. $query<br>";
		};
		$query = $query . " WHERE {$fld}='{$val}';";
		
		//printQuery($query, true);
		$res = $this->db->run_query($query);
		if ($res==false) return false;
		mysql_free_result($res);
		return true;
	}
	
		
	public function InitEditDataByRecord($fld, $val)
	{
		// get first record
		$query = "SELECT * FROM {$this->table_name} WHERE {$fld}='{$val}';";
		$res = $this->db->run_query($query);
		if ($res==false) return false;
		foreach($this->ef as $key=>$item)
		{
			$qq=mysql_result($res, 0, $key);
			//echo "{$qq}<br>";
			$item->set_value("{$qq}");
		};
		mysql_free_result($res);
		return true;
	}	
	
	
	public function CreateTable(&$fp)
	{
		$table_struc = "";
		$isStarted=false;
		foreach ($fp as $key => $item)
		{
			if ($isStarted) $table_struc = $table_struc.', ';
			$table_struc = $table_struc . $key . " " . $item->fieldType;
			$isStarted=true;
		};
		if (strlen($this->id_field)>0)
		{
			$table_struc = $table_struc . ", PRIMARY KEY ({$this->id_field}), UNIQUE ID ({$this->id_field})";
		};
		
		printInfo($table_struc);
		return $this->db->create_table($this->table_name, $table_struc);		
		
	}	
};
?>
