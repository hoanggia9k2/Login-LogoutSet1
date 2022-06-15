<?php 
	
	class Controller {

		public function model($model){
			require "./mvc/models/".$model.".php";
			return new $model;
		}
		public function view($view,$rows=[]){
			require "./mvc/views/".$view.".php";
		}
	}
 ?>