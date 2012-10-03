<?php

require_once("functions.php");

class myTable
{
	public function __construct($name)
	{
		$this->name = $name;
		$this->fields=array();
	}
	// returns name of the table
	public function name() {return $this->name;}
	public function fields_count() {return count($this->fields);}

	public function field_meta($i) { return $this->fields[$i];}
	public function field_blob($i) { return $this->fields[$i]->blob;}
	public function field_max_length($i) {return $this->fields[$i]->max_length; }
	public function field_multiple_key($i) {return $this->fields[$i]->multiple_key; }
	public function field_name($i) {return $this->fields[$i]->name; }
	public function field_not_null($i) {return $this->fields[$i]->not_null; }
	public function field_numeric($i) {return $this->fields[$i]->numeric; }
	public function field_primary_key($i) {return $this->fields[$i]->primary_key; }
	public function field_type($i) { return $this->fields[$i]->type;}
	public function field_unique_key($i) { return $this->fields[$i]->unique_key;}
	public function field_unsigned($i) { return $this->fields[$i]->unsigned;}
	public function field_zerofill($i) { return $this->fields[$i]->zerofill;}

	//==========================

	// clear fields
	public function clear_fields() { $this->fields=array(); }
	
	// adds meta informaton about a field
	public function add_field($meta) { $this->fields[] = $meta; }
	
	
	public function get_field_index($name)
	{
		for ($i=0; $i<$this->fields_count(); $i++)
		{
			if ($this->fields_name($i) == $name) return $i;
		};
		return -1;
	}
//*****************************************
	private $name;    // table name
	private $fields;  // array of meta-information about fields
}


class Database
{
	public $name;
	public $tables;
	public $conData;
	

	public function __construct($name, ConnectionData &$conData)
	{
		$this->name = $name;
		$this->conData = $conData;
		$tables=array();
		$this->debug=true;
	}

	
	public $debug; // show debug information 
	public function debug_off() { $this->debug = false; }
	public function debug_on()  { $this->debug = true; }
	
	
//  functions concerning connections and running queries	
	public function connect() {
		return $this->con=connect_to_server($this->conData, $this->debug);
	}
	
	public function open() {
		return select_database($this->name, $this->con, $this->debug);
	}
	
	public function close() {
		return close_connection($this->con, $this->debug);
	}
		
	public function run_query($query) {
		return run_query($query, $this->con, $successString="Success", $errorString="Error", $this->debug);
	}
//==========================================================================	

	public function create($name)
	{
		create_database($name, $this->con, $this->debug);
		$this->name = $name;
	}
	
	public function drop()
	{
		return drop_database($this->name, $this->con, $this->debug);
	}
	
	
	public function create_table($table_name, $table_struc)
	{
		if (!create_table($table_name, $table_struc, $this->con, $this->debug)) return false;
		$this->tables[$table_name] = new myTable($table_name);
		$this->extract_table_info($table_name, $this->tables[$table_name]);
	}
	
	public function delete_table($name) {
		if (!array_key_exists($name, $this->tables)) return false;
		return delete_table($name, $this->con, $this->debug);
	}
	

	public function lock_table($name)
	{
		printInfo("inserting record !!!!!!!!! ");
		if (!array_key_exists($name, $this->tables))
		{
			printInfo("The table '{$name}' does not exists");
			return false;
		}

		return lock_table($name, $this->con, $this->debug);
	}
	
	public function insert_record($name, &$values)
	{
		printInfo("inserting record !!!!!!!!! ");
		if (!array_key_exists($name, $this->tables))
		{
			printInfo("The table '{$name}' does not exists");
			return false;
		}

		return insert_record($name, $values, $this->con, $this->debug);
	}
	
	public function unlock_tables()
	{
		return unlock_table($this->con, $this->debug);
	}
	
	public function insert_one_record($name, &$values)
	{
		printInfo("inserting record !!!!!!!!! ");
		if (!array_key_exists($name, $this->tables))
		{
			printInfo("The table '{$name}' does not exists");
			return false;
		}
		lock_table($name, $this->con, $this->debug);
		
		insert_record($name, $values, $this->con, $this->debug);
		unlock_table($this->con, $this->debug);
/*
		$this->lock_table($table_index);
		$this->insert_record($name, $values);
		$this->unlock_tables();
*/
		return true;
	}
	
	
	
	public function insert_one_record_set($name, &$values)
	{
		printInfo("inserting record !!!!!!!!! ");
		if (!array_key_exists($name, $this->tables))
		{
			printInfo("The table '{$name}' does not exists");
			return false;
		}
		lock_table($name, $this->con, $this->debug);
		insert_record_set($name, $values, $this->con, $this->debug);
		unlock_table($this->con, $this->debug);
		return true;
	}	
	
//==========================
	// returns the index of the table with given name
	// if the table is not found, returns -1 
/*
	public function get_table_index($name)
	{
		for($i=0; $i<count($this->tables); $i++)
		{
			if ($this->tables[$i]->name()==$name) return $i;
		};
		return -1;
	}
*/

	// saves information about table with name $name to the $table
	public function extract_table_info($name, myTable &$table)
	{
		// extract one record 
		$query = "SELECT * FROM " . mysql_real_escape_string($name) . " LIMIT 0,1; ";
		if (! ($result = $this->run_query($query)) ) return false;
		$table->clear_fields();
		for ($j=0; $j<mysql_num_fields($result); $j++)
		{
			$table->add_field( mysql_fetch_field($result, $j) );
		};
		mysql_free_result($result);
		return true;
	}
	

	public function init_tables_list()
	{
		$query = "SHOW TABLES; ";
		$result = $this->run_query($query);
		if (!$result) return false;
		$this->tables=array(); // clear tables list
		for ($i=0; $i<mysql_num_rows($result); $i++)
		{
			$name=mysql_result($result, $i, 0); //
			$this->tables[$name] = new myTable($name); // create new table
			$this->extract_table_info($name, $this->tables[$name]);
		};
		mysql_free_result($result);
		//$this->print_tables_info();
		return true;
	}

	public function tables_count() {return count($this->tables);}
	
//*************** private functions ****************************
	private $con; // connection object
	
	
	
}







?>
