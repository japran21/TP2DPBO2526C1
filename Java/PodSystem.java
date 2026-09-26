public class PodSystem extends Device {
    private double kapasitasCartridge; // ml
    private double resistansiCoil;     // Ohm
    private String tipeAirflow;        // Adjustable / Fixed

    public PodSystem() {
        super();
        this.kapasitasCartridge = 0.0;
        this.resistansiCoil = 0.0;
        this.tipeAirflow = "";
    }

    public PodSystem(String idProduk, String namaProduk, int harga, int stok, 
                     String tipeDevice, int kapasitasBaterai, int wattMaksimal, 
                     double kapasitasCartridge, double resistansiCoil, String tipeAirflow) {
        super(idProduk, namaProduk, harga, stok, tipeDevice, kapasitasBaterai, wattMaksimal);
        this.kapasitasCartridge = kapasitasCartridge;
        this.resistansiCoil = resistansiCoil;
        this.tipeAirflow = tipeAirflow;
    }

    // Getters & Setters
    public double getKapasitasCartridge() { return kapasitasCartridge; }
    public void setKapasitasCartridge(double kapasitasCartridge) { this.kapasitasCartridge = kapasitasCartridge; }

    public double getResistansiCoil() { return resistansiCoil; }
    public void setResistansiCoil(double resistansiCoil) { this.resistansiCoil = resistansiCoil; }

    public String getTipeAirflow() { return tipeAirflow; }
    public void setTipeAirflow(String tipeAirflow) { this.tipeAirflow = tipeAirflow; }

    @Override
    public void displayInfo() {
        super.displayInfo();
        System.out.println("Cartridge    : " + kapasitasCartridge + " ml");
        System.out.println("Coil         : " + resistansiCoil + " Ohm");
        System.out.println("Airflow      : " + tipeAirflow);
    }
}