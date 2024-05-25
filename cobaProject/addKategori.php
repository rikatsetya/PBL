<?php
require_once 'crud.php';
$crud = new Crud();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crud->addKategori($_POST['kategori']);
    header("Location: adminEdit.php");
}
?>