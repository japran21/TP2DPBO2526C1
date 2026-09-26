#include <iostream>
#include <string>
#include <vector>
#include <iomanip>
#include <cstdio>
#include "Cpp/PodSystem.cpp"

using namespace std;

void tampilkanHeaderMenu() {
    cout << "\n=========================================" << endl;
    cout << "               VAPESTROSE                " << endl;
    cout << "=========================================" << endl;
}

void tampilkanGarisTabel() {
    cout << "+------+----------------+--------------+------+--------------+-----------+-------+-----------+----------+------------+" << endl;
}

void tampilkanHeaderTabel() {
    tampilkanGarisTabel();
    cout << "| " << left << setw(5)  << "ID"
         << "| " << left << setw(15) << "Nama Produk"
         << "| " << left << setw(13) << "Harga (Rp)"
         << "| " << left << setw(5)  << "Stok"
         << "| " << left << setw(13) << "Tipe"
         << "| " << left << setw(10) << "Baterai"
         << "| " << left << setw(6)  << "Watt"
         << "| " << left << setw(10) << "Cartridge"
         << "| " << left << setw(9)  << "Coil"
         << "| " << left << setw(11) << "Airflow"
         << " |" << endl;
    tampilkanGarisTabel();
}

void tampilkanBarisTabel(const PodSystem& p) {
    char bufBaterai[20], bufWatt[20], bufCartridge[20], bufCoil[20];
    snprintf(bufBaterai, sizeof(bufBaterai), "%d mAh", p.getKapasitasBaterai());
    snprintf(bufWatt, sizeof(bufWatt), "%d W", p.getWattMaksimal());
    snprintf(bufCartridge, sizeof(bufCartridge), "%.1f ml", p.getKapasitasCartridge());
    snprintf(bufCoil, sizeof(bufCoil), "%.1f Ohm", p.getResistansiCoil());

    cout << "| " << left << setw(5)  << p.getIdProduk()
         << "| " << left << setw(15) << p.getNamaProduk()
         << "| " << left << setw(13) << p.getHarga()
         << "| " << left << setw(5)  << p.getStok()
         << "| " << left << setw(13) << p.getTipeDevice()
         << "| " << left << setw(10) << bufBaterai
         << "| " << left << setw(6)  << bufWatt
         << "| " << left << setw(10) << bufCartridge
         << "| " << left << setw(9)  << bufCoil
         << "| " << left << setw(11) << p.getTipeAirflow()
         << " |" << endl;
}

int main() {
    vector<PodSystem> daftarPod;
    int pilihan = 0;

    // Data Awal (Dummy Data)
    daftarPod.push_back(PodSystem("P01", "Caliburn G3", 320000, 15, "Pod System", 900, 25, 2.5, 0.6, "Adjustable"));
    daftarPod.push_back(PodSystem("P02", "XROS 3 Mini", 280000, 20, "Pod System", 1000, 16, 2.0, 0.8, "Fixed MTL"));

    do {
        tampilkanHeaderMenu();
        cout << "1. Tampilkan Semua Produk (Tabel)" << endl;
        cout << "2. Tambah Produk Baru" << endl;
        cout << "3. Ubah Data Produk" << endl;
        cout << "4. Hapus Produk" << endl;
        cout << "5. Keluar" << endl;
        cout << "Pilih menu [1-5]: ";

        if (!(cin >> pilihan)) {
            cin.clear();
            cin.ignore(10000, '\n');
            cout << "Input tidak valid!" << endl;
            continue;
        }

        if (pilihan == 1) {
            cout << "\n==========================================================================================================" << endl;
            cout << "                                           DAFTAR PRODUK VAPESTROSE                                       " << endl;
            cout << "==========================================================================================================" << endl;
            if (daftarPod.empty()) {
                cout << "Belum ada data produk." << endl;
            } else {
                tampilkanHeaderTabel();
                for (size_t i = 0; i < daftarPod.size(); i++) {
                    tampilkanBarisTabel(daftarPod[i]);
                }
                tampilkanGarisTabel();
            }
        }
        else if (pilihan == 2) {
            string id, nama, tipe, airflow;
            int harga, stok, baterai, watt;
            double cartridge, coil;

            cout << "\n--- TAMBAH PRODUK BARU ---" << endl;
            cout << "Masukkan ID Produk     : ";
            cin >> id;
            cin.ignore();
            cout << "Masukkan Nama Produk   : ";
            getline(cin, nama);
            cout << "Masukkan Harga (Rp)    : ";
            cin >> harga;
            cout << "Masukkan Jumlah Stok   : ";
            cin >> stok;
            cin.ignore();
            cout << "Masukkan Tipe Device   : ";
            getline(cin, tipe);
            cout << "Masukkan Baterai (mAh) : ";
            cin >> baterai;
            cout << "Masukkan Watt Maksimal : ";
            cin >> watt;
            cout << "Masukkan Cartridge(ml) : ";
            cin >> cartridge;
            cout << "Masukkan Coil (Ohm)    : ";
            cin >> coil;
            cin.ignore();
            cout << "Masukkan Tipe Airflow  : ";
            getline(cin, airflow);

            daftarPod.push_back(PodSystem(id, nama, harga, stok, tipe, baterai, watt, cartridge, coil, airflow));
            cout << "\n-> Produk berhasil ditambahkan!" << endl;
        }
        else if (pilihan == 3) {
            string targetId;
            cout << "\n--- UBAH DATA PRODUK ---" << endl;
            cout << "Masukkan ID Produk yang ingin diubah: ";
            cin >> targetId;

            bool found = false;
            for (size_t i = 0; i < daftarPod.size(); i++) {
                if (daftarPod[i].getIdProduk() == targetId) {
                    string nama, tipe, airflow;
                    int harga, stok, baterai, watt;
                    double cartridge, coil;

                    cin.ignore();
                    cout << "Masukkan Nama Baru     : ";
                    getline(cin, nama);
                    cout << "Masukkan Harga Baru    : ";
                    cin >> harga;
                    cout << "Masukkan Stok Baru     : ";
                    cin >> stok;
                    cin.ignore();
                    cout << "Masukkan Tipe Baru     : ";
                    getline(cin, tipe);
                    cout << "Masukkan Baterai (mAh) : ";
                    cin >> baterai;
                    cout << "Masukkan Watt Maksimal : ";
                    cin >> watt;
                    cout << "Masukkan Cartridge(ml) : ";
                    cin >> cartridge;
                    cout << "Masukkan Coil (Ohm)    : ";
                    cin >> coil;
                    cin.ignore();
                    cout << "Masukkan Airflow Baru  : ";
                    getline(cin, airflow);

                    daftarPod[i].setNamaProduk(nama);
                    daftarPod[i].setHarga(harga);
                    daftarPod[i].setStok(stok);
                    daftarPod[i].setTipeDevice(tipe);
                    daftarPod[i].setKapasitasBaterai(baterai);
                    daftarPod[i].setWattMaksimal(watt);
                    daftarPod[i].setKapasitasCartridge(cartridge);
                    daftarPod[i].setResistansiCoil(coil);
                    daftarPod[i].setTipeAirflow(airflow);

                    found = true;
                    cout << "\n-> Data produk berhasil diperbarui!" << endl;
                    break;
                }
            }
            if (!found) {
                cout << "\n-> ID Produk tidak ditemukan!" << endl;
            }
        }
        else if (pilihan == 4) {
            string targetId;
            cout << "\n--- HAPUS PRODUK ---" << endl;
            cout << "Masukkan ID Produk yang ingin dihapus: ";
            cin >> targetId;

            bool found = false;
            for (auto it = daftarPod.begin(); it != daftarPod.end(); ++it) {
                if (it->getIdProduk() == targetId) {
                    daftarPod.erase(it);
                    found = true;
                    cout << "\n-> Produk berhasil dihapus!" << endl;
                    break;
                }
            }
            if (!found) {
                cout << "\n-> ID Produk tidak ditemukan!" << endl;
            }
        }
    } while (pilihan != 5);

    cout << "\nTerima kasih telah menggunakan sistem VAPESTROSE!" << endl;
    return 0;
}