<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- MODAL EDIT -->
<?php
$queryProduk = "SELECT * FROM produk";
$resultProduk = mysqli_query($conn, $queryProduk);

if (mysqli_num_rows($resultProduk) > 0) {
    while ($row = mysqli_fetch_object($resultProduk)) {
        ?>
                <div class="modal fade" id="modalEdit<?= $row->id_produk ?>" tabindex="-1" aria-hidden="true">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <input type="number" value="<?= $row->id_produk ?>" name="id_produk" hidden>
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Kategori</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="image" class="form-label d-block">Gambar Produk</label>
                                            <div class="d-flex justify-content-center align-items-center position-relative">
                                                <img id="previewUpdate<?= $row->id_produk ?>" src="img/<?= $row->image ?>"
                                                    alt="previewUpdate" class="rounded-circle" width="125" height="125">
                                                <label for="imageUpdate<?= $row->id_produk ?>"
                                                    class="btn btn-primary bg-gradient-primary position-absolute end-0">
                                                    <i class="bi bi-pencil-fill"></i> Edit
                                                </label>
                                                <input type="file" class="form-control d-none" id="imageUpdate<?= $row->id_produk ?>"
                                                    name="image" onchange="previewUpdateImage('<?= $row->id_produk ?>')">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_produk" class="form-label">Nama Produk</label>
                                            <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                                value="<?= $row->nama_produk ?>" placeholder="Masukkan nama produk.." required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                                            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"
                                                placeholder="Masukkan deskripsi produk.." required><?= $row->deskripsi ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="harga" class="form-label">Harga Produk</label>
                                            <input type="number" class="form-control" id="harga" name="harga" value="<?= $row->harga ?>"
                                                placeholder="Masukkan harga produk.." required min="1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="stok" class="form-label">Stok Produk</label>
                                            <input type="number" class="form-control" id="stok" name="stok" value="<?= $row->stok ?>"
                                                placeholder="Masukkan jumlah stok produk.." required min="1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="kategori" class="form-label">Kategori Produk</label>
                                            <select name="kategori" id="kategori" class="form-control">
                                                <?php
                                                $queryKategori = "SELECT * FROM kategori";
                                                $resultKategori = mysqli_query($conn, $queryKategori);

                                                if (mysqli_num_rows($resultKategori) > 0) {
                                                    while ($rowKategori = mysqli_fetch_object($resultKategori)) {
                                                        if ($rowKategori->id_kategori == $row->id_kategori) {
                                                            echo "<option value='$rowKategori->id_kategori' selected>$rowKategori->nama_kategori</option>";
                                                        } else {
                                                            echo "<option value='$rowKategori->id_kategori'>$rowKategori->nama_kategori</option>";
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary bg-gradient-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" name="edit" class="btn btn-primary bg-gradient-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
    }
}
?>

<script>
    function previewUpdateImage(id) {
        var preview = document.getElementById('previewUpdate' + id);
        var file = document.getElementById('imageUpdate' + id).files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
        }
    }
</script>

<!-- FUNGSI EDIT -->
<?php
if (isset($_POST['edit'])) {
    global $conn;

    $id_produk = $_POST['id_produk'];
    $image = $_FILES['image']['name'];
    $nama_produk = mysqli_real_escape_string($conn, $_POST['nama_produk']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $id_kategori = $_POST['kategori'];

    if ($harga < 1 || $stok < 1) {
        echo "<script>
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Harga dan stok tidak boleh kurang dari 1!',
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

    $queryCheck = "SELECT * FROM produk WHERE nama_produk = '$nama_produk' AND id_produk != $id_produk";
    $resultCheck = mysqli_query($conn, $queryCheck);

    if (mysqli_num_rows($resultCheck) > 0) {
        echo "<script>
        Swal.fire({
            title: 'Gagal!',
            text: 'Produk dengan nama $nama_produk sudah ada!',
            icon: 'error',
            timer: 1500,
            timerProgressBar: true,
            showConfirmButton: false
        }).then(() => {
            window.location.href = 'index.php';
        });
    </script>";
        exit;
    } else {
        $sqlshow = "SELECT * FROM produk WHERE id_produk = $id_produk";
        $sqll = mysqli_query($conn, $sqlshow);
        $rslt = mysqli_fetch_assoc($sqll);

        if ($image != "") {
            unlink("img/" . $rslt['image']);

            move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $image);
        } else {
            $image = $rslt['image'];
        }

        $queryEdit = "UPDATE produk SET image='$image', nama_produk='$nama_produk', deskripsi='$deskripsi', harga='$harga', stok='$stok', id_kategori='$id_kategori' WHERE id_produk='$id_produk'";
        $sqlEdit = mysqli_query($conn, $queryEdit);

        if ($sqlEdit) {
            echo "<script>
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Data Berhasil Diubah!',
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
                    text: 'Data Gagal Diubah!',
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
}
?>