<?php
if (isset($_GET['hapus'])) {
    $id_produk = mysqli_real_escape_string($conn, $_GET['hapus']);

    $queryCheckPenjualan = "SELECT * FROM penjualan WHERE id_produk = '$id_produk'";
    $resultCheckPenjualan = mysqli_query($conn, $queryCheckPenjualan);

    if ($resultCheckPenjualan && mysqli_num_rows($resultCheckPenjualan) > 0) {
        echo "<script>
            Swal.fire({
                title: 'Gagal!',
                text: 'Terdapat " . mysqli_num_rows($resultCheckPenjualan) . " penjualan terkait produk ini. Hapus penjualan terlebih dahulu.',
                icon: 'error',
                timer: 1000,
                timerProgressBar: true,
                showConfirmButton: false
            }).then(() => {
                window.location.href = 'index.php';
            });
        </script>";
        exit;
    }

    $queryShowProduk = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
    $sqlShowProduk = mysqli_query($conn, $queryShowProduk);
    $resultProduk = mysqli_fetch_array($sqlShowProduk);

    unlink("img/".$resultProduk['image']);

    if ($resultProduk) {
        $queryDeleteProduk = "DELETE FROM produk WHERE id_produk = '$id_produk'";
        $sqlDeleteProduk = mysqli_query($conn, $queryDeleteProduk);

        if ($sqlDeleteProduk) {
            echo "<script>
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Produk berhasil dihapus!',
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
                    text: 'Gagal menghapus produk!',
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
                text: 'Data Produk Tidak Ditemukan!',
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
    function confirmDelete(id_produk) {
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
                window.location.href = 'index.php?hapus=' + id_produk;
            }
        });
    }
</script>