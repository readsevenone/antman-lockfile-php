## AntMan Lock File
AntMan Lock File - Enkripsi File menggunakan AES

AntMan Lock File adalah sebuah repository yang berisi sebuah library atau helper untuk melakukan enkripsi file menggunakan algoritma Advanced Encryption Standard (AES). Repository ini terinspirasi oleh karakter superhero Ant-Man dan menggunakan konsep kecil namun tangguh yang serupa dalam menjaga keamanan file.

(Library / Helper / Function) antman-lockfile-php memberikan kemampuan untuk mengenkripsi file menggunakan AES, yang merupakan salah satu algoritma enkripsi yang kuat dan banyak digunakan dalam industri keamanan informasi. Dengan mengintegrasikan antman-lockfile-php ke dalam aplikasi PHP, pengguna dapat meningkatkan tingkat keamanan file mereka dengan melindungi isi file dari akses yang tidak sah

Beberapa fitur utama yang dimiliki oleh antman-lockfile-php antara lain:

* Enkripsi File: Library ini memungkinkan pengguna untuk mengenkripsi file dengan menggunakan AES. Proses enkripsi akan mengubah konten file menjadi format yang tidak dapat dibaca oleh pihak yang tidak berwenang, sehingga menjaga kerahasiaan data dalam file.

* Kunci Enkripsi: Pengguna dapat menentukan kunci enkripsi yang digunakan dalam proses enkripsi dan dekripsi file. Dengan menggunakan kunci yang kuat dan rahasia, pengguna dapat meningkatkan tingkat keamanan enkripsi file.

* Pengelolaan File Terenkripsi: antman-lockfile-php juga menyediakan fungsi-fungsi untuk mengelola file-file terenkripsi. Pengguna dapat melakukan operasi seperti membuka, menulis, atau menghapus file terenkripsi dengan menggunakan library ini. Library ini akan secara otomatis melakukan proses enkripsi dan dekripsi file sesuai dengan kebutuhan.

* Integrasi Mudah: antman-lockfile-php dirancang untuk mudah diintegrasikan ke dalam aplikasi PHP yang sudah ada. Library ini menyediakan antarmuka yang sederhana dan dokumentasi yang jelas, sehingga pengguna dapat dengan mudah memanfaatkan fitur enkripsi file menggunakan AES.

Dengan menggunakan antman-lockfile-php, pengguna dapat dengan mudah menambahkan lapisan keamanan tambahan pada file-file sensitif dalam aplikasi PHP mereka. Enkripsi file menggunakan AES memberikan perlindungan yang kuat terhadap akses yang tidak sah dan menjaga kerahasiaan data yang disimpan dalam file. Dengan kekuatan antman-lockfile-php, aplikasi PHP Anda dapat memiliki tingkat keamanan yang lebih tinggi dan melindungi integritas file dengan lebih baik


# Disclaimer:

Kode ini disediakan hanya untuk tujuan pembelajaran dan penggunaan pribadi. Penulis tidak bertanggung jawab atas penggunaan kode ini untuk tujuan ilegal atau melanggar privasi orang lain. Pastikan untuk mematuhi hukum yang berlaku dalam yurisdiksi Anda saat menggunakan kode ini

## Penting:

Kode ini menggunakan algoritma enkripsi ```AES-CBC``` yang diimplementasikan melalui fungsi ```openssl_encrypt()``` dan ```openssl_decrypt()``` pada PHP. Namun, keamanan kriptografi tergantung pada implementasi dan pengaturan yang tepat. Pastikan untuk mengamankan kunci enkripsi Anda dan menjaga kerahasiaannya.

Jangan lupa untuk membuat salinan cadangan file asli sebelum melakukan enkripsi. Kehilangan kunci enkripsi atau file asli dapat menyebabkan kehilangan data permanen.

Selalu berhati-hati saat menggunakan kunci enkripsi. Pastikan untuk memilih kunci yang kuat dan sulit ditebak oleh pihak lain. Disarankan untuk menggunakan kunci yang panjangnya minimal ```256-bit```.

Penulis tidak memberikan jaminan keamanan atau keefektifan dari kode ini. Penggunaan kode ini sepenuhnya merupakan tanggung jawab pengguna.

## Catatan

Pastikan untuk memahami dan mematuhi ketentuan hukum, peraturan, dan kebijakan privasi yang berlaku dalam yurisdiksi Anda sebelum menggunakan kode ini.

## Enkripsi File

Script ini digunakan untuk mengenkripsi file menggunakan algoritma AES-CBC

### Cara Penggunaan
```console
$ php antman-cli-encryptor.php <inputFile> <key> <outputFile>

```

* ```<inputFile>``` : Path ke file yang ingin dienkripsi
* ```<key>``` : Kunci yang digunakan untuk enkripsi.
* ```<outputFile>``` : Path ke file hasil enkripsi.

### Contoh Penggunaan
```console
$ php antman-cli-encryptor.php secret.pdf mykey encrypted.enc

Output:

File berhasil dienkripsi dan disimpan di encrypted.enc
Proses pemindahan file...|   (animasi loading)
Selesai. File hasil enkripsi disimpan di encrypt_files/encrypted.enc
File asli dipindahkan ke folder "files"
```

## Dekripsi File

Script ini digunakan untuk mendekripsi file yang telah dienkripsi menggunakan algoritma AES-CBC

### Cara Penggunaan

```console
$ php antman-cli-decryptor.php <inputFile> <key> <outputFile>
```

* ```<inputFile>``` : Path ke file terenkripsi.
* ```<key>``` : Kunci yang digunakan untuk dekripsi.
* ```<outputFile>``` : Path ke file hasil dekripsi

### Contoh Penggunaan

```console
$ php antman-cli-decryptor.php encrypted.enc mykey secret_decrypted.pdf

Output:

File berhasil didekripsi.
Proses pemindahan file...|   (animasi loading)
Selesai. File hasil dekripsi disimpan di decrypt_files/secret_decrypted.pdf
```

Pastikan Anda telah menginstal PHP dan menjalankan script dengan command line interface (CLI) pada sistem operasi yang mendukung PHP.

Catatan: Pastikan untuk mengganti ```<inputFile>```, ```<key>```, dan ```<outputFile>``` dengan nilai yang sesuai saat menjalankan script.