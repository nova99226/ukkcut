<?php
include "header.php";
session_start();
if (!isset($_SESSION['username'])){
    header('location:login.php');
}
?>
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<h1>Selamat Datang <?php echo $_SESSION['username'] ?> di Aplikasi Peduli Diri</h1>
                    </div>
                </div>
            </div>
    </div>
</div>
