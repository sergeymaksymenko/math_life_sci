<?php


class DbObject {
	
	public static $_id;
	public function __construct()
	{
		self::$_id++;
		
		echo "=======". self::$_id.PHP_EOL;
		//~ if (isset(self::$_id))
		//~ {
			//~ self::$_id++;
		//~ }
		//~ else
		//~ {
			//~ self::$_id=1;
		//~ };
	}
	
	public function get_id()
	{
		return self::$_id;
	}
};









?>
