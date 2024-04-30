<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- MODAL EDIT -->
<?php
$queryKategori = "SELECT * FROM kategori";
$resultKategori = mysqli_query($conn, $queryKategori);

if (mysqli_num_rows($resultKategori) > 0) {
    while ($row = mysqli_fetch_object($resultKategori)) {
        ?>
        <div class="modal fade" id="modalEdit<?= $row->id_kategori ?>" tabindex="-1" aria-hidden="true">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <input type="number" value="<?= $row->id_kategori ?>" name="id_kategori" hidden>
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Kategori</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="image" class="form-label d-block">Gambar Produk</label>
                                <div class="d-flex justify-content-center align-items-center position-relative">
                                    <img id="previewUpdate<?= $row->id_kategori ?>" src="img/<?= $row->image ?>"
                                        alt="previewUpdate" class="rounded-circle" width="125" height="125">
                                    <label for="imageUpdate<?= $row->id_kategori ?>"
                                        class="btn btn-primary bg-gradient-primary position-absolute end-0">
                                        <i class="bi bi-pencil-fill"></i> Edit
                                    </label>
                                    <input type="file" class="form-control d-none" id="imageUpdate<?= $row->id_kategori ?>"
                                        name="image" onchange="previewUpdateImage('<?= $row->id_kategori ?>')">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                                    placeholder="Masukkan nama kategori.." value="<?= $row->nama_kategori ?>">
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

    $id_kategori = $_POST['id_kategori'];
    $image = $_FILES['image']['name'];
    $nama_kategori = mysqli_real_escape_string($conn, $_POST['nama_kategori']);

    $queryCheck = "SELECT * FROM kategori WHERE nama_kategori = '$nama_kategori' AND id_kategori != $id_kategori";
    $resultCheck = mysqli_query($conn, $queryCheck);

    if (mysqli_num_rows($resultCheck) > 0) {
        echo "<script>
        Swal.fire({
            title: 'Gagal!',
            text: 'Kategori dengan nama $nama_kategori sudah ada!',
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
        $sqlshow = "SELECT * FROM kategori WHERE id_kategori = $id_kategori";
        $sqll = mysqli_query($conn, $sqlshow);
        $rslt = mysqli_fetch_assoc($sqll);

        if ($image != "") {
            unlink("img/" . $rslt['image']);

            move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $image);
        } else {
            $image = $rslt['image'];
        }

        $queryEdit = "UPDATE kategori SET image='$image', nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'";
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