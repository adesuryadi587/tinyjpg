<?php
require_once("tinify-php-master/lib/Tinify/Exception.php");
require_once("tinify-php-master/lib/Tinify/ResultMeta.php");
require_once("tinify-php-master/lib/Tinify/Result.php");
require_once("tinify-php-master/lib/Tinify/Source.php");
require_once("tinify-php-master/lib/Tinify/Client.php");
require_once("tinify-php-master/lib/Tinify.php");

// Cek apakah ada file yang diunggah
if(isset($_FILES["gambar"])) {
    $file = $_FILES["gambar"];

    // Mendapatkan informasi file
    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileSize = $file["size"];
    $fileError = $file["error"];

    // Periksa apakah ada kesalahan saat mengunggah
    if($fileError === 0) {
        // Memeriksa tipe file (hanya gambar yang diizinkan)
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if(in_array($fileExtension, $allowedExtensions)) {
            // Batasi ukuran file gambar maksimum menjadi 1MB (1,000,000 bytes)
            $maxFileSize = 5000000; // 1MB dalam bytes
            if ($fileSize <= $maxFileSize) {
                // Tentukan folder tujuan untuk menyimpan gambar yang diunggah
                $uploadDir = "uploads/";
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                // Tentukan nama unik untuk file gambar yang diunggah
                $uniqueFileName = uniqid("image_", true) . "." . $fileExtension;

                // Pindahkan file gambar ke folder tujuan
                $uploadPath = $uploadDir . $uniqueFileName;
                if(move_uploaded_file($fileTmpName, $uploadPath)) {
                    
                    \Tinify\setKey('k2wP8rjCz2r516P19yXkhHKhYLZyCm2Q'); //API Key
                    $source = \Tinify\fromFile($uploadPath); //source gambar awal
                    $source->toFile("compresi/". $uniqueFileName);//source gambar setelah dikompresi
                    echo "Gambar berhasil diunggah";
                    unlink($uploadPath);
                } else {
                    echo "Terjadi kesalahan saat mengunggah gambar.";
                }
            } else {
                echo "Ukuran file gambar terlalu besar. Maksimum 1MB.";
            }
        } else {
            echo "Tipe file yang diunggah tidak diizinkan. Hanya file gambar (jpg, jpeg, png, gif) yang diizinkan.";
        }
    } else {
        echo "Terjadi kesalahan saat mengunggah gambar: " . $fileError;
    }
}
?>
