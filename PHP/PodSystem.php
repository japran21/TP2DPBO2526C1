<?php
require_once 'Device.php';

class PodSystem extends Device {
    private $kapasitasCartridge; 
    private $resistansiCoil;     
    private $tipeAirflow;        
    private $fotoProduk;         

    public function __construct($idProduk = "", $namaProduk = "", $harga = 0, $stok = 0,
                                $tipeDevice = "", $kapasitasBaterai = 0, $wattMaksimal = 0,
                                $kapasitasCartridge = 0.0, $resistansiCoil = 0.0, $tipeAirflow = "", $fotoProduk = "") {
        parent::__construct($idProduk, $namaProduk, $harga, $stok, $tipeDevice, $kapasitasBaterai, $wattMaksimal);
        $this->kapasitasCartridge = (float)$kapasitasCartridge;
        $this->resistansiCoil = (float)$resistansiCoil;
        $this->tipeAirflow = $tipeAirflow;
        $this->fotoProduk = $fotoProduk;
    }

    // Getters & Setters
    public function getKapasitasCartridge() { return $this->kapasitasCartridge; }
    public function setKapasitasCartridge($cartridge) { $this->kapasitasCartridge = (float)$cartridge; }

    public function getResistansiCoil() { return $this->resistansiCoil; }
    public function setResistansiCoil($coil) { $this->resistansiCoil = (float)$coil; }

    public function getTipeAirflow() { return $this->tipeAirflow; }
    public function setTipeAirflow($airflow) { $this->tipeAirflow = $airflow; }

    public function getFotoProduk() { return $this->fotoProduk; }
    public function setFotoProduk($foto) { $this->fotoProduk = $foto; }

    public function displayInfo() {
        parent::displayInfo();
        echo "Cartridge    : " . $this->kapasitasCartridge . " ml" . PHP_EOL;
        echo "Coil         : " . $this->resistansiCoil . " Ohm" . PHP_EOL;
        echo "Airflow      : " . $this->tipeAirflow . PHP_EOL;
    }
}
?>