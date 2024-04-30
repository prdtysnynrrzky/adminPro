<!-- MODAL CHART -->
<div class="modal fade" id="cetakChart" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Laporan Chart Penjualan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="mb-3">
                        <label for="hari" class="form-label">Tanggal:</label>
                        <input type="date" class="form-control" id="hari" name="hari" required>
                    </div>
                    <button type="submit" class="btn btn-primary bg-gradient-primary" name="report">Cetak</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- FUNGSI REPORT -->
<?php
ob_start();
require_once('pdf/fpdf.php');

if(isset($_POST['report'])) {
    $hari = $_POST['hari'];
    $hari = htmlspecialchars($hari);

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetTitle("Laporan Penjualan");
    $pdf->setFont("Arial", "B", 14);

    $queryPenjualan = "SELECT * FROM penjualan WHERE tanggal_penjualan=?";
    $stmt = $conn->prepare($queryPenjualan);
    $stmt->bind_param("s", $hari);
    $stmt->execute();
    $resultPenjualan = $stmt->get_result();

    if($resultPenjualan->num_rows > 0) {
        $pdf->Text(10, 6, "Total " . $resultPenjualan->num_rows . " laporan penjualan pada $hari");
        $pdf->Cell(24,10, "ID Penjualan", 1, 0);
        $pdf->Cell(48,10, "ID Produk", 1, 0);
        $pdf->Cell(38,10, "Jumlah", 1, 0);
        $pdf->Cell(38,10, "Tanggal Penjualan", 1, 1);
        while ($row = $resultPenjualan->fetch_assoc()) {
            $pdf->Cell(24,10, $row["id_penjualan"], 1, 0);
            $pdf->Cell(48,10, $row["id_produk"], 1, 0);
            $pdf->Cell(38,10, $row["jumlah"], 1, 0);
            $pdf->Cell(38,10, $row["tanggal_penjualan"], 1, 1);
        }   
    } else {
        $pdf->setFont("Arial", "B", 14);
        $pdf->Cell(38,10, "Tidak ada laporan penjualan untuk tanggal $hari", 0, 1);
    }

    $stmt->close();
    $conn->close();

    $pdf->Output();

    ob_end_flush();
}
?>