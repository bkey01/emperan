<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kasir Pizza Emperan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Kasir Pizza Emperan</h1>

    <form action="simpan_order.php" method="POST">
      <label>Nama Pemesan:
        <input type="text" name="nama" required>
      </label>

      <h2>Menu Pizza</h2>
      <div class="menu-list">
        <?php
          $menu = [
            1 => ["Pizza Keju", 20000],
            2 => ["Pizza Sosis", 25000],
            3 => ["Pizza Daging Sapi", 30000],
            4 => ["Pizza Ayam Pedas", 28000],
            5 => ["Pizza Sayur", 22000],
            6 => ["Pizza Tuna", 27000],
            7 => ["Pizza Jagung Manis", 23000],
          ];
          foreach ($menu as $id => $item) {
            echo "<label><input type='checkbox' name='menu[]' value='$id'> {$item[0]} - Rp " . number_format($item[1], 0, ',', '.') . "</label><br>";
          }
        ?>
      </div>

      <label>Jumlah Tiap Menu:
        <input type="number" name="jumlah" value="1" min="1">
      </label>

      <label>Catatan:
        <textarea name="catatan" rows="2"></textarea>
      </label>

      <label>Tempat Makan:
        <select name="tempat">
          <option value="Makan di Tempat">Makan di Tempat</option>
          <option value="Take Away">Take Away</option>
        </select>
      </label>

      <button type="submit">Proses & Cetak</button>
    </form>

    <div class="menu-link">
      <a href="lihat_orderan.php"><button>Lihat Semua Orderan</button></a>
      <a href="reset_orderan.php" onclick="return confirm('Yakin mau hapus semua orderan?')">
        <button class="danger">Reset Orderan</button>
      </a>
      <button onclick="document.body.classList.toggle('dark')">Toggle Dark Mode</button>
    </div>
  </div>
</body>
</html>