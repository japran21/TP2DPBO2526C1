from Device import Device

class PodSystem(Device):
    def __init__(self, id_produk="", nama_produk="", harga=0, stok=0,
                 tipe_device="", kapasitas_baterai=0, watt_maksimal=0,
                 kapasitas_cartridge=0.0, resistansi_coil=0.0, tipe_airflow=""):
        super().__init__(id_produk, nama_produk, harga, stok, tipe_device, kapasitas_baterai, watt_maksimal)
        self._kapasitas_cartridge = float(kapasitas_cartridge)
        self._resistansi_coil = float(resistansi_coil)
        self._tipe_airflow = tipe_airflow

    # Getters & Setters
    @property
    def kapasitas_cartridge(self): return self._kapasitas_cartridge
    @kapasitas_cartridge.setter
    def kapasitas_cartridge(self, val): self._kapasitas_cartridge = float(val)

    @property
    def resistansi_coil(self): return self._resistansi_coil
    @resistansi_coil.setter
    def resistansi_coil(self, val): self._resistansi_coil = float(val)

    @property
    def tipe_airflow(self): return self._tipe_airflow
    @tipe_airflow.setter
    def tipe_airflow(self, val): self._tipe_airflow = val

    def display_info(self):
        super().display_info()
        print(f"Cartridge    : {self._kapasitas_cartridge} ml")
        print(f"Coil         : {self._resistansi_coil} Ohm")
        print(f"Airflow      : {self._tipe_airflow}")
