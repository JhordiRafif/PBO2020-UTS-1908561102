<?php

class Koneksi
{
	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $db   = 'db_campus';

	protected $conn;
	
	function __construct()
	{
		if(!isset($this->conn)) 
		{
			$this->conn = new mysqli($this->host,$this->user,$this->pass,$this->db);
		}

		if(!$this->conn)
		{
			echo 'Proses Gagal';
		}
		else
		{
			echo ' ';
		}
		return $this->conn;
	}
	
}
?>