<?php
// ROUTING SIRKUIT

include_once "models/TabelSirkuit.php";
include_once "views/KontrakViewSirkuit.php";   // WAJIB!
include_once "views/ViewSirkuit.php";
include_once "presenters/PresenterSirkuit.php";

// koneksi DB
$tabelSirkuit = new TabelSirkuit('localhost', 'mvp_db', 'root', '');
$viewSirkuit = new ViewSirkuit();
$presenterS = new PresenterSirkuit($tabelSirkuit, $viewSirkuit);


// routing berdasarkan parameter GET dan POST

if (isset($_GET['screen'])) {

    // Form tambah
    if ($_GET['screen'] == 'add_sirkuit') {
        echo $presenterS->tampilkanForm();
        exit();
    }

    // Form edit (prefill)
    else if ($_GET['screen'] == 'edit_sirkuit' && isset($_GET['id'])) {
        echo $presenterS->tampilkanForm($_GET['id']);
        exit();
    }
}


if (isset($_POST['action'])) {

    // CREATE
    if ($_POST['action'] == 'add_sirkuit') {
        $presenterS->tambahSirkuit($_POST);
    }

    // UPDATE
    else if ($_POST['action'] == 'edit_sirkuit') {
        $presenterS->editSirkuit($_POST);
    }

    // DELETE
    else if ($_POST['action'] == 'delete_sirkuit') {
        $presenterS->hapusSirkuit($_POST['id']);
    }

    // Setelah CRUD, kembali ke daftar
    header("Location: sirkuit.php");
    exit();
}


echo $presenterS->tampilkanSirkuit();

?>
