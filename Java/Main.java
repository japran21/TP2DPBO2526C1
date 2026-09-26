import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class Main {
    public static void tampilkanHeaderMenu() {
        System.out.println("\n=========================================");
        System.out.println("               VAPESTORE                ");
        System.out.println("=========================================");
    }

    public static void tampilkanGarisTabel() {
        System.out.println("+------+----------------+--------------+------+--------------+-----------+-------+-----------+----------+------------+");
    }

    public static void tampilkanHeaderTabel() {
        tampilkanGarisTabel();
        System.out.printf("| %-5s| %-15s| %-13s| %-5s| %-13s| %-10s| %-6s| %-10s| %-9s| %-11s |\n",
                "ID", "Nama Produk", "Harga (Rp)", "Stok", "Tipe", "Baterai", "Watt", "Cartridge", "Coil", "Airflow");
        tampilkanGarisTabel();
    }

    public static void tampilkanBarisTabel(PodSystem p) {
        String bufBaterai = p.getKapasitasBaterai() + " mAh";
        String bufWatt = p.getWattMaksimal() + " W";
        String bufCartridge = String.format("%.1f ml", p.getKapasitasCartridge());
        String bufCoil = String.format("%.1f Ohm", p.getResistansiCoil());

        System.out.printf("| %-5s| %-15s| %-13d| %-5d| %-13s| %-10s| %-6s| %-10s| %-9s| %-11s |\n",
                p.getIdProduk(), p.getNamaProduk(), p.getHarga(), p.getStok(),
                p.getTipeDevice(), bufBaterai, bufWatt, bufCartridge, bufCoil, p.getTipeAirflow());
    }

    public static void main(String[] args) {
        List<PodSystem> daftarPod = new ArrayList<>();
        Scanner sc = new Scanner(System.in);
        int pilihan = 0;

        // Data Awal (Dummy Data)
        daftarPod.add(new PodSystem("P01", "Caliburn G3", 320000, 15, "Pod System", 900, 25, 2.5, 0.6, "Adjustable"));
        daftarPod.add(new PodSystem("P02", "XROS 3 Mini", 280000, 20, "Pod System", 1000, 16, 2.0, 0.8, "Fixed MTL"));

        do {
            tampilkanHeaderMenu();
            System.out.println("1. Tampilkan Semua Produk (Tabel)");
            System.out.println("2. Tambah Produk Baru");
            System.out.println("3. Ubah Data Produk");
            System.out.println("4. Hapus Produk");
            System.out.println("5. Keluar");
            System.out.print("Pilih menu [1-5]: ");

            if (!sc.hasNextInt()) {
                sc.nextLine();
                System.out.println("Input tidak valid!");
                continue;
            }
            pilihan = sc.nextInt();
            sc.nextLine();

            if (pilihan == 1) {
                System.out.println("\n==========================================================================================================");
                System.out.println("                                           DAFTAR PRODUK VAPESTORE                                       ");
                System.out.println("==========================================================================================================");
                if (daftarPod.isEmpty()) {
                    System.out.println("Belum ada data produk.");
                } else {
                    tampilkanHeaderTabel();
                    for (PodSystem p : daftarPod) {
                        tampilkanBarisTabel(p);
                    }
                    tampilkanGarisTabel();
                }
            } else if (pilihan == 2) {
                System.out.println("\n--- TAMBAH PRODUK BARU ---");
                System.out.print("Masukkan ID Produk     : ");
                String id = sc.nextLine();
                System.out.print("Masukkan Nama Produk   : ");
                String nama = sc.nextLine();
                System.out.print("Masukkan Harga (Rp)    : ");
                int harga = Integer.parseInt(sc.nextLine());
                System.out.print("Masukkan Jumlah Stok   : ");
                int stok = Integer.parseInt(sc.nextLine());
                System.out.print("Masukkan Tipe Device   : ");
                String tipe = sc.nextLine();
                System.out.print("Masukkan Baterai (mAh) : ");
                int baterai = Integer.parseInt(sc.nextLine());
                System.out.print("Masukkan Watt Maksimal : ");
                int watt = Integer.parseInt(sc.nextLine());
                System.out.print("Masukkan Cartridge(ml) : ");
                double cartridge = Double.parseDouble(sc.nextLine());
                System.out.print("Masukkan Coil (Ohm)    : ");
                double coil = Double.parseDouble(sc.nextLine());
                System.out.print("Masukkan Tipe Airflow  : ");
                String airflow = sc.nextLine();

                daftarPod.add(new PodSystem(id, nama, harga, stok, tipe, baterai, watt, cartridge, coil, airflow));
                System.out.println("\n-> Produk berhasil ditambahkan!");
            } else if (pilihan == 3) {
                System.out.println("\n--- UBAH DATA PRODUK ---");
                System.out.print("Masukkan ID Produk yang ingin diubah: ");
                String targetId = sc.nextLine();

                boolean found = false;
                for (PodSystem p : daftarPod) {
                    if (p.getIdProduk().equals(targetId)) {
                        System.out.print("Masukkan Nama Baru     : ");
                        p.setNamaProduk(sc.nextLine());
                        System.out.print("Masukkan Harga Baru    : ");
                        p.setHarga(Integer.parseInt(sc.nextLine()));
                        System.out.print("Masukkan Stok Baru     : ");
                        p.setStok(Integer.parseInt(sc.nextLine()));
                        System.out.print("Masukkan Tipe Baru     : ");
                        p.setTipeDevice(sc.nextLine());
                        System.out.print("Masukkan Baterai (mAh) : ");
                        p.setKapasitasBaterai(Integer.parseInt(sc.nextLine()));
                        System.out.print("Masukkan Watt Maksimal : ");
                        p.setWattMaksimal(Integer.parseInt(sc.nextLine()));
                        System.out.print("Masukkan Cartridge(ml) : ");
                        p.setKapasitasCartridge(Double.parseDouble(sc.nextLine()));
                        System.out.print("Masukkan Coil (Ohm)    : ");
                        p.setResistansiCoil(Double.parseDouble(sc.nextLine()));
                        System.out.print("Masukkan Airflow Baru  : ");
                        p.setTipeAirflow(sc.nextLine());

                        found = true;
                        System.out.println("\n-> Data produk berhasil diperbarui!");
                        break;
                    }
                }
                if (!found) {
                    System.out.println("\n-> ID Produk tidak ditemukan!");
                }
            } else if (pilihan == 4) {
                System.out.println("\n--- HAPUS PRODUK ---");
                System.out.print("Masukkan ID Produk yang ingin dihapus: ");
                String targetId = sc.nextLine();

                boolean found = daftarPod.removeIf(p -> p.getIdProduk().equals(targetId));
                if (found) {
                    System.out.println("\n-> Produk berhasil dihapus!");
                } else {
                    System.out.println("\n-> ID Produk tidak ditemukan!");
                }
            }
        } while (pilihan != 5);

        System.out.println("\nTerima kasih telah menggunakan sistem VAPESTORE!");
        sc.close();
    }
}