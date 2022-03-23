<?php
session_start();
if (isset($_POST['masuk'])) {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];

    $configTxt = file_get_contents('config.txt');
    $rowData = explode("\n", $configTxt);
    array_shift($rowData);
    foreach ($rowData as $row) {
        $col = explode("|", $row);
        if ($col[0] == $nik && $col[1] == $nama) {
            $_SESSION['nik'] = $col[0];
            header('Location: index.php');
        } else {
            echo '<script>alert("Login gagal!")</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peduli Diri - Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- My CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body class="bg-primary">
    <div class="container">
        <div class="row align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="card py-4" style="width: 22rem;">
                <div class="card-body text-center">
                    <h2 class="mb-4">Masuk</h2>
                    <form action="" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama" placeholder="" name="nama" required>
                            <label for="nama">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nik" placeholder="" name="nik" required>
                            <label for="nik">NIK</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" name="masuk">Masuk</button>
                    </form>
                    <hr>
                    <a href="register.php" class="">Saya pengguna baru</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>