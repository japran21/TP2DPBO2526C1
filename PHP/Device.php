<?php
require_once 'Produk.php';

class Device extends Produk {
    protected $tipeDevice;
    protected $kapasitasBaterai; // mAh
    protected $wattMaksimal;     // Watt

    public function __construct($idProduk = "", $namaProduk = "", $harga = 0, $stok = 0,
                                $tipeDevice = "", $kapasitasBaterai = 0, $wattMaksimal = 0) {
        parent::__construct($idProduk, $namaProduk, $harga, $stok);
        $this->tipeDevice = $tipeDevice;
        $this->kapasitasBaterai = (int)$kapasitasBaterai;
        $this->wattMaksimal = (int)$wattMaksimal;
    }

    // Getters & Setters
    public function getTipeDevice() { return $this->tipeDevice; }
    public function setTipeDevice($tipe) { $this->tipeDevice = $tipe; }

    public function getKapasitasBaterai() { return $this->kapasitasBaterai; }
    public function setKapasitasBaterai($baterai) { $this->kapasitasBaterai = (int)$baterai; }

    public function getWattMaksimal() { return $this->wattMaksimal; }
    public function setWattMaksimal($watt) { $this->wattMaksimal = (int)$watt; }

    public function displayInfo() {
        parent::displayInfo();
        echo "Tipe Device  : " . $this->tipeDevice . PHP_EOL;
        echo "Baterai      : " . $this->kapasitasBaterai . " mAh" . PHP_EOL;
        echo "Watt Maksimal: " . $this->wattMaksimal . " W" . PHP_EOL;
    }
}
?>