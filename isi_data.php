<?php
$title = 'Isi Data';
include 'layouts/head.php';
$catatanTxt = file_get_contents('data/' . $_SESSION['nik'] . '.txt');
$catatanRowData = explode("\n", $catatanTxt);
array_shift($catatanRowData);
$idTergede = count($catatanRowData) + 1;

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $lokasi = $_POST['lokasi'];
    $suhu = $_POST['suhu'];

    $catatanFile = fopen('data/' . $_SESSION['nik'] . '.txt', 'a');
    $data = "\n$id|$tanggal|$waktu|$lokasi|$suhu";
    $result = fwrite($catatanFile, $data);
    if ($result) {
        echo '<script>alert("Data berhasil!");document.location.href = "catatan.php"</script>';
    } else {
        echo '<script>alert("Data gagal!")</script>';
    }
    fclose($catatanFile);
}
?>
<div class="card text-center">
    <div class="card-header">
        Isi Data
    </div>
    <div class="card-body">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $idTergede; ?>">
            <div class="row justify-content-center mb-3">
                <div class="col-md-1"><label for="tanggal" class="form-label float-start">Tanggal :</label></div>
                <div class="col-md-4"><input type="date" name="tanggal" id="tanggal" class="form-control" required></div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-md-1"><label for="waktu" class="form-label float-start">Waktu :</label></div>
                <div class="col-md-4"><input type="time" name="waktu" id="waktu" class="form-control" required></div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-md-1"><label for="lokasi" class="form-label float-start">Lokasi :</label></div>
                <div class="col-md-4"><input type="text" name="lokasi" id="lokasi" class="form-control" required></div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-md-1"><label for="suhu" class="form-label float-start">Suhu :</label></div>
                <div class="col-md-4"><input type="number" name="suhu" id="suhu" class="form-control" required></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="float-end">
                        <button type="reset" class="btn btn-secondary">Batal</button>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include 'layouts/footer.php'; ?>