from PodSystem import PodSystem

def tampilkan_header_menu():
    print("\n=========================================")
    print("               VAPESTORE                ")
    print("=========================================")

def tampilkan_garis_tabel():
    print("+------+----------------+--------------+------+--------------+-----------+-------+-----------+----------+------------+")

def tampilkan_header_tabel():
    tampilkan_garis_tabel()
    print(f"| {'ID':<5}| {'Nama Produk':<15}| {'Harga (Rp)':<13}| {'Stok':<5}| {'Tipe':<13}| {'Baterai':<10}| {'Watt':<6}| {'Cartridge':<10}| {'Coil':<9}| {'Airflow':<11} |")
    tampilkan_garis_tabel()

def tampilkan_baris_tabel(p: PodSystem):
    buf_baterai = f"{p.kapasitas_baterai} mAh"
    buf_watt = f"{p.watt_maksimal} W"
    buf_cartridge = f"{p.kapasitas_cartridge:.1f} ml"
    buf_coil = f"{p.resistansi_coil:.1f} Ohm"

    print(f"| {p.id_produk:<5}| {p.nama_produk:<15}| {p.harga:<13}| {p.stok:<5}| {p.tipe_device:<13}| {buf_baterai:<10}| {buf_watt:<6}| {buf_cartridge:<10}| {buf_coil:<9}| {p.tipe_airflow:<11} |")

def main():
    # Data Awal
    daftar_pod = [
        PodSystem("P01", "Caliburn G3", 320000, 15, "Pod System", 900, 25, 2.5, 0.6, "Adjustable"),
        PodSystem("P02", "XROS 3 Mini", 280000, 20, "Pod System", 1000, 16, 2.0, 0.8, "Fixed MTL")
    ]

    pilihan = 0
    while pilihan != 5:
        tampilkan_header_menu()
        print("1. Tampilkan Semua Produk (Tabel)")
        print("2. Tambah Produk Baru")
        print("3. Ubah Data Produk")
        print("4. Hapus Produk")
        print("5. Keluar")

        try:
            pilihan = int(input("Pilih menu [1-5]: "))
        except (ValueError, EOFError):
            break

        if pilihan == 1:
            print("\n==========================================================================================================")
            print("                                           DAFTAR PRODUK VAPESTORE                                       ")
            print("==========================================================================================================")
            if not daftar_pod:
                print("Belum ada data produk.")
            else:
                tampilkan_header_tabel()
                for p in daftar_pod:
                    tampilkan_baris_tabel(p)
                tampilkan_garis_tabel()

        elif pilihan == 2:
            print("\n--- TAMBAH PRODUK BARU ---")
            try:
                id_p = input("Masukkan ID Produk     : ")
                nama = input("Masukkan Nama Produk   : ")
                harga = int(input("Masukkan Harga (Rp)    : "))
                stok = int(input("Masukkan Jumlah Stok   : "))
                tipe = input("Masukkan Tipe Device   : ")
                baterai = int(input("Masukkan Baterai (mAh) : "))
                watt = int(input("Masukkan Watt Maksimal : "))
                cartridge = float(input("Masukkan Cartridge(ml) : "))
                coil = float(input("Masukkan Coil (Ohm)    : "))
                airflow = input("Masukkan Tipe Airflow  : ")

                daftar_pod.append(PodSystem(id_p, nama, harga, stok, tipe, baterai, watt, cartridge, coil, airflow))
                print("\n-> Produk berhasil ditambahkan!")
            except (ValueError, EOFError):
                print("Input tidak valid!")

        elif pilihan == 3:
            print("\n--- UBAH DATA PRODUK ---")
            try:
                target_id = input("Masukkan ID Produk yang ingin diubah: ")
                found = False
                for p in daftar_pod:
                    if p.id_produk == target_id:
                        p.nama_produk = input("Masukkan Nama Baru     : ")
                        p.harga = int(input("Masukkan Harga Baru    : "))
                        p.stok = int(input("Masukkan Stok Baru     : "))
                        p.tipe_device = input("Masukkan Tipe Baru     : ")
                        p.kapasitas_baterai = int(input("Masukkan Baterai (mAh) : "))
                        p.watt_maksimal = int(input("Masukkan Watt Maksimal : "))
                        p.kapasitas_cartridge = float(input("Masukkan Cartridge(ml) : "))
                        p.resistansi_coil = float(input("Masukkan Coil (Ohm)    : "))
                        p.tipe_airflow = input("Masukkan Airflow Baru  : ")
                        found = True
                        print("\n-> Data produk berhasil diperbarui!")
                        break
                if not found:
                    print("\n-> ID Produk tidak ditemukan!")
            except (ValueError, EOFError):
                print("Input tidak valid!")

        elif pilihan == 4:
            print("\n--- HAPUS PRODUK ---")
            try:
                target_id = input("Masukkan ID Produk yang ingin dihapus: ")
                awal = len(daftar_pod)
                daftar_pod = [p for p in daftar_pod if p.id_produk != target_id]
                if len(daftar_pod) < awal:
                    print("\n-> Produk berhasil dihapus!")
                else:
                    print("\n-> ID Produk tidak ditemukan!")
            except (ValueError, EOFError):
                print("Input tidak valid!")

    print("\nTerima kasih telah menggunakan sistem VAPESTORE!")

if __name__ == '__main__':
    main()
