<?php
class ConnectionData{
	public $host;
	public $user;
	public $password;
	
	public function __construct($h, $u, $p)
	{
		$this->host = $h;
		$this->user = $u;
		$this->password = $p;
	}
	
	public function print_info()
	{
		echo "user: $this->user, password: $this->password<br>"; 
	}
};
?>
