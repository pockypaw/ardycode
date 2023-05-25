<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nested Loop Stars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .bg-gray {
            background-color: #454545;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="mt-4 p-5 bg-gray text-white rounded">
            <h1>Nested Loop Stars</h1>
            <h6 style="margin-bottom:20px;">Created by Muhamad Ridho Ardian</h6>
            <form action="" method="post">
                <div class="row">
                    <div class="col-sm-3 col-md-6">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukan Angka !" name="nilai">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="submit">Kirim</button>
                            </div>
                        </div>
                    </div>
            </form>
            <div class="col-sm-3 col-md-6">
            </div>
        </div>

        <div class="mt-4 p-5 bg-dark text-white rounded">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nilai = $_POST['nilai'];

                if (is_numeric($nilai)) {
                    if ($nilai == "") {
                        echo "Isi terlebih dahulu";
                    } else {
                        for ($i = 1; $i <= $nilai; $i++) {
                            for ($y = 1; $y <= $i; $y++) {
                                echo "★";
                            }
                            echo "<br>";
                        }
                    }
                } else {
                    echo "<h1 style='text-align: center;'>Harus Angka !<h1>";
                }
            } ?>

        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>
