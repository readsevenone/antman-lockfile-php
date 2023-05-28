#!/usr/bin/env php
<?php

/**
 * Fungsi untuk mendekripsi file menggunakan AES-CBC
 * 
 * @param string $inputFile Path file input (file terenkripsi)
 * @param string $key Kunci enkripsi
 * @param string $outputFile Path file output (file hasil dekripsi)
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
function decryptFile($inputFile, $key, $outputFile)
{
    // Baca isi file input (file terenkripsi)
    $inputData = file_get_contents($inputFile);

    // Inisialisasi dekripsi
    $decryptionKey = hash('sha256', $key, true);
    $initVector = substr(hash('sha256', $key), 0, 16);

    // Dekripsi file menggunakan algoritma AES-CBC
    $decryptedData = openssl_decrypt($inputData, 'AES-256-CBC', $decryptionKey, OPENSSL_RAW_DATA, $initVector);

    // Simpan file hasil dekripsi
    file_put_contents($outputFile, $decryptedData);

    echo "File berhasil didekripsi.\n";

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

    // Buat folder decrypt_files jika belum ada
    if (!is_dir('decrypt_files')) {
        mkdir('decrypt_files');
    }

    // Pindahkan file ke folder decrypt_files
    $newFilePath = 'decrypt_files/' . basename($outputFile);
    rename($outputFile, $newFilePath);

    echo "Selesai. File hasil dekripsi disimpan di $newFilePath\n";
}

// Menangkap argumen dari command line
if (!isset($argc) || $argc !== 4) {
    echo "Usage: php antman-cli-decryptor.php <inputFile> <key> <outputFile>\n";
    exit(1);
}

$inputFile = $argv[1];
$key = $argv[2];
$outputFile = $argv[3];

decryptFile($inputFile, $key, $outputFile);
