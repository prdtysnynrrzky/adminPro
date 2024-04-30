<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Modal Tambah-->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true">
    <form action="" method="post">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Tambah Penjualan!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <select name="nama_produk" id="nama_produk" class="form-control">
                            <?php
                            $queryProduk = "SELECT * FROM produk";
                            $resultProduk = mysqli_query($conn, $queryProduk);

                            if (mysqli_num_rows($resultProduk) > 0) {
                                while ($row = mysqli_fetch_object($resultProduk)) {
                                    ?>
                                            <option value="<?= $row->id_produk ?>">
                                                <?= $row->nama_produk ?>
                                            </option>
                                    <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_penjualan" class="form-label">Total Penjualan</label>
                        <input type="date" class="form-control" id="tanggal_penjualan" name="tanggal_penjualan">
                        <p class="text-secondary">*jika tidak diisi, otomatis terisi hari ini.</p>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Total Penjualan</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger bg-gradient-danger"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="add" class="btn btn-primary bg-gradient-primary">Tambah</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- FUNGSI TAMBAH -->
<?php
if (isset($_POST['add'])) {
    global $conn;
    $nama_produk = mysqli_real_escape_string($conn, $_POST['nama_produk']);
    $jumlah = mysqli_real_escape_string($conn, $_POST['jumlah']);

    $queryStok = "SELECT stok FROM produk WHERE id_produk = '$nama_produk'";
    $resultStok = mysqli_query($conn, $queryStok);
    $rowStok = mysqli_fetch_assoc($resultStok);
    $stok_produk = $rowStok['stok'];

    if ($jumlah > $stok_produk) {
        echo "<script>
        Swal.fire({
            title: 'Gagal!',
            text: 'Jumlah penjualan melebihi stok produk yang tersedia!',
            icon: 'error',
            timer: 1500,
            timerProgressBar: true,
            showConfirmButton: false
        }).then(() => {
            window.location.href = 'index.php';
        });
    </script>";
        exit;
    }

    $sisa_stok = $stok_produk - $jumlah;
    $queryUpdateStok = "UPDATE produk SET stok = '$sisa_stok' WHERE id_produk = '$nama_produk'";
    $resultUpdateStok = mysqli_query($conn, $queryUpdateStok);

    if (!$resultUpdateStok) {
        echo "<script>
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Gagal mengupdate stok produk!',
                    icon: 'error',
                    timer: 1500,
                    timerProgressBar: true,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = 'index.php';
                });
            </script>";
        exit;
    }

    $queryTambah = "INSERT INTO penjualan (id_produk, jumlah) VALUES ('$nama_produk', '$jumlah')";
    $resultTambah = mysqli_query($conn, $queryTambah);

    if ($resultTambah) {
        echo "<script>
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Data berhasil ditambahkan!',
                    icon: 'success',
                    timer: 1500,
                    timerProgressBar: true,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = 'index.php';
                });
            </script>";
    } else {
        echo "<script>
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Data gagal ditambahkan!',
                    icon: 'error',
                    timer: 1500,
                    timerProgressBar: true,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = 'index.php';
                });
            </script>";
    }
}
?>