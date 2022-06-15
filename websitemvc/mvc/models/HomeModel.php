<?php

class HomeModel extends Database
{

	public $conn;

	public function __construct()
	{
		$this->conn = new Database();
		return $this->conn;
	}

	public function getAllData()
	{
		$sql = "SELECT * FROM thongtinnhanvien";
		$this->conn->execute($sql);
		$rows = array();
		if($this->conn->result->num_rows>0){
			while ($row = mysqli_fetch_assoc($this->conn->result)) {
				$rows[] = $row;
			}
		}

		return $rows;
	}

	public function addData($fullname,$gioitinh,$ngaysinh,$diachi,$email,$sdt){
		$sql = "INSERT INTO thongtinnhanvien(fullname,gioitinh,ngaysinh,diachi,email,sdt) VALUES ('$fullname','$gioitinh','$ngaysinh','$diachi','$email','$sdt')";
		$this->conn->execute($sql);
		return $this->conn->result;
	}

	public function updateData($id,$fullname,$gioitinh,$ngaysinh,$diachi,$email,$sdt){
		$sql = "UPDATE thongtinnhanvien SET fullname = '$fullname',gioitinh = '$gioitinh',ngaysinh = '$ngaysinh',diachi = '$diachi',email = '$email',sdt='$sdt' WHERE id ='$id'";
		$this->conn->execute($sql);
		return $this->conn->result;
	}

	public function getData($id){
		$sql = "SELECT * FROM thongtinnhanvien WHERE id = $id";
		$this->conn->execute($sql);
		$rows = mysqli_fetch_array($this->conn->result);
		return $rows;
	}

	public function deleteData($id){
		$sql = "DELETE FROM thongtinnhanvien WHERE id = $id";
		$this->conn->execute($sql);
		return $this->conn->result;
	}

}
?>