<?php
if (isset($_POST['daftar'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $nik = htmlspecialchars($_POST['nik']);

    $configTxt = file_get_contents('config.txt');
    $rowData = explode("\n", $configTxt);
    array_shift($rowData);
    foreach ($rowData as $row) {
        $col = explode("|", $row);
        if ($col[0] == $nik) {
            echo '<script>alert("NIK sudah ada!");document.location.href = "register.php"</script>';
            exit;
        }
    }

    $fileConfig = fopen('config.txt', 'a');
    $data = "\n$nik|$nama";
    $result = fwrite($fileConfig, $data);
    if ($result) {
        $fileCatatan = fopen('data/' . $nik . '.txt', 'w');
        fwrite($fileCatatan, 'ID|TANGGAL|JAM|LOKASI|SUHU');
        fclose($fileCatatan);
        echo '<script>alert("Register berhasil!");document.location.href = "login.php"</script>';
    } else {
        echo '<script>alert("Register gagal!")</script>';
    }
    fclose($fileConfig);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peduli Diri - Register</title>
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
                    <h2 class="mb-4">Daftar</h2>
                    <form action="" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama" placeholder="" name="nama" required>
                            <label for="nama">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nik" placeholder="" name="nik" required>
                            <label for="nik">NIK</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" name="daftar">Daftar</button>
                    </form>
                    <hr>
                    <a href="login.php" class="">Saya sudah punya akun</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>