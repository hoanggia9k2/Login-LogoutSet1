<?php 
	
	class Home extends Controller{

		public $home;

		public function __construct(){
			$this->home = $this->model('HomeModel');
			if (!isset($_SESSION['username'])) {
				header('Location: http://websitemvc/admin/index');
			}
		}


		public function index()
		{
			$rows = $this->home->getAllData();
			$this->view('HomeView/list',$rows);
		}

		public function add()
		{
			$this->view('HomeView/add');

			if(isset($_POST['add'])){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$fullname = $_POST['fullname'];
				$gioitinh = $_POST['gioitinh'];
				$ngaysinh = $_POST['ngaysinh'];
				$diachi = $_POST['diachi'];
				$email = $_POST['email'];
				$sdt = $_POST['sdt'];

				if($this->home->addData($fullname,$gioitinh,$ngaysinh,$diachi,$email,$sdt)){
					header('Location: http://websitemvc/home');
				}else{
					echo "Lỗi";
				}
			}
		}

		public function update()
		{
			if (isset($_GET['id']))
			{
				$id = $_GET['id'];
				$rows = $this->home->getData($id);
				$this->view('HomeView/update',$rows);
				if(isset($_POST['update'])){
					$fullname = $_POST['fullname'];
					$gioitinh = $_POST['gioitinh'];
					$ngaysinh = $_POST['ngaysinh'];
					$diachi = $_POST['diachi'];
					$email = $_POST['email'];
					$sdt = $_POST['sdt'];
					if($this->home->updateData($id,$fullname,$gioitinh,$ngaysinh,$diachi,$email,$sdt)){
						header('Location: http://websitemvc/home');
					}else{
						echo "Lỗi";
					}
				}
			}
		}

		public function delete()
		{
			if (isset($_GET['id'])){
				$id = $_GET['id'];
				if($this->home ->deleteData($id)){
					header('Location: http://websitemvc/home');
				}else{
					echo "Lỗi";
				}
			}
		}

		public function errorPost()
		{
			$this->view();
		}

		public function insert()
		{
			if (isset($_GET['id']))
			{
				$id = $_GET['id'];
				$rows = $this->home->getData($id);
				$this->view('HomeView/insert',$rows);
			}
		}

	}

 ?>