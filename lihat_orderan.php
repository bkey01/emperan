<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Lihat Semua Orderan</title>
  <link rel="stylesheet" href="style.css">
  <style>
    pre {
      background: #f1f1f1;
      padding: 1rem;
      white-space: pre-wrap;
    }
    @media print {
      button, a { display: none; }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Riwayat Orderan</h2>
    <pre><?php
      if (file_exists("orderan.txt")) {
        echo htmlspecialchars(file_get_contents("orderan.txt"));
      } else {
        echo "Belum ada orderan.";
      }
    ?></pre>
    <button onclick="window.print()">Cetak Semua</button>
    <a href="index.php"><button>Kembali</button></a>
  </div>
</body>
</html>