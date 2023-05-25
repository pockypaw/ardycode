<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Arrays</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .bg-gray {
            background-color: #454545;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron bg-dark text-white">
            <h1 class="display-4">Table Arrays</h1>
            <p class="lead">Created by Muhamad Ridho Ardian</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Pelajari Lebih Lanjut !</a>
            </p>
        </div>
        <?php
        function umurSekarang($umur)
        {
            $tahunSekarang = date('Y');
            return $tahunSekarang - $umur;
        }

        function masaKerja($tahun)
        {
            $tahunSekarang = date('Y');
            return $tahunSekarang - $tahun;
        }

        function gapokSetahun($gaji)
        {
            $setahun = 12;
            return $setahun * $gaji;
        }

        $datakaryawan = [
            ["Nama" => 'Ardy', "Jenis Kelamin" => 'Laki-Laki', "Tahun Masuk" => 2020, "Tahun Lahir" => 1998, "Umur" => 0, "Masa Kerja" => 0, "Jabatan" => "Web Developer", "Penghasilan" => 120000000, "Gapok Setahun" => 0],
            ["Nama" => 'Indah', "Jenis Kelamin" => 'perempuan', "Tahun Masuk" => 2000, "Tahun Lahir" => 1987, "Umur" => 0, "Masa Kerja" => 0, "Jabatan" => "kasir", "Penghasilan" => 5000000, "Gapok Setahun" => 0],

        ];

        $Tahun_lahir = 0;
        $Masa_kerja = 0;
        $GapokSetahun = 0;
        $num = 1;
        $keys = array_keys($datakaryawan);
        echo "<table class='table table-dark table-striped'>";
        echo "<tr><th>No.</th><th>Name</th><th>Jenis Kelamin</th><th>Tahun Masuk</th><th>Tahun Lahir</th><th>Umur</th><th>Masa Kerja</th><th>Jabatan</th><th>Penghasilan</th><th>Gapok Setahun</th></tr>";
        for ($i = 0; $i < count($datakaryawan); $i++) {
            echo "<tr>";
            echo "<td>".$num++."</td>";
            foreach ($datakaryawan[$keys[$i]] as $key => $value) {
                if ($key == 'Tahun Lahir') {
                    $Tahun_lahir = $value;
                }
                if ($key == 'Umur') {
                    $value = umurSekarang($Tahun_lahir);
                }

                if ($key == 'Tahun Masuk') {
                    $Masa_kerja = $value;
                }
                if ($key == 'Masa Kerja') {
                    $value = masaKerja($Masa_kerja) . ' Tahun';
                }
                if ($key == 'Penghasilan') {
                    $GapokSetahun = $value;
                    $value = 'Rp.'.number_format($GapokSetahun, 0, ',', '.');
                }
                if ($key == 'Gapok Setahun') {
                    $formattedNumber = gapokSetahun($GapokSetahun);
                    $value = 'Rp.'.number_format($formattedNumber, 0, ',', '.');
                }
                echo "<td>$value</td>";
            }
            echo "</td>";
        }
        echo "</table>";
        ?>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>