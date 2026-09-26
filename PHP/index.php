<?php
require_once 'PodSystem.php';
session_start();

// Data Awal
if (!isset($_SESSION['daftarPod'])) {
    $_SESSION['daftarPod'] = [
        new PodSystem("P01", "Caliburn G3", 320000, 15, "Pod System", 900, 25, 2.5, 0.6, "Adjustable", "Upload%20gambar/images.jpeg"),
        new PodSystem("P02", "XROS 3 Mini", 280000, 20, "Pod System", 1000, 16, 2.0, 0.8, "Fixed MTL", "Upload%20gambar/images%20(1).jpeg")
    ];
}

$fotoLokalPengganti = [
  "https://via.placeholder.com/70?text=G3" => "Upload%20gambar/images.jpeg",
  "https://via.placeholder.com/70?text=XROS" => "Upload%20gambar/images%20(1).jpeg"
];
foreach ($_SESSION['daftarPod'] as $produk) {
  $fotoLama = $produk->getFotoProduk();
  if (isset($fotoLokalPengganti[$fotoLama])) {
    $produk->setFotoProduk($fotoLokalPengganti[$fotoLama]);
  }
}

$pesan = "";

// Aksi Tambah Produk
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = (int)$_POST['harga'];
    $stok = (int)$_POST['stok'];
    $tipe = $_POST['tipe'];
    $baterai = (int)$_POST['baterai'];
    $watt = (int)$_POST['watt'];
    $cartridge = (float)$_POST['cartridge'];
    $coil = (float)$_POST['coil'];
    $airflow = $_POST['airflow'];
    $foto = !empty($_POST['foto']) ? $_POST['foto'] : "https://via.placeholder.com/70?text=Pod";

    $_SESSION['daftarPod'][] = new PodSystem($id, $nama, $harga, $stok, $tipe, $baterai, $watt, $cartridge, $coil, $airflow, $foto);
    $pesan = "Produk berhasil ditambahkan!";
}

// Aksi Hapus Produk
if (isset($_GET['hapus'])) {
    $targetId = $_GET['hapus'];
    foreach ($_SESSION['daftarPod'] as $key => $item) {
        if ($item->getIdProduk() === $targetId) {
            unset($_SESSION['daftarPod'][$key]);
            $_SESSION['daftarPod'] = array_values($_SESSION['daftarPod']);
            $pesan = "Produk berhasil dihapus!";
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>VAPESTROSE - Sistem Manajemen Produk</title>
  <style>
  :root {
    color-scheme: light;
    --ink: #172b35;
    --muted: #687a80;
    --line: #e2e9e7;
    --paper: #ffffff;
    --canvas: #f3f6f3;
    --green: #176b52;
    --green-dark: #10513e;
    --lime: #d5f06b;
    --red: #b43e35;
  }

  * { box-sizing: border-box; }

  body {
    margin: 0;
    color: var(--ink);
    background: var(--canvas);
    font-family: "Segoe UI", Tahoma, sans-serif;
  }

  .page-shell { max-width: 1440px; margin: 0 auto; padding: 36px 5vw 64px; }

  .masthead {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 24px;
    padding: 28px 32px;
    color: white;
    background: var(--green-dark);
    border-radius: 8px;
    position: relative;
    overflow: hidden;
  }

  .masthead::after {
    content: "";
    position: absolute;
    width: 240px;
    height: 240px;
    right: 8%;
    top: -170px;
    border: 1px solid rgba(213, 240, 107, .35);
    border-radius: 50%;
    box-shadow: 0 0 0 24px rgba(213, 240, 107, .05), 0 0 0 48px rgba(213, 240, 107, .04);
    pointer-events: none;
  }

  .eyebrow, .section-kicker {
    margin: 0 0 8px;
    color: var(--lime);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.4px;
    text-transform: uppercase;
  }

  h1 { margin: 0; font-size: 30px; line-height: 1.15; }
  .masthead-copy { margin: 9px 0 0; color: #d2e2dc; font-size: 14px; }

  .alert {
    margin: 18px 0 0;
    padding: 13px 16px;
    color: #16563e;
    background: #e3f4e9;
    border-left: 4px solid #3a9b66;
    border-radius: 4px;
    font-size: 14px;
  }

  .stats { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; margin: 22px 0 30px; }
  .stat { padding: 16px 19px; background: var(--paper); border: 1px solid var(--line); border-radius: 6px; }
  .stat-label { display: block; margin-bottom: 7px; color: var(--muted); font-size: 12px; font-weight: 650; }
  .stat-value { font-size: 22px; font-weight: 750; letter-spacing: 0; }

  .section-heading { display: flex; align-items: end; justify-content: space-between; gap: 16px; margin: 0 0 14px; }
  .section-kicker { color: var(--green); margin-bottom: 5px; }
  h2 { margin: 0; font-size: 21px; }
  .section-note { color: var(--muted); font-size: 13px; }
  .table-wrap { overflow-x: auto; background: var(--paper); border: 1px solid var(--line); border-radius: 6px; }

  table { width: 100%; min-width: 1050px; border-collapse: collapse; text-align: left; }
  th, td { padding: 13px 12px; border-bottom: 1px solid #edf1ef; white-space: nowrap; }
  th { color: #61736f; background: #f7f9f7; font-size: 10px; font-weight: 800; letter-spacing: .7px; text-transform: uppercase; }
  td { font-size: 13px; }
  tbody tr:last-child td { border-bottom: 0; }
  tbody tr:hover { background: #f8fbf7; }
  .product-photo { display: block; width: 48px; height: 48px; padding: 3px; object-fit: cover; background: white; border: 1px solid var(--line); border-radius: 5px; }
  .product-name { color: var(--ink); font-weight: 700; }
  .product-id { color: var(--muted); font-variant-numeric: tabular-nums; }
  .price { font-weight: 700; font-variant-numeric: tabular-nums; }
  .stock { display: inline-block; padding: 5px 8px; color: #236346; background: #e7f3e9; border-radius: 3px; font-size: 11px; font-weight: 750; }
  .btn-hapus { color: var(--red); font-size: 12px; font-weight: 700; text-decoration: none; }
  .btn-hapus:hover { text-decoration: underline; }
  .empty-state { padding: 30px; color: var(--muted); text-align: center; }

  .form-box { margin-top: 30px; padding: 24px; background: var(--paper); border: 1px solid var(--line); border-radius: 6px; }
  .form-box .section-heading { margin-bottom: 20px; }
  form { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 15px 18px; }
  .form-group { min-width: 0; }
  label { display: block; margin-bottom: 7px; color: #40544e; font-size: 12px; font-weight: 700; }
  input[type="text"], input[type="number"], select {
    width: 100%;
    min-height: 42px;
    padding: 9px 11px;
    color: var(--ink);
    background: #fbfcfb;
    border: 1px solid #d6e0db;
    border-radius: 4px;
    font: inherit;
    font-size: 13px;
  }
  input:focus, select:focus { outline: 2px solid rgba(23, 107, 82, .2); border-color: var(--green); }
  .form-actions { grid-column: 1 / -1; display: flex; justify-content: flex-end; padding-top: 3px; }
  button { min-height: 42px; padding: 0 18px; color: white; background: var(--green); border: 0; border-radius: 4px; cursor: pointer; font-size: 13px; font-weight: 750; }
  button:hover { background: var(--green-dark); }

  @media (max-width: 760px) {
    .page-shell { padding: 18px 14px 40px; }
    .masthead { align-items: flex-start; flex-direction: column; padding: 23px 21px; }
    .masthead::after { right: -130px; }
    .stats { grid-template-columns: 1fr; gap: 9px; margin: 15px 0 25px; }
    .stat { padding: 13px 16px; }
    .stat-value { font-size: 19px; }
    .section-heading { align-items: flex-start; flex-direction: column; gap: 5px; }
    form { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .form-box { padding: 19px 15px; }
  }

  @media (max-width: 460px) {
    form { grid-template-columns: 1fr; gap: 13px; }
    .form-actions { justify-content: stretch; }
    button { width: 100%; }
  }
  </style>
</head>

<body>
<main class="page-shell">
  <header class="masthead">
    <div>
      <p class="eyebrow">Panel inventaris</p>
      <h1>VAPESTROSE</h1>
      <p class="masthead-copy">Kelola katalog dan stok produk dalam satu tempat.</p>
    </div>
  </header>
  <?php if ($pesan): ?>
  <div class="alert"><?= htmlspecialchars($pesan) ?></div>
  <?php endif; ?>

  <section class="stats" aria-label="Ringkasan inventaris">
    <div class="stat"><span class="stat-label">Total produk</span><strong class="stat-value"><?= count($_SESSION['daftarPod']) ?></strong></div>
    <div class="stat"><span class="stat-label">Total unit tersedia</span><strong class="stat-value"><?= array_sum(array_map(fn($produk) => $produk->getStok(), $_SESSION['daftarPod'])) ?></strong></div>
  </section>

  <section aria-labelledby="daftar-produk">
    <div class="section-heading">
      <div><p class="section-kicker">Katalog</p><h2 id="daftar-produk">Daftar Produk</h2></div>
      <span class="section-note">Informasi spesifikasi dan ketersediaan</span>
    </div>
    <div class="table-wrap">
  <table>
    <thead>
      <tr>
        <th>Foto</th>
        <th>ID</th>
        <th>Nama Produk</th>
        <th>Harga (Rp)</th>
        <th>Stok</th>
        <th>Tipe</th>
        <th>Baterai</th>
        <th>Watt</th>
        <th>Cartridge</th>
        <th>Coil</th>
        <th>Airflow</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($_SESSION['daftarPod'])): ?>
      <tr>
        <td class="empty-state" colspan="12">Belum ada data produk.</td>
      </tr>
      <?php else: ?>
      <?php foreach ($_SESSION['daftarPod'] as $p): ?>
      <tr>
        <td><img class="product-photo" src="<?= htmlspecialchars($p->getFotoProduk()) ?>" width="55" height="55" alt="Foto <?= htmlspecialchars($p->getNamaProduk()) ?>"></td>
        <td class="product-id"><?= htmlspecialchars($p->getIdProduk()) ?></td>
        <td class="product-name"><?= htmlspecialchars($p->getNamaProduk()) ?></td>
        <td class="price">Rp <?= number_format($p->getHarga(), 0, ',', '.') ?></td>
        <td><span class="stock"><?= htmlspecialchars($p->getStok()) ?> pcs</span></td>
        <td><?= htmlspecialchars($p->getTipeDevice()) ?></td>
        <td><?= htmlspecialchars($p->getKapasitasBaterai()) ?> mAh</td>
        <td><?= htmlspecialchars($p->getWattMaksimal()) ?> W</td>
        <td><?= number_format($p->getKapasitasCartridge(), 1) ?> ml</td>
        <td><?= number_format($p->getResistansiCoil(), 1) ?> Ohm</td>
        <td><?= htmlspecialchars($p->getTipeAirflow()) ?></td>
        <td><a class="btn-hapus" href="index.php?hapus=<?= urlencode($p->getIdProduk()) ?>"
            onclick="return confirm('Hapus data ini?')">Hapus</a></td>
      </tr>
      <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
    </div>
  </section>

  <section class="form-box" aria-labelledby="tambah-produk">
    <div class="section-heading">
      <div><p class="section-kicker">Input katalog</p><h2 id="tambah-produk">Tambah Produk Baru</h2></div>
      <span class="section-note">Lengkapi spesifikasi produk di bawah.</span>
    </div>
    <form method="POST">
      <div class="form-group"><label>ID Produk:</label><input type="text" name="id" required></div>
      <div class="form-group"><label>Nama Produk:</label><input type="text" name="nama" required></div>
      <div class="form-group"><label>Harga (Rp):</label><input type="number" name="harga" required></div>
      <div class="form-group"><label>Jumlah Stok:</label><input type="number" name="stok" required></div>
      <div class="form-group"><label>Tipe Device:</label><input type="text" name="tipe" required></div>
      <div class="form-group"><label>Baterai (mAh):</label><input type="number" name="baterai" required></div>
      <div class="form-group"><label>Watt Maksimal:</label><input type="number" name="watt" required></div>
      <div class="form-group"><label>Cartridge (ml):</label><input type="text" name="cartridge" required></div>
      <div class="form-group"><label>Coil (Ohm):</label><input type="text" name="coil" required></div>
      <div class="form-group"><label>Tipe Airflow:</label><input type="text" name="airflow" required></div>
      <div class="form-group">
        <label for="foto">Foto Produk:</label>
        <select id="foto" name="foto" required>
          <option value="Upload%20gambar/images.jpeg">Caliburn G3 (biru)</option>
          <option value="Upload%20gambar/images%20(1).jpeg">Pod ungu</option>
          <option value="Upload%20gambar/NIXX-Plus-Bundl-Pink-1768922752874.jpg">NIXX Plus (pink)</option>
        </select>
      </div>
      <div class="form-actions"><button type="submit" name="tambah">Tambah Produk</button></div>
    </form>
  </section>
</main>

</body>

</html>