<?php
require_once("Models/category.php");
class CategoryController
{
	var $cate_model;
	function __construct()
	{
		$this->cate_model = new Category();
	}

	public function list()
	{
		$data = array();
		$data = $this->cate_model->All();
		require_once('views/category/list.php');
	}

	public function add()
	{
		require_once('views/category/add.php');
	}
	public function store()
	{
		$data = array(
			'title' => $_POST['title'],
			'descripition' => $_POST['descripition']
		);

		$this->cate_model->store($data);
	}
	public function detail()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : 5;
		$data = $this->cate_model->find($id);
		require_once('views/category/detail.php');
	}
	public function delete()
	{
		if (isset($_GET['id'])) {
			$this->cate_model->delete($_GET['id']);
		}
	}
	public function edit()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : 5;
		$data = $this->cate_model->find($id);
		require_once('views/category/edit.php');
	}
	public function update()
	{
		$data = array(
			'id' => $_POST['id'],
			'title' => $_POST['title'],
			'descripition' => $_POST['descripition']
		);
		$this->cate_model->update($data);
	}
}
