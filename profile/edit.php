<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- MODAL EDIT -->
<?php
$queryUser = "SELECT * FROM admin";
$resultUser = mysqli_query($conn, $queryUser);

if (mysqli_num_rows($resultUser) > 0) {
    while ($row = mysqli_fetch_object($resultUser)) {
        ?>
        <div class="modal fade" id="modalEdit<?= $row->id_admin ?>" tabindex="-1" aria-hidden="true">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <input type="number" value="<?= $row->id_admin ?>" name="id_admin" hidden>
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="image" class="form-label d-block">Profile Picture</label>
                                <div class="d-flex justify-content-center align-items-center position-relative">
                                    <img id="previewUpdate<?= $row->id_admin ?>" src="img/<?= $row->image ?>"
                                        alt="previewUpdate" class="rounded-circle" width="125"
                                            height="125">
                                    <label for="imageUpdate<?= $row->id_admin ?>"
                                        class="btn btn-primary position-absolute bottom-0 end-0 mb-2 me-2">
                                        <i class="bi bi-pencil-fill"></i> Edit
                                    </label>
                                    <input type="file" class="form-control d-none" id="imageUpdate<?= $row->id_admin ?>"
                                        name="image" onchange="previewUpdateImage('<?= $row->id_admin ?>')">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control text-black" id="username" name="username" placeholder="Username"
                                    value="<?= $row->username ?>">
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

    $id_admin = $_POST['id_admin'];
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $image = $_FILES['image']['name'];

    $queryCheck = "SELECT * FROM admin WHERE username = '$username' AND id_admin != $id_admin";
    $resultCheck = mysqli_query($conn, $queryCheck);

    if (mysqli_num_rows($resultCheck) > 0) {
        echo "<script>
            Swal.fire({
                title: 'Gagal!',
                text: 'Kategori Dengan Nama '.$username.' Sudah Ada!',
                icon: 'error',
                timer: 1500,
                timerProgressBar: true,
                showConfirmButton: false
            }).then(() => {
                window.location.href = 'index.php';
            });
        </script>";
    } else {
        $sqlshow = "SELECT * FROM admin WHERE id_admin = $id_admin";
        $sqll = mysqli_query($conn, $sqlshow);
        $rslt = mysqli_fetch_assoc($sqll);

        if ($image != "") {
            unlink("img/" . $rslt['image']);

            move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $image);
        } else {
            $image = $rslt['image'];
        }

        $queryEdit = "UPDATE admin SET image='$image', username='$username' WHERE id_admin='$id_admin'";
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