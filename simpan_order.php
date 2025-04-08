<?php
$menuData = [
  1 => ["Pizza Keju", 20000],
  2 => ["Pizza Sosis", 25000],
  3 => ["Pizza Daging Sapi", 30000],
  4 => ["Pizza Ayam Pedas", 28000],
  5 => ["Pizza Sayur", 22000],
  6 => ["Pizza Tuna", 27000],
  7 => ["Pizza Jagung Manis", 23000],
];

$selectedMenus = $_POST['menu'] ?? [];
$jumlah = intval($_POST['jumlah'] ?? 1);
$catatan = $_POST['catatan'] ?? '';
$tempat = $_POST['tempat'] ?? '';
$nama = $_POST['nama'] ?? 'Tidak diketahui';

// Hitung orderan ke
$file = 'orderan.txt';
$orderKe = 1;
if (file_exists($file)) {
  $isi = file_get_contents($file);
  $orderKe = substr_count($isi, "===== Struk Pesanan") + 1;
}

$total = 0;
$output = "===== Struk Pesanan Pizza Emperan =====\n";
$output .= "Orderan ke: $orderKe\n";
$output .= "Tanggal : " . date("d-m-Y H:i:s") . "\n";
$output .= "Nama    : $nama\n";
$output .= "Tempat  : $tempat\n";
$output .= "Catatan : $catatan\n\n";
$output .= "Pesanan:\n";

foreach ($selectedMenus as $id) {
  $namaMenu = $menuData[$id][0];
  $harga = $menuData[$id][1];
  $subtotal = $harga * $jumlah;
  $total += $subtotal;
  $output .= "- $namaMenu x $jumlah = Rp " . number_format($subtotal, 0, ',', '.') . "\n";
}

$output .= "\nTOTAL: Rp " . number_format($total, 0, ',', '.') . "\n";
$output .= "=======================================\n\n";

file_put_contents($file, $output, FILE_APPEND);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Struk Pesanan</title>
  <link rel="stylesheet" href="style.css">
  <style>
    @media print {
      button, a { display: none; }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Struk Berhasil Dibuat</h2>
    <pre><?= htmlspecialchars($output) ?></pre>
    <button onclick="window.print()">Cetak Struk</button>
    <a href="index.php"><button>Kembali</button></a>
  </div>
</body>
</html>