<?php

// constants
class mc
{
	const MANDATORY = true;
	const UNNECESSARY = false;
	const VISIBLE = true;
	const HIDDEN = false;
	const CHECKED = true;
	const UNCHECKED = false;

	const ENABLED = true;
	const DISABLED = false;
}

class SortDir{
	const DESC = 0;
	const ASC = 1;
}

//######################################################################
function html_out_class(&$cl)         { return ( (strlen($cl)>0) ? " class='{$cl}'"    : ""); };
function html_out_aclass(&$cl, &$str) { return ( (strlen($cl)>0) ? "<a class='{$cl}'>{$str}</a>" : $str); };
//######################################################################
abstract class myInputField
{
	public $caption;   // caption
	public $warning;   // warning if the value for field is not correct
	public $visible;   // if the field is visible
	public $enabled;   // if the field is visible
	public $mandatory; // if the field is mandatory
	public $input_html_class;	

	public $type;      // html type of the field: text, radio, checkbox, textarea

	public function __construct($caption, $warning, $input_html_class="", 
	                $mandatory=mc::UNNECESSARY, $visible=mc::VISIBLE,
	                $enabled=mc::ENABLED)
	{
		$this->caption=$caption;
		$this->warning=$warning;
		$this->visible=$visible;
		$this->enabled=$enabled;
		$this->mandatory=$mandatory;
		$this->input_html_class=$input_html_class;
	}

	abstract public function html_out($name);
	abstract public function value_is_correct();
	abstract public function default_value();
	abstract public function set_value($val);
	abstract public function get_value();

	public function set_default_value() { $this->set_value($this->default_value());}
};

//######################################################################
class myInputTextField extends myInputField
{
	public $size;
	private $value;
	public function __construct($caption, $warning, $value="", 
	      $input_html_class="", $size=30, $mandatory=mc::UNNECESSARY,
	      $visible=mc::VISIBLE, $enabled=mc::ENABLED)
	{
		parent::__construct($caption, $warning, $input_html_class,
		                    $mandatory, $visible, $enabled);
		$this->type = "text";
		$this->set_value($value);		
		$this->size = $size;		
	}
	
	public function html_out($name)
	{
		return "<input type='text' name='{$name}' " . 
		       ( ( $this->enabled ) ? "" : "disabled " ) .		
		       "size='{$this->size}' " . 
		       "value=\"{$this->get_value()}\"" . 
		       html_out_class($this->input_html_class) . ">";
	}
	
	public function value_is_correct() { return (strlen($this->get_value())>0) || !$this->mandatory; }
	public function default_value() { return ""; }
	public function set_value($val) {$this->value = $val;}
	public function get_value() {return $this->value;}

};
//######################################################################
class myInputNumField extends myInputTextField
{
	public function default_value() { return 0; }

};
//######################################################################



class myInputTextArea extends myInputField
{
	public $rows;
	public $cols;
	private $value;
	public function __construct($caption, $warning, $value="",
	       $input_html_class="", $rows=10, $cols=50, $mandatory=mc::UNNECESSARY,
	      $visible=mc::VISIBLE, $enabled=mc::ENABLED)
	{
		parent::__construct($caption, $warning, $input_html_class,
		                    $mandatory, $visible, $enabled);
		$this->type = "textarea";
		$this->rows = $rows;
		$this->cols = $cols;
		$this->set_value($value);		
	}
	
	public function html_out($name)
	{
		return "<textarea name='{$name}' " . 
		       ( ( $this->enabled ) ? "" : "disabled " ) .
		       "rows='{$this->rows}' cols='{$this->cols}'" . 
		       html_out_class($this->input_html_class) . ">{$this->get_value()}</textarea>";
	}

	public function default_value() { return ""; }
	public function value_is_correct() { return (strlen($this->get_value())>0) || !$this->mandatory; }
	public function set_value($val) {$this->value = $val;}
	public function get_value() {return $this->value;}
	
};
//######################################################################
/*
class myInputCheckBox extends myInputField
{
	public $checked;
	public $value;
	public function __construct($caption, $warning, $value="",
	       $input_html_class="", $checked=false, $mandatory=false,
	       $visible=true)
	{
		parent::__construct($caption, $warning, $input_html_class,
		                    $mandatory, $visible);
		$this->type = "checkbox";
		$this->checked = $checked;
		$this->value = $value;
				
	}
	
	public function html_out($name)
	{
		return "<input type='checkbox' name='{$name}' " . 
		       ( ($this->checked) ?  "checked " : " " ) . 
		       "value='{$this->value}'" . 
		       html_out_class($this->input_html_class) . ">";
	}

	public function value_is_correct() { return !$this->checked; }
	public function default_value() { return 0; }
	
};
*/
//######################################################################

class myInputSelect extends myInputField
{
	public $values;
	public $default_key;
	public $selected_key;
	public function __construct($caption, $warning, &$values, $default_key,
	       $input_html_class="", $mandatory=mc::UNNECESSARY,
	       $visible=mc::VISIBLE, $enabled=mc::ENABLED)
	{
		parent::__construct($caption, $warning, $input_html_class,
		                    $mandatory, $visible, $enabled);
		$this->type = "select";
		$this->values = $values;
		$this->default_key = $default_key;
		$this->selected_key = $default_key;
				
	}
	
	public function html_out($name)
	{
		$res = PHP_EOL . "<select name='{$name}'" . ( ( $this->enabled ) ? "" : " disabled" ) . ">" . PHP_EOL;
		foreach($this->values as $key=>$item)
		{
			$res = $res . " <option value={$key}" .
			      ( ( $key == $this->selected_key ) ? " selected" : "" ) .
			  ">{$item}</option>" . PHP_EOL;
		};
		$res = $res . "</select>" . PHP_EOL;
		return $res;
	}

	public function value_is_correct() { return true; }
	public function default_value() { return $this->default_key; }
	public function set_value($key)
	{
		if ( array_key_exists($key, $this->values) )
			$this->selected_key = $key;
	}
//	public function get_value() {return $this->values[$this->selected_key];}
	public function get_value() {return $this->selected_key;}
	
};

//######################################################################

//######################################################################


//class fieldEditInfo extends myInputTextField {}

//######################################################################
class dbEditForm{
	public $legend;   // legend
	public $fields_set_name;
	public $mandatory_sign;
	public function __construct($legend="", $fields_set_name="",
	                            $mandatory_sign="*")
	{
		$this->legend = $legend;
		$this->fields_set_name = $fields_set_name;
		$this->mandatory_sign = $mandatory_sign;
	}
	public $useWarnings;
	public function warnings_on() { $this->useWarnings=true; }
	public function warnings_off() { $this->useWarnings=false; }

	private $showAll;
	public function show_all($s) { $this->showAll=$s; }

	public $fieldset_class;
	public $legend_class;
	public $caption_class;
	public $warning_class;
	public function set_classes($fieldset_class, $legend_class,
	                            $caption_class, $warning_class)
	{
		$this->fieldset_class = $fieldset_class;
		$this->legend_class   = $legend_class;
		$this->caption_class  = $caption_class;
		$this->warning_class  = $warning_class;
	}

	public function name_key($key) {return $this->fields_set_name."_".$key;}
	
	public function print_form(&$fieldsInfo)
	{
		echo "<fieldset" . html_out_class($this->fieldset_class) . 
		                                     ">" . PHP_EOL;
		echo "<legend" . html_out_class($this->legend_class) .
		                       ">{$this->legend}</legend>" . PHP_EOL;
		echo "<table border='0'>" . PHP_EOL;
		foreach ( $fieldsInfo as $key => $fi)
		{
			if (!$this->showAll && !$fi->visible) continue; // do not print hidden fields
			
			echo "<tr><td>";
			echo html_out_aclass($this->caption_class, $fi->caption);
			// print mandatory sign if necessary
			if ($fi->mandatory) echo $this->mandatory_sign;
			echo "</td><td>";
			// print text input field
			echo $fi->html_out("{$this->name_key($key)}");
		
		
			if ( $this->useWarnings && $fi->mandatory && !$fi->value_is_correct() )
			{
				echo html_out_aclass($this->warning_class, $fi->warning);
			};
			echo "</td></tr>" . PHP_EOL;
		};
		echo "</table>" . PHP_EOL;
		echo "</fieldset>" . PHP_EOL;
	}
};
//######################################################################


/* This function prints edit form 
 *  $dbef       - class containing information about style of edit form
 *  $fieldsInfo - array of objects of class myInputField containing
 *                information about concrete fields
 */
function printEditForm(dbEditForm &$dbef, &$fieldsInfo)
{
	echo "<fieldset" . html_out_class($dbef->fieldset_class) . 
										 ">" . PHP_EOL;
	echo "<legend" . html_out_class($dbef->legend_class) .
						   ">{$dbef->legend}</legend>" . PHP_EOL;
	echo "<table border='0'>" . PHP_EOL;
	foreach ( $fieldsInfo as $key => $fi)
	{
		echo "<!-- {$key} -->". PHP_EOL;
		if (!$fi->visible) continue; // do not print hidden fields
		
		echo "<tr><td>";
		echo html_out_aclass($dbef->caption_class, $fi->caption);
		// print mandatory sign if necessary
		if ($fi->mandatory) echo $dbef->mandatory_sign;
		echo "</td><td>";
		// print text input field
		echo $fi->html_out("{$dbef->name_key($key)}");
	
	
		if ( $dbef->useWarnings && $fi->mandatory && !$fi->value_is_correct() )
		{
			echo html_out_aclass($dbef->warning_class, $fi->warning);
		};
		echo "</td></tr>" . PHP_EOL;
	};
	echo "</table>" . PHP_EOL;
	echo "</fieldset>" . PHP_EOL;
}





class mySearchField
{
	public $caption;
	public $checked;
	public $sort_by;
	public $default_value;
	
	public function __construct($caption, $checked=false, $sort_by=false)
	{
		$this->caption = $caption;
		$this->checked = $checked;
		$this->sort_by = $sort_by;
		$this->default_value = $checked;
	}
};

//######################################################################
class dbSearchForm{
	public $legend;   // legend
	public $fields_set_name;

	public function __construct($legend="", $fields_set_name="")
	{
		$this->legend = $legend;
		$this->fields_set_name = $fields_set_name;
	}

	public $fieldset_class;
	public $legend_class;
	public $caption_class;
	public function set_classes($fieldset_class, $legend_class, $caption_class)
	{
		$this->fieldset_class = $fieldset_class;
		$this->legend_class   = $legend_class;
		$this->caption_class  = $caption_class;
	}

	public function name_key($key) {return $this->fields_set_name."_".$key;}
	public function name_sort_by() {return $this->fields_set_name."_ord";}
	public function name_sort_dir() {return $this->fields_set_name."_sdir";}
	
	public function print_form(&$fieldsInfo, $sort_by_field, $sort_direction)
	{
		//echo "!!!  " . $sort_by . "  !!!!<br>";
		echo "<fieldset" . html_out_class($this->fieldset_class) . ">" . PHP_EOL;
		echo "<legend" . html_out_class($this->legend_class) . ">{$this->legend}</legend>" . PHP_EOL;

		// select sorting field
		echo "<p>Sort by" . PHP_EOL;
		echo "<select name='{$this->name_sort_by()}'>" . PHP_EOL;
		foreach ( $fieldsInfo as $key => $fi)
		{
			echo " <option value='{$key}'";
			if ($key==$sort_by_field) echo " selected";
			echo ">{$fi->caption}</option>".PHP_EOL;
		};
		echo "</select></p>" . PHP_EOL;
		
		// Direction of sorting
		echo "<p>Direction" . PHP_EOL;
		echo "<select name='{$this->name_sort_dir()}'>" . PHP_EOL;
		
		echo " <option value='" . SortDir::DESC . "'" . 
		     ( ($sort_direction == SortDir::DESC) ? " selected" : "" ) .
		     ">descending</option>".PHP_EOL;
		     
		echo " <option value='" . SortDir::ASC . "'" . 
		     ( ($sort_direction == SortDir::ASC) ? " selected" : "" ) .
		     ">accending</option>".PHP_EOL;
		echo "</select></p>" . PHP_EOL;

		echo "<table border='1'>" . PHP_EOL;
		echo "<th><tr><td>Show</td><td>Field</td></tr></th>". PHP_EOL;
		// print list of fields
		foreach ($fieldsInfo as $key => $fi)
		{
			echo "<tr><td><input type='checkbox'  " .
			     "name='{$this->name_key($key)}'" .
			     ( ($fi->checked) ?  " checked" : " " ) . 
			     "></td><td>{$fi->caption}</td></tr>" . PHP_EOL;		};
		echo "</table>" . PHP_EOL;
		
		echo "</fieldset>" . PHP_EOL;
	}
};




class myFieldParams{
	// edit parameters
	public $eCaption;   // caption in the edit form
	public $eWarning;   // warning message if the value in the field is not correct
	public $eMandatory; // if the field is mandatory to fill in the edit form
	public $eVisible;   // if the field is visible in the edit form
	public $eType;      // the type of the field
	public $eParams;    // the parameters of the field

	public $sCaption;    // caption in the search form
	public $sDefChecked; // if the field is shown in search form by default

	public $fieldType;  //

	public function __construct($eCaption, $fieldType, $eWarning, $eType, $eParams,
	                            $sCaption="", $sDefChecked=mc::UNCHECKED,
	                            $eMandatory=mc::UNNECESSARY, $eVisible=mc::VISIBLE, $eEnabled=mc::ENABLED)
	{
		$this->eCaption    = $eCaption;
		$this->fieldType   = $fieldType;
		$this->eWarning    = $eWarning;
		$this->sCaption    = (strlen($sCaption)==0) ? $eCaption : $sCaption;
		$this->sDefChecked = $sDefChecked;
		$this->eMandatory  = $eMandatory;
		$this->eVisible    = $eVisible;
		$this->eEnabled    = $eEnabled;
		$this->eType       = $eType;
		$this->eParams     = $eParams;
	}
}


?>
