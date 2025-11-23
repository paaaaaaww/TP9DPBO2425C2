# TP9DPBO2425C2


Saya Fauzia Rahma Nisa mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berdasarkan Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

**1. Desain Program**

Program ini menggunakan arsitektur Model–View–Presenter (MVP):
- Model: Bertanggung jawab terhadap data dan operasi database.
- View: Menampilkan data/form ke user, tidak langsung berhubungan dengan database.
- Presenter: Penghubung antara Model dan View, memproses data dari Model dan memberikan ke View.

**Struktur Kelas**
- Pembalap : Model untuk pembalap, atribut sesuai tabel pembalap
- Sirkuit : Model untuk sirkuit, atribut sesuai tabel sirkuit
- TabelPembalap : CRUD ke database untuk pembalap
- TabelSirkuit : CRUD ke database untuk sirkuit
- KontrakView : Interface View untuk pembalap (tampil list & form)
- KontrakViewSirkuit : Interface View untuk sirkuit (tampil list & form)
- ViewPembalap : Implementasi View untuk pembalap
- ViewSirkuit : Implementasi View untuk sirkuit
- PresenterPembalap : Presenter untuk Pembalap (menghubungkan Model dan View)
- PresenterSirkuit : Presenter untuk Sirkuit (menghubungkan Model dan View)

**Tabel dan Atribut**

Tabel Pembalap

- id INT
- nama VARCHAR
- tim VARCHAR
- negara VARCHAR
- poinMusim VARCHAR
- jumlahMenang VARCHAR

Tabel Sirkuit

- id INT
- nama VARCHAR
- lokasi VARCHAR
- panjang FLOAT
- jumlahTikungan INT

**2. Alur Program**

  Program ini mengikuti arsitektur Model–View–Presenter (MVP). Ketika pengguna membuka halaman daftar pembalap atau sirkuit, Presenter akan mengambil data dari Model, lalu mengirimkannya ke View untuk ditampilkan dalam bentuk tabel HTML. Di halaman daftar, setiap baris data dilengkapi tombol Edit, Hapus, dan tombol Tambah di atas atau bawah tabel.

Jika pengguna menekan tombol Tambah, Presenter akan menampilkan form kosong melalui View. Pengguna mengisi form dan menekan tombol Simpan, lalu data dikirim kembali ke Presenter. Presenter kemudian memanggil Model untuk menyimpan data baru ke database. Setelah berhasil, halaman kembali menampilkan daftar data terbaru.

Apabila pengguna menekan tombol Edit pada salah satu data, Presenter mengambil data tersebut dari Model berdasarkan ID, lalu mengirimkannya ke View agar form tampil dengan nilai yang sudah terisi (prefilled). Pengguna bisa mengubah data dan menekan Simpan, sehingga Presenter akan memperbarui data di database melalui Model. Setelah selesai, daftar data terbaru ditampilkan kembali.

Jika pengguna menekan tombol Hapus, Presenter akan menerima ID data yang ingin dihapus, kemudian memanggil Model untuk menghapus data dari database. Halaman daftar akan diperbarui secara otomatis. Dengan cara ini, View tidak berhubungan langsung dengan database; semua operasi CRUD dikelola melalui Presenter dan Model, sehingga arsitektur MVP tetap terjaga.

**3. Dokumentasi**
