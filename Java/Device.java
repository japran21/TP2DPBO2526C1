public class Device extends Produk {
    protected String tipeDevice;
    protected int kapasitasBaterai;
    protected int wattMaksimal;

    public Device() {
        super();
        this.tipeDevice = "";
        this.kapasitasBaterai = 0;
        this.wattMaksimal = 0;
    }

    public Device(String idProduk, String namaProduk, int harga, int stok,
                  String tipeDevice, int kapasitasBaterai, int wattMaksimal) {
        super(idProduk, namaProduk, harga, stok);
        this.tipeDevice = tipeDevice;
        this.kapasitasBaterai = kapasitasBaterai;
        this.wattMaksimal = wattMaksimal;
    }

    // Getters & Setters
    public String getTipeDevice() { return tipeDevice; }
    public void setTipeDevice(String tipeDevice) { this.tipeDevice = tipeDevice; }

    public int getKapasitasBaterai() { return kapasitasBaterai; }
    public void setKapasitasBaterai(int kapasitasBaterai) { this.kapasitasBaterai = kapasitasBaterai; }

    public int getWattMaksimal() { return wattMaksimal; }
    public void setWattMaksimal(int wattMaksimal) { this.wattMaksimal = wattMaksimal; }

    @Override
    public void displayInfo() {
        super.displayInfo();
        System.out.println("Tipe Device  : " + tipeDevice);
        System.out.println("Baterai      : " + kapasitasBaterai + " mAh");
        System.out.println("Watt Maksimal: " + wattMaksimal + " W");
    }
}