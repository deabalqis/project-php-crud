<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
   <div class="container-my-5 mt-3">
        <div class="card p-5 mx-5">
            <h3 class="mb-3">Add Data</h3>

            <form action="add.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="" placeholder=" Masukkan nama anda" name="nama" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="" placeholder=" Masukkan NIM anda" name="nim" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="" placeholder=" Masukkan email anda" name="email" autocomplete="off" required>
                </div>


                <div class="mb-3">
                    <label for="" class="form-label">Program Studi</label>
                    <select class="form-select" name="prodi" value=<?php echo $prodi;?> required>
                        <option selected value="">-- Pilih Prodi --</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknologi Informasi">Teknologi Informasi</option>
                    </select>

                <div class="mb-3 mt-3">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" id="formFile" name="gambar">
                </div>
            </div>

                <a href="index.php" class="btn btn-secondary">Cancel</a>
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">

            </form>
        </div>
    </div>

    <?php 
        include_once("koneksi.php");
            if (isset($_POST['submit'])) {
                $nama = $_POST['nama'];
                $nim = $_POST['nim'];
                $email = $_POST['email'];
                $prodi = $_POST['prodi'];
                $gambar = upload_file();
            
                $result = mysqli_query($koneksi, "INSERT INTO tbl_mahasiswa(nama, nim, email, prodi, gambar) VALUES ('$nama', '$nim', '$email', '$prodi', '$gambar')");

        header('location: index.php');
        }

        function upload_file()
        {
            $namaFile = $_FILES['gambar']['name'];
            $ukuranFile = $_FILES['gambar']['size'];
            $error = $_FILES['gambar']['error'];
            $tmpName = $_FILES['gambar']['tmp_name'];

            $extensionFileValid = ['jpg', 'jpeg', 'png'];
            $extensionFile = explode('.', $namaFile);
            $extensionFile = strtolower(end($extensionFile));

            if (!in_array($extensionFile, $extensionFileValid)) {
                echo "<script>
                alert('Format file tidak valid');
                document.location.href = 'add.php';
                </script>";
                die();
            }

            if ($ukuranFile > 2048000) {
                echo "<script>
                alert('Ukuran file maksimal 2 MB');
                document.location.href = 'add.php';
                </script>";
                die();
            }

            $namaFileBaru = uniqid() . '.' . $extensionFile;
            move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
            return $namaFileBaru;

            }


    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>