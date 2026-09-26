class Produk:
    def __init__(self, id_produk="", nama_produk="", harga=0, stok=0):
        self._id_produk = id_produk
        self._nama_produk = nama_produk
        self._harga = int(harga)
        self._stok = int(stok)

    # Getters & Setters
    @property
    def id_produk(self): return self._id_produk
    @id_produk.setter
    def id_produk(self, val): self._id_produk = val

    @property
    def nama_produk(self): return self._nama_produk
    @nama_produk.setter
    def nama_produk(self, val): self._nama_produk = val

    @property
    def harga(self): return self._harga
    @harga.setter
    def harga(self, val): self._harga = int(val)

    @property
    def stok(self): return self._stok
    @stok.setter
    def stok(self, val): self._stok = int(val)

    def display_info(self):
        print(f"ID Produk    : {self._id_produk}")
        print(f"Nama Produk  : {self._nama_produk}")
        print(f"Harga        : Rp {self._harga}")
        print(f"Stok         : {self._stok} pcs")