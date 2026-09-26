#include <iostream>
#include <string>

using namespace std;

class Produk {
protected:
    string idProduk;
    string namaProduk;
    int harga;
    int stok;

public:
    Produk() {
        idProduk = "";
        namaProduk = "";
        harga = 0;
        stok = 0;
    }

    Produk(string id, string nama, int hrg, int stk) {
        idProduk = id;
        namaProduk = nama;
        harga = hrg;
        stok = stk;
    }

    virtual ~Produk() {}

    // Getters
    string getIdProduk() const { return idProduk; }
    string getNamaProduk() const { return namaProduk; }
    int getHarga() const { return harga; }
    int getStok() const { return stok; }

    // Setters
    void setIdProduk(string id) { idProduk = id; }
    void setNamaProduk(string nama) { namaProduk = nama; }
    void setHarga(int hrg) { harga = hrg; }
    void setStok(int stk) { stok = stk; }

    virtual void displayInfo() const {
        cout << "ID Produk    : " << idProduk << endl;
        cout << "Nama Produk  : " << namaProduk << endl;
        cout << "Harga        : Rp " << harga << endl;
        cout << "Stok         : " << stok << " pcs" << endl;
    }
};


