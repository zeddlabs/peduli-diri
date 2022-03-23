<?php
$title = 'Catatan';
include 'layouts/head.php';
$catatanTxt = file_get_contents('data/' . $_SESSION['nik'] . '.txt');
$catatanRowData = explode("\n", $catatanTxt);
array_shift($catatanRowData);
?>
<div class="card">
    <div class="card-header text-center">
        Catatan
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md">
                <select class="form-select mb-3" id="urut" onchange="urutkan(this)">
                    <option selected disabled>Urutkan berdasarkan</option>
                    <option value="0">Tanggal</option>
                    <option value="1">Waktu</option>
                    <option value="2">Lokasi</option>
                    <option value="3">Suhu</option>
                </select>
            </div>
            <div class="col-md">
                <a href="isi_data.php" class="btn btn-primary float-end">Isi Data</a>
            </div>
        </div>
        <table class="table table-bordered" id="catatanTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Suhu Tubuh</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($catatanRowData as $catatan => $data) {
                    $col = explode("|", $data);
                    $ctn[$catatan]['id'] = $col[0];
                    $ctn[$catatan]['tanggal'] = $col[1];
                    $ctn[$catatan]['waktu'] = $col[2];
                    $ctn[$catatan]['lokasi'] = $col[3];
                    $ctn[$catatan]['suhu'] = $col[4];
                ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $ctn[$catatan]['tanggal']; ?></td>
                        <td><?= $ctn[$catatan]['waktu']; ?></td>
                        <td><?= $ctn[$catatan]['lokasi']; ?></td>
                        <td><?= $ctn[$catatan]['suhu']; ?>&deg;C</td>
                    </tr>
                <?php } ?>
                <?php
                if ($catatanRowData == null) {
                    echo '<td colspan="5" class="fw-light fst-italic">Maaf data tidak ada.</td>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'layouts/footer.php'; ?>