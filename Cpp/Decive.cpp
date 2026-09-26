
#include "produk.cpp"

class Device : public Produk {
protected:
    string tipeDevice;
    int kapasitasBaterai; // mAh
    int wattMaksimal;     // Watt

public:
    Device() : Produk() {
        tipeDevice = "";
        kapasitasBaterai = 0;
        wattMaksimal = 0;
    }

    Device(string id, string nama, int hrg, int stk, string tipe, int baterai, int watt)
        : Produk(id, nama, hrg, stk) {
        tipeDevice = tipe;
        kapasitasBaterai = baterai;
        wattMaksimal = watt;
    }

    virtual ~Device() {}

    // Getters
    string getTipeDevice() const { return tipeDevice; }
    int getKapasitasBaterai() const { return kapasitasBaterai; }
    int getWattMaksimal() const { return wattMaksimal; }

    // Setters
    void setTipeDevice(string tipe) { tipeDevice = tipe; }
    void setKapasitasBaterai(int baterai) { kapasitasBaterai = baterai; }
    void setWattMaksimal(int watt) { wattMaksimal = watt; }

    void displayInfo() const override {
        Produk::displayInfo();
        cout << "Tipe Device  : " << tipeDevice << endl;
        cout << "Baterai      : " << kapasitasBaterai << " mAh" << endl;
        cout << "Watt Maksimal: " << wattMaksimal << " W" << endl;
    }
};

#endif
