<?php
require_once 'crud.php';
$crud = new Crud();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crud->addSoal( $_GET['id'], $_POST['soal']);
    header("Location: adminEdit.php");
}
?>
<!-- <div class="modal fade" id="tambahSoal" tabindex="-1" role="dialog" aria-labelledby="exampleSoalLabel" aria-hidden="true">
        <div class="modal-dialog" role=document>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleSoalLabel">Tambah Data Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="adminEdit.php" method="post">
                        <div class="form-group">
                            <label for="soal">Soal:</label>
                            <textarea name="soal" id="soal" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->