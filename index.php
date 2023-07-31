<!DOCTYPE html>
<html>
<head>
    <title>Form Upload Gambar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }

        h2 {
            margin-bottom: 20px;
        }

        form {
            display: inline-block;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        label, input[type="file"], input[type="submit"] {
            display: block;
            margin: 10px auto;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        img {
            max-width: 300px;
            margin-top: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Upload Gambar</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="gambar">Pilih gambar:</label>
        <input type="file" name="gambar" id="gambar" accept=".jpg, .jpeg, .png">
        <br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
