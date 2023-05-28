#!/usr/bin/env php
<?php

/**
 * Enkripsi File menggunakan Algoritma AES-CBC.
 *
 * Script ini menyediakan fungsi untuk mengenkripsi file menggunakan algoritma enkripsi AES-CBC.
 * Ia membaca isi file input, mengenkripsi data dengan kunci yang diberikan, dan menyimpan data terenkripsi
 * ke dalam file output. Script ini juga melakukan operasi penanganan file seperti memindahkan file terenkripsi
 * ke folder yang ditentukan dan memindahkan file asli ke folder lain.
 *
 * Penggunaan: php antman-cli-encryptor.php <inputFile> <key> <outputFile>
 *
 * @param string $inputFile  Path ke file input yang akan dienkripsi.
 * @param string $key        Kunci enkripsi yang digunakan untuk AES-CBC.
 * @param string $outputFile Path untuk menyimpan file terenkripsi.
 */

/**
 * DISCLAIMER:
 * 
 * Harap digunakan dengan tanggung jawab penuh. Penulis skrip ini tidak bertanggung jawab atas
 * penggunaan yang salah atau ilegal atas skrip ini. Pastikan Anda memiliki hak yang sah
 * untuk mengenkripsi file dan memegang kunci enkripsi yang tepat sebelum menggunakan skrip ini.
 * Selain itu, pastikan untuk memahami dan mematuhi hukum dan peraturan yang berlaku di wilayah
 * Anda terkait dengan penggunaan enkripsi dan transfer file terenkripsi.
 * 
 * Dengan menggunakan skrip ini, Anda menunjukkan bahwa Anda mengerti dan menerima tanggung jawab
 * penuh atas penggunaan dan konsekuensi yang mungkin terjadi dari penggunaan skrip ini.
 * Jika Anda tidak setuju, harap jangan lanjutkan penggunaan skrip ini.
 */
function encryptFile($inputFile, $key, $outputFile)
{
    date_default_timezone_set('Asia/Jakarta');

    // Baca isi file input
    $inputData = file_get_contents($inputFile);

    // Inisialisasi enkripsi
    $encryptionKey = hash('sha256', $key, true);
    $initVector = substr(hash('sha256', $key), 0, 16);

    // Enkripsi file menggunakan algoritma AES-CBC
    $encryptedData = openssl_encrypt($inputData, 'AES-256-CBC', $encryptionKey, OPENSSL_RAW_DATA, $initVector);

    // Simpan file hasil enkripsi
    file_put_contents($outputFile, $encryptedData);
    echo "[*] File berhasil dienkripsi dan disimpan di $outputFile\n";

    // Animasi loading selama 5 detik
    echo "Proses pemindahan file...";
    $loadingChars = ['|', '/', '-', '\\'];
    $loadingIndex = 0;
    $endTime = microtime(true) + 5; // Waktu akhir setelah 5 detik
    while (microtime(true) < $endTime) {
        echo $loadingChars[$loadingIndex % 4] . "\r";
        usleep(250000); // Tunda selama 250 milidetik (250000 mikrodetik)
        $loadingIndex++;
    }

    // Pemindahan file hasil enkripsi
    $encryptFolder = 'encrypt_files';
    if (!is_dir($encryptFolder)) {
        mkdir($encryptFolder);
    }
    $encryptedFile = $encryptFolder . '/' . basename($outputFile);
    rename($outputFile, $encryptedFile);
    echo "[*] File hasil enkripsi dipindahkan ke folder \"$encryptFolder\"\n";

    // Pemindahan file asli
    $filesFolder = 'files';
    if (!is_dir($filesFolder)) {
        mkdir($filesFolder);
    }
    $originalFile = $filesFolder . '/' . basename($inputFile);
    rename($inputFile, $originalFile);
    echo "[*] File asli dipindahkan ke folder \"$filesFolder\"\n";

    // Mendapatkan tanggal proses
    $tanggalProses = date('Y-m-d H:i:s');

    // Mendapatkan alamat IP
    $ipAddress = gethostbyname(trim(`hostname`));

    // Mendapatkan nama file dari path input file
    $filename = basename($inputFile);

    // Buat URL WhatsApp dengan pesan yang berisi kunci enkripsi, nama file, tanggal proses, dan alamat IP
    $whatsappMessage = "Halo, berikut adalah kunci enkripsi untuk file *$filename* yang telah dienkripsi:\n\n";
    $whatsappMessage .= "Nama File: *$filename*\n";
    $whatsappMessage .= "Kunci Enkripsi: *$key*\n";
    $whatsappMessage .= "Tanggal: *$tanggalProses*\n";
    $whatsappMessage .= "IP Address: *$ipAddress*\n";
    $whatsappMessage .= "\n";
    $whatsappMessage .= "Terima kasih sudah menggunakan tools\n*AntMan Lockfile* (https://github.com/readsevenone/antman-lockfile-php)";

    $encodedMessage = urlencode($whatsappMessage);
    $whatsappUrl = "https://api.whatsapp.com/send?text=" . $encodedMessage;

    echo "[*] Berikut adalah URL WhatsApp untuk mengirim kunci enkripsi:\n\n";
    echo $whatsappUrl . "\n\n";
    echo "[*] Silakan salin URL di atas dan buka di peramban web seperti Google Chrome.\n";
}

// Menangkap argumen dari command line
if (!isset($argc) || $argc !== 4) {
    echo "Usage: php antman-cli-encryptor.php <inputFile> <key> <outputFile>\n";
    exit(1);
}

$inputFile = $argv[1];
$key = $argv[2];
$outputFile = $argv[3];

encryptFile($inputFile, $key, $outputFile);
