<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PENDAFTARAN RUTE PENERBANGAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <style>
        label {
            color: #2C3333;
        }

        #example_info {
            color: #2C3333;
        }

        .form-label {
            color: white;
        }
    </style>
</head>

<body style="background-color:#2C3333;">
    <?php
    $pilih1 = '';
    $pilih2 = '';
    $airportTax1 = '';
    $airportTax2 = '';
    $namaMaskapai = '';
    $hargaTiket = '';

    // File json yang akan dibaca (full path file)
    $file = "https://ardycode.vercel.app/api/dataPenerbangan.php";

    // Mendapatkan file json
    $dataPenerbangan = file_get_contents($file);

    // Mendecode dataPenerbangan.json
    $data = json_decode($dataPenerbangan, true);

    // Convert to array of objects with keys
    $result = [];

    foreach ($data as $item) {
        $obj = (object) [
            'airline' => $item[0],
            'origin' => $item[1],
            'destination' => $item[2],
            'price' => $item[3],
            'tax' => $item[4],
            'total' => $item[5]
        ];
        $result[] = $obj;
    }

    $airport = [
        [
            'Airport Name' => 'Soekarno-Hatta (CGK)',
            'Airport Tax' => 50000
        ],
        [
            'Airport Name' => 'Husein Sastranegara (BDO)',
            'Airport Tax' => 30000
        ], [
            'Airport Name' => 'Abdul Rachman Saleh (MLG)',
            'Airport Tax' => 40000
        ], [
            'Airport Name' => 'Juanda (SUB)',
            'Airport Tax' => 40000
        ],
        [
            'Airport Name' => 'Ngurah Rai (DPS)',
            'Airport Tax' => 80000
        ],
        [
            'Airport Name' => 'Hasanuddin (UPG)',
            'Airport Tax' => 70000
        ], [
            'Airport Name' => 'Inanwatan (INX)',
            'Airport Tax' => 90000
        ], [
            'Airport Name' => 'Sultan Iskandarmuda (BTJ)',
            'Airport Tax' => 70000
        ]
    ];
    $keys = array_keys($airport);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pilih1 = $_POST['pilih1'];
        $pilih2 = $_POST['pilih2'];
        $namaMaskapai = $_POST['namaMaskapai'];
        $hargaTiket = (int)($_POST['hargaTiket']);

        for ($i = 0; $i < count($airport); $i++) {
            foreach ($airport[$keys[$i]] as $key => $value) {
                if ($key == 'Airport Name') {
                    if ($pilih1 == $value) {
                        $airportTax1 = $airport[$i]['Airport Tax'];
                    }
                    if ($pilih2 == $value) {
                        $airportTax2 = $airport[$i]['Airport Tax'];
                    }
                }
            }
        }

        $tax = Tax($airportTax1, $airportTax2);
        $totalPrice = TotalPrice($tax, $hargaTiket);


        if (isset($_POST['form-submit'])) {
            $data = [$namaMaskapai, $pilih1, $pilih2, $hargaTiket, $tax, $totalPrice];
            // Mengencode data menjadi JSON
            // $jsonfile = json_encode($data, JSON_PRETTY_PRINT);

            // Membaca file awal
            $originalData = file_get_contents("https://ardycode.vercel.app/api/dataPenerbangan.php");

            // Mencari posisi untuk memasukkan array baru
            $position = strpos($originalData, ");");

            if ($position !== false) {
                // Konstruksi kode untuk array baru
                $newArrayCode = ", " . var_export($data, true);

                // Menyisipkan array baru ke dalam data awal
                $appendedData = substr_replace($originalData, $newArrayCode, $position, 0);

                // Menulis data yang telah dimodifikasi ke dalam file
                file_put_contents("data.php", $appendedData);

                echo "Array berhasil dimasukkan.";
            } else {
                echo "Gagal menemukan posisi untuk memasukkan array.";
            }

            // Menyimpan data ke dalam dataPenerbangan.json
            // $dataPenerbangan = file_put_contents($file, $jsonfile);
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo 'Masukan Data Terlebih Dahulu';
        }
    }



    function Tax($TaxOrigin, $TaxDestination)
    {
        return $TaxOrigin + $TaxDestination;
    }

    function TotalPrice($tax, $hargaTiket)
    {
        return $hargaTiket + $tax;
    }


    ?>
    <div class="container">
        <div class="mt-4 p-5 text-white rounded" style="background-color: #0E8388;">
            <center>
                <h1>PENDAFTARAN RUTE PENERBANGAN</h1>
            </center>
        </div>

        <div class="mt-4 p-5 text-white rounded" style="background-color: #2E4F4F;">

            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Maskapai</label>
                            <input type="text" name="namaMaskapai" class="form-control" id="exampleFormControlInput1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Harga Tiket</label>
                            <input type="text" name="hargaTiket" class="form-control" id="exampleFormControlInput1" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Bandara Asal</label>
                            <div class="dropdown">
                                <select name="pilih1" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="dropdown-menu">
                                        <?php
                                        foreach ($airport as $bandara) {
                                        ?>
                                            <option class="dropdown-item" value="<?php echo $bandara['Airport Name']; ?>">
                                                <?php echo $bandara['Airport Name']; ?>
                                            </option> <?php } ?>
                                    </div>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Bandara Tujuan</label>
                            <div class="dropdown">
                                <select name="pilih2" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="dropdown-menu">
                                        <?php
                                        foreach ($airport as $bandara) {
                                        ?>
                                            <option class="dropdown-item" value="<?php echo $bandara['Airport Name']; ?>">
                                                <?php echo $bandara['Airport Name']; ?>
                                            </option>
                                        <?php } ?>
                                    </div>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>


                <input type="submit" name="form-submit" class="form-control text-light" style="background-color: #0E8388;">

        </div>
        </form>
        <div class="mt-4 p-5 text-white rounded" style="background-color: #CBE4DE;">
            <center>
                <h3 style="color:#2C3333; margin-bottom:3%;">RUTE PENERBANGAN YANG TERSEDIA</h3>
            </center>
            <table id="example" class="display table table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Airline</th>
                        <th scope="col">Origin</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Price Ticket</th>
                        <th scope="col">Tax</th>
                        <th scope="col">Total Price</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    for ($i = 0; $i < count($result); $i++) { ?>
                        <tr>
                            <th scope="row"><?php echo $no++; ?></th>
                            <td><?php echo $result[$i]->airline ?></td>
                            <td><?php echo $result[$i]->origin ?></td>
                            <td><?php echo $result[$i]->destination ?></td>
                            <td><?php echo $result[$i]->price ?></td>
                            <td><?php echo $result[$i]->tax ?></td>
                            <td><?php echo $result[$i]->total ?></td>
                        </tr>
                    <?php }

                    ?>
                </tbody>
            </table>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
