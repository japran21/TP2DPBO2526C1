# TP2DPBO2526C1

Saya Muhammad Ilal Zhafran dengan NIM 2502623 mengerjakan Tugas Praktikum 2 pada Mata Kuliah Desain dan Pemrograman Berorientasi Objek (DPBO) untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

Struktur FILE : <img width="731" height="822" alt="image" src="https://github.com/user-attachments/assets/c9874d16-86af-427c-8f36-26379089479c" />


Desain dan Alur
<img width="477" height="695" alt="image" src="https://github.com/user-attachments/assets/14bfb373-e5c8-4466-822a-445da8a1402e" /> 

Konsep Utama: Pewarisan Bertingkat (Multilevel Inheritance)
Struktur kelas membentuk rantai turunan tiga tingkat: Produk ~> Devive ~> PodSystem
Kelas Induk Utama ( Base Class): Produk ~> id_produk, Nama__produk, dan Harga
Kelas Perantara (Intermediate Class): DeviceMewarisi sifat dasar dari Produk. Menambahkan atribut spesifik perangkat keras elektronik: Tiper_Device, Kapasitas_Baterai, dan Output_Watt 
Kelas Turunan Terbawah (Subclass): PodSystemMewarisi seluruh atribut dari Device sekaligus atribut dari Produk (secara transitif). Menambahkan spesifikasi teknis khusus kategori pod: Kapasitas_Catridge, Resistansi_Coil, dan Foto-Produk.
Konsep Pendukung: Enkapsulasi (Encapsulation) Setiap kelas menjaga integritas datanya menggunakan hak akses:Visibility Private (-): Seluruh atribut disimpan secara privat agar tidak dapat diubah langsung dari luar kelas. Visibility Public (+): Akses data dilakukan melalui method pengakses resmi berupa Setter() (mengubah nilai) dan Getter() (membaca nilai)

Karena menganut multilevel inheritance, satu objek dari kelas PodSystem otomatis memiliki gabungan seluruh atribut dari rantai induknya:
Dari Produk: id_produk, Nama__produk, Harga   
Dari Device: Tiper_Device, Kapasitas_Baterai, Output_Watt   
Dari PodSystem: Kapasitas_Catridge, Resistansi_Coil, Foto-Produk

Documentasi


PYTHONE, JAVA, CPP
<img width="637" height="856" alt="image" src="https://github.com/user-attachments/assets/5b82c647-7b92-478f-b05b-9c78e71ed21d" />



WEB
<img width="1507" height="848" alt="image" src="https://github.com/user-attachments/assets/1c931716-2b7a-4244-8069-9dd3044589b8" />
<img width="1424" height="558" alt="image" src="https://github.com/user-attachments/assets/ffe3b1bb-0637-4641-b9f3-881a95db712a" />


