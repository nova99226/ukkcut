<?php
session_start();
if (isset($_POST['daftar'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $text = $nik . "," . $nama . "\n";
    $fp = fopen('config.txt', 'a+');

    if (fwrite($fp, $text)) {
        echo '<script>alert("Anda Berhasil Mendaftar!");</script>';
    }
}  else if (isset($_POST['masuk'])) {
    $data = file_get_contents("config.txt");
    $contents = explode("\n", $data);

    foreach ($contents as $values) {
        $login = explode(",", $values);
        $nik = $login[0];
        $nama = $login[1];

        if ($nik == $_POST['nik'] && $nama == $_POST['nama']) {
            session_start();
            $_SESSION['username'] = $nama;
            header('location:home.php');
        } else {
            echo '<script>alert("Nik atau Nama Anda Salah!");</script>';
        }
    }
}
?>


<html>
    <head>
        <body>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    </head>

    <div class="container">
        <div class="row justify-content-center pt-5 mt-5">
        <div class="col-lg-4 bg-primary text-white">
            <h1 align = "center" class="mb-3 mt-3">Login</h1>
        </div>
        </div>
        
                <div class="row justify-content-center">
                    <div class="col-lg-4 border">
                    <form action="" method="POST">
                    <div class="form-group">
    <label for="nik">NIK</label>
    <input type="number" class="form-control" id="nik"  name="nik" placeholder="nik">
  </div>
  <div class="form-group">
    <label for="nama">Nama Lengkap</label>
    <input type="text" class="form-control" id="nama"  name="nama" placeholder="Nama Lengkap">
  </div>
            <input class="btn btn-primary" type="submit" name="daftar" value="Saya Pengguna Baru">
            <input class="btn btn-success float-right" type="submit" name="masuk" value="Masuk">
                        </form> 
                    </div>
                </div>
            </div>


    
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>