<?php
class Produk {
    protected $idProduk;
    protected $namaProduk;
    protected $harga;
    protected $stok;

    public function __construct($idProduk = "", $namaProduk = "", $harga = 0, $stok = 0) {
        $this->idProduk = $idProduk;
        $this->namaProduk = $namaProduk;
        $this->harga = (int)$harga;
        $this->stok = (int)$stok;
    }

    // Getters & Setters
    public function getIdProduk() { return $this->idProduk; }
    public function setIdProduk($id) { $this->idProduk = $id; }

    public function getNamaProduk() { return $this->namaProduk; }
    public function setNamaProduk($nama) { $this->namaProduk = $nama; }

    public function getHarga() { return $this->harga; }
    public function setHarga($harga) { $this->harga = (int)$harga; }

    public function getStok() { return $this->stok; }
    public function setStok($stok) { $this->stok = (int)$stok; }

    public function displayInfo() {
        echo "ID Produk    : " . $this->idProduk . PHP_EOL;
        echo "Nama Produk  : " . $this->namaProduk . PHP_EOL;
        echo "Harga        : Rp " . $this->harga . PHP_EOL;
        echo "Stok         : " . $this->stok . " pcs" . PHP_EOL;
    }
}
?>