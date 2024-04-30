<?php
if (isset($_GET['hapus'])) {
    $id_kategori = mysqli_real_escape_string($conn, $_GET['hapus']);

    $queryCheckProduk = "SELECT * FROM produk WHERE id_kategori = '$id_kategori'";
    $resultCheckProduk = mysqli_query($conn, $queryCheckProduk);

    if ($resultCheckProduk && mysqli_num_rows($resultCheckProduk) > 0) {
        $queryDeleteProduk = "DELETE FROM produk WHERE id_kategori = '$id_kategori'";
        $sqlDeleteProduk = mysqli_query($conn, $queryDeleteProduk);
        if (!$sqlDeleteProduk) {
            echo "<script>
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Gagal menghapus produk terkait!',
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
    }

    $queryShowKategori = "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'";
    $sqlShowKategori = mysqli_query($conn, $queryShowKategori);
    $resultKategori = mysqli_fetch_array($sqlShowKategori);

    unlink("img/" . $resultKategori['image']);

    if ($resultKategori) {
        $queryDeleteKategori = "DELETE FROM kategori WHERE id_kategori = '$id_kategori'";
        $sqlDeleteKategori = mysqli_query($conn, $queryDeleteKategori);

        if ($sqlDeleteKategori) {
            echo "<script>
                    Swal.fire({
                        title: 'Sukses!',
                        text: 'Kategori berhasil dihapus!',
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
                        text: 'Gagal menghapus kategori!',
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
                    text: 'Data kategori tidak ditemukan!',
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

<script>
    function confirmDelete(id_kategori) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.php?hapus=' + id_kategori;
            }
        });
    }
</script>