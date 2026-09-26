from Produk import Produk

class Device(Produk):
    def __init__(self, id_produk="", nama_produk="", harga=0, stok=0,
                 tipe_device="", kapasitas_baterai=0, watt_maksimal=0):
        super().__init__(id_produk, nama_produk, harga, stok)
        self._tipe_device = tipe_device
        self._kapasitas_baterai = int(kapasitas_baterai)
        self._watt_maksimal = int(watt_maksimal)

    # Getters & Setters
    @property
    def tipe_device(self): return self._tipe_device
    @tipe_device.setter
    def tipe_device(self, val): self._tipe_device = val

    @property
    def kapasitas_baterai(self): return self._kapasitas_baterai
    @kapasitas_baterai.setter
    def kapasitas_baterai(self, val): self._kapasitas_baterai = int(val)

    @property
    def watt_maksimal(self): return self._watt_maksimal
    @watt_maksimal.setter
    def watt_maksimal(self, val): self._watt_maksimal = int(val)

    def display_info(self):
        super().display_info()
        print(f"Tipe Device  : {self._tipe_device}")
        print(f"Baterai      : {self._kapasitas_baterai} mAh")
        print(f"Watt Maksimal: {self._watt_maksimal} W")