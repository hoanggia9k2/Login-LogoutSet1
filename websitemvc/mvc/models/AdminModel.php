<?php 

	class AdminModel extends database {

		public function login($username,$password)
		{
			$sql="SELECT * FROM dangnhap WHERE username = '$username' AND password = '$password'";
			$this->execute($sql);
			$num = mysqli_num_rows($this->result);
			return $num;
		}
	}

 ?>