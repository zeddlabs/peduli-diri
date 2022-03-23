<?php
session_start();

if (!isset($_SESSION['nik'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peduli Diri - <?= $title; ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <div class="container">
        <div class="card mb-3 mt-5">
            <div class="row g-0">
                <div class="col-md-2 text-center my-auto">
                    <i class="fa-solid fa-plane-departure" style="font-size: 5rem;"></i>
                </div>
                <div class="col-md-10">
                    <div class="card-body">
                        <h1 class="card-title">Peduli Diri</h1>
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link <?= $title == 'Home' ? 'active' : ''; ?>" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $title == 'Catatan' ? 'active' : ''; ?>" href="catatan.php">Catatan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $title == 'Isi Data' ? 'active' : ''; ?>" href="isi_data.php">Isi Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>