<?php
class PresenterSirkuit {
private $model;
private $view;


public function __construct($model, $view) {
$this->model = $model;
$this->view = $view;
}


public function tampilkanSirkuit() {
$list = $this->model->getAll();
return $this->view->tampilList($list);
}


public function tampilkanForm($id = null) {
$obj = $id ? $this->model->getById($id) : null;
return $this->view->tampilForm($obj);
}


public function tambahSirkuit($data) {
$this->model->insert($data);
}


public function editSirkuit($data) {
$this->model->update($data);
}


public function hapusSirkuit($id) {
$this->model->delete($id);
}
}
?>