<?php

class Database
{
	public $servername = "localhost";
	public $user = "root";
	public $pass = "";
	public $data = "quanlycongty";

	public $con;
	public $result;

	public function __construct()
	{
		$this->con= new mysqli($this->servername,$this->user,$this->pass,$this->data);
		if(!$this->con){
			echo "Kết nối thất bại";
			exit();
		}else{
			mysqli_set_charset($this->con,'utf-8');
		}
		return $this->con;
	}

	public function execute($sql)
	{
		$this->result = mysqli_query($this->con, $sql);
		return $this->result;
	}

}
?>
