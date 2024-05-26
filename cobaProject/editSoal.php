<?php
require_once 'crud.php';
$crud = new Crud();


if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $id = $_GET['id'];
    $crud->deleteSoal($id);
    header("Location: adminEdit.php");
}else if (isset($_GET['action']) && $_GET['action'] === 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $soal = $_POST['soal'];
    $crud->updateSoal($id,$soal);
    header("Location: adminEdit.php");
}else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crud->addSoal( $_GET['id'], $_POST['soal']);
    header("Location: adminEdit.php");
}

?>
