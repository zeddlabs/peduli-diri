<?php
$title = 'Home';
include 'layouts/head.php';
$configTxt = file_get_contents('config.txt');
$rowData = explode("\n", $configTxt);
array_shift($rowData);
foreach ($rowData as $row) {
    $col = explode("|", $row);
    if ($col[0] == $_SESSION['nik']) {
        $user = [
            'nik' => $col[0],
            'nama' => $col[1]
        ];
    }
}
?>
<div class="card text-center">
    <div class="card-header">
        Home
    </div>
    <div class="card-body">
        <h5 class="card-title">Hai, <?= $user['nama']; ?></h5>
        <p class="card-text">Selamat datang di aplikasi catatan perjalanan Peduli Diri, catat setiap perjalanan yang anda lakukan untuk membantu tracking penyebaran COVID-19.</p>
        <a href="catatan.php" class="btn btn-primary">Lihat Catatan</a>
    </div>
</div>
<?php include 'layouts/footer.php'; ?>