public class Produk {
    protected String idProduk;
    protected String namaProduk;
    protected int harga;
    protected int stok;

    public Produk() {
        this.idProduk = "";
        this.namaProduk = "";
        this.harga = 0;
        this.stok = 0;
    }

    public Produk(String idProduk, String namaProduk, int harga, int stok) {
        this.idProduk = idProduk;
        this.namaProduk = namaProduk;
        this.harga = harga;
        this.stok = stok;
    }

    // Getters & Setters
    public String getIdProduk() { return idProduk; }
    public void setIdProduk(String idProduk) { this.idProduk = idProduk; }

    public String getNamaProduk() { return namaProduk; }
    public void setNamaProduk(String namaProduk) { this.namaProduk = namaProduk; }

    public int getHarga() { return harga; }
    public void setHarga(int harga) { this.harga = harga; }

    public int getStok() { return stok; }
    public void setStok(int stok) { this.stok = stok; }

    public void displayInfo() {
        System.out.println("ID Produk    : " + idProduk);
        System.out.println("Nama Produk  : " + namaProduk);
        System.out.println("Harga        : Rp " + harga);
        System.out.println("Stok         : " + stok + " pcs");
    }
}
