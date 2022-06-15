<?php

	class Admin extends Controller{

		public $admin;

		public function __construct()
		{
			$this->admin = $this->model('AdminModel');
		}

		public function index()
		{
			$this->view('AdminView/login');

			if (isset($_SESSION['username'])) {
				header('Location: http://websitemvc/home');
			}

			if (isset($_POST['submit'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];
				$num = $this->admin->login($username,$password);
				if ($num == 1) {
					$_SESSION['username'] = $username;
					header('Location:http://websitemvc/home');
				} else {
					echo "Tài khoản mật khẩu sai";
				}	
			}
		}

		public function logout()
		{
			if (isset($_SESSION['username'])){
				unset($_SESSION['username']);
			}
			header('Location:http://websitemvc/admin/index');
		}
	}
?>