<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Modal Tambah-->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Tambah Kategori!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="image" class="form-label d-block">Gambar Kategori</label>
                        <div class="d-flex justify-content-center align-items-center position-relative">
                            <img id="previewAdd" src="#" alt="PreviewAdd" class="rounded-circle" style="display: none;"
                                width="125" height="125">
                            <label for="imageAdd" class="btn btn-primary bg-gradient-primary position-absolute end-0">
                                <i class="bi bi-pencil-fill"></i> Upload
                            </label>
                            <input type="file" class="form-control d-none" id="imageAdd" name="image"
                                onchange="previewAddImage()" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                            placeholder="masukan nama Kategori.." required>
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

<script>
    function previewAddImage() {
        var preview = document.getElementById('previewAdd');
        var file = document.getElementById('imageAdd').files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }
</script>

<!-- FUNGSI TAMBAH -->
<?php
if (isset($_POST['add'])) {
    global $conn;

    $nama_kategori = mysqli_real_escape_string($conn, $_POST['nama_kategori']);
    $image = $_FILES['image']['name'];

    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $dir = 'img/';
        $targetFile = $dir . basename($image);

        $uniqueFilename = uniqid() . '_' . $image;
        $targetFileUnique = $dir . $uniqueFilename;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFileUnique)) {
            $queryCheck = "SELECT * FROM kategori WHERE nama_kategori = '$nama_kategori'";
            $resultCheck = mysqli_query($conn, $queryCheck);

            if (mysqli_num_rows($resultCheck) > 0) {
                unlink($targetFileUnique);
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
            } else {
                $queryAdd = "INSERT INTO kategori (image, nama_kategori) 
                             VALUES ('$uniqueFilename','$nama_kategori')";
                $sqlAdd = mysqli_query($conn, $queryAdd);

                if ($sqlAdd) {
                    echo "<script>
                        Swal.fire({
                            title: 'Sukses!',
                            text: 'Data Berhasil Ditambahkan!',
                            icon: 'success',
                            timer: 1500,
                            timerProgressBar: true,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = 'index.php';
                        });
                    </script>";
                } else {
                    unlink($targetFileUnique);
                    echo "<script>
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Data Gagal Ditambahkan!',
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
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Gagal mengunggah file.',
                    icon: 'error',
                    timer: 1500,
                    timerProgressBar: true,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = 'index.php';
                });
            </script>";
        }
    } else {
        echo "<script>
            Swal.fire({
                title: 'Gagal!',
                text: 'Error Saat Mengunggah File!',
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