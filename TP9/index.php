<?php

include_once("models/DB.php");
include_once("models/TabelPembalap.php");
include_once("views/ViewPembalap.php");
include_once("presenters/PresenterPembalap.php");

$tabelPembalap = new TabelPembalap('localhost', 'mvp_db', 'root', '');
$viewPembalap = new ViewPembalap();
$presenter = new PresenterPembalap($tabelPembalap, $viewPembalap);

// routing berdasarkan parameter GET dan POST
if (isset($_GET['screen'])) {

    // FORM TAMBAH
    if ($_GET['screen'] === 'add') {
        echo $presenter->tampilkanFormPembalap();
    }

    // FORM EDIT
    else if ($_GET['screen'] === 'edit' && isset($_GET['id'])) {
        echo $presenter->tampilkanFormPembalap($_GET['id']);
    }
}

// handle POST untuk CRUD
else if (isset($_POST['action'])) {

    if ($_POST['action'] === 'add') {

        $presenter->tambahPembalap(
            $_POST['nama'],
            $_POST['tim'],
            $_POST['negara'],
            $_POST['poinMusim'],
            $_POST['jumlahMenang']
        );
    }

    else if ($_POST['action'] === 'edit') {

        $presenter->ubahPembalap(
            $_POST['id'],
            $_POST['nama'],
            $_POST['tim'],
            $_POST['negara'],
            $_POST['poinMusim'],
            $_POST['jumlahMenang']
        );
    }

    else if ($_POST['action'] === 'delete') {

        $presenter->hapusPembalap($_POST['id']);
    }

    header("Location: index.php");
    exit();
}

// tampilkan list pembalap secara default
else {
    echo $presenter->tampilkanPembalap();
}
