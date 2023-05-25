<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
        .bg-gray {
            background-color: #454545;
        }
    </style>
</head>
<?php
$pilih = "";
$hasil = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bilangan_1 = $_POST['bilangan_1'];
    $bilangan_2 = $_POST['bilangan_2'];
    $pilih = $_POST['pilih'];

    if (is_numeric($bilangan_1) && is_numeric($bilangan_2)) {
        if ($bilangan_1 == "" && $bilangan_2 == "") {
            $hasil = "Isi terlebih dahulu";
        } else {
            switch ($pilih) {
                case "Penjumlahan":
                    $hasil = penjumlahan($bilangan_1, $bilangan_2);
                    break;
                case "Pengurangan":
                    $hasil = "Pengurangan";
                    break;
                case "Perkalian":
                    $hasil = "Perkalian";
                    break;
                case "Pembagian":
                    $hasil = "Pembagian";
                    break;
                case "Tampilkan Semua":
                    $hasil = tampilkanSemua($bilangan_1, $bilangan_2);
                    break;
                default:
                    $hasil = 'Kamu tidak memilih apapun';
            }
        }
    } else {
        $hasil = "<h1 style='text-align: center;'>Harus Angka !<h1>";
    }
}

function penjumlahan($bilangan_1, $bilangan_2)
{
    return $bilangan_1 + $bilangan_2;
}

function pengurangan($bilangan_1, $bilangan_2)
{
    return $bilangan_1 - $bilangan_2;
}
function perkalian($bilangan_1, $bilangan_2)
{
    return $bilangan_1 * $bilangan_2;
}
function pembagian($bilangan_1, $bilangan_2)
{
    return $bilangan_1 / $bilangan_2;
}

function tampilkanSemua($bilangan_1, $bilangan_2)
{
    return $hasil = ["Penjumlahan" => penjumlahan($bilangan_1, $bilangan_2), "Pengurangan" => pengurangan($bilangan_1, $bilangan_2), "Perkalian" => perkalian($bilangan_1, $bilangan_2), "Pembagian" => pembagian($bilangan_1, $bilangan_2)];
}


?>

<body>
    <div class="container-fluid">
        <div class="mt-4 p-5 bg-gray text-white rounded">
            <h1>Simple Calculator</h1>
            <h6 style="margin-bottom:20px;">Created by Muhamad Ridho Ardian</h6>
            <form action="" method="post">
                <div class="row">
                    <div class="col-sm-3 col-md-6">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Bilangan 1" name="bilangan_1" required>
                            <div class="input-group-append">

                                <button class="btn btn-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php ($pilih == "") ? $pilih = "Pilih" : $pilih;
                                    echo $pilih; ?> </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" type="submit" name="pilih" value="Tampilkan Semua">Tampilkan Semua</button>
                                    <button class="dropdown-item" type="submit" name="pilih" value="Penjumlahan">Penjumlahan</button>
                                    <button class="dropdown-item" type="submit" name="pilih" value="Pengurangan">Pengurangan</button>
                                    <button class="dropdown-item" type="submit" name="pilih" value="Perkalian">Perkalian</button>
                                    <button class="dropdown-item" type="submit" name="pilih" value="Pembagian">Pembagian</button>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Bilangan 2" name="bilangan_2" required>

                        </div>
                    </div>
            </form>
            <div class="col-sm-3 col-md-6">
            </div>
        </div>

        <div class="mt-4 p-5 bg-dark text-white rounded">
            <?php
            if (is_array($hasil)) {
                foreach ($hasil as $key => $value) {
                    echo "$key = $value <br>";
                }
            } else {
                echo $hasil;
            } ?>
        </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>