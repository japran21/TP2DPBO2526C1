
#include "Decive.cpp"

class PodSystem : public Device {
private:
    double kapasitasCartridge; 
    double resistansiCoil;     
    string tipeAirflow;        

public:
    PodSystem() : Device() {
        kapasitasCartridge = 0.0;
        resistansiCoil = 0.0;
        tipeAirflow = "";
    }

    PodSystem(string id, string nama, int hrg, int stk, string tipe, int baterai, int watt,
              double cartridge, double coil, string airflow)
        : Device(id, nama, hrg, stk, tipe, baterai, watt) {
        kapasitasCartridge = cartridge;
        resistansiCoil = coil;
        tipeAirflow = airflow;
    }

    // Getters
    double getKapasitasCartridge() const { return kapasitasCartridge; }
    double getResistansiCoil() const { return resistansiCoil; }
    string getTipeAirflow() const { return tipeAirflow; }

    // Setters
    void setKapasitasCartridge(double cartridge) { kapasitasCartridge = cartridge; }
    void setResistansiCoil(double coil) { resistansiCoil = coil; }
    void setTipeAirflow(string airflow) { tipeAirflow = airflow; }

    void displayInfo() const override {
        Device::displayInfo();
        cout << "Cartridge    : " << kapasitasCartridge << " ml" << endl;
        cout << "Coil         : " << resistansiCoil << " Ohm" << endl;
        cout << "Airflow      : " << tipeAirflow << endl;
    }
};

