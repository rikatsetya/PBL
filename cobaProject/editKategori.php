<?php
require_once 'crud.php';
$crud = new Crud();



if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $id = $_GET['id'];
    $crud->deleteKategori($id);
    header("Location: adminEdit.php");
}else if (isset($_GET['action']) && $_GET['action'] === 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $kategori = $_POST['kategori'];
    $crud->updateKategori($id,$kategori);
    header("Location: adminEdit.php");
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crud->addKategori($_POST['kategori']);
    header("Location: adminEdit.php");
}
?>