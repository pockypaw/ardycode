<?php

$data = array(
    array(
        "Adam Air",
        "Soekarno-Hatta (CGK)",
        "Sultan Iskandarmuda (BTJ)",
        "2000000",
        120000,
        2120000
    ),
    array(
        "Batik",
        "Husein Sastranegara (BDO)",
        "Sultan Iskandarmuda (BTJ)",
        "100000",
        100000,
        200000
    ),
    array(
        "Batik",
        "Soekarno-Hatta (CGK)",
        "Hasanuddin (UPG)",
        "890000",
        120000,
        1010000
    ),
    array(
        "Citilink",
        "Soekarno-Hatta (CGK)",
        "Sultan Iskandarmuda (BTJ)",
        "89000",
        120000,
        209000
    ),
    array(
        "Garuda Indonesia",
        "Soekarno-Hatta (CGK)",
        "Ngurah Rai (DPS)",
        1500000,
        130000,
        1630000
    ),
    array(
        "Garuda Indonesia",
        "Soekarno-Hatta (CGK)",
        "Ngurah Rai (DPS)",
        2000000,
        130000,
        2130000
    ),
    array(
        "Nippon Airways",
        "Ngurah Rai (DPS)",
        "Soekarno-Hatta (CGK)",
        8000000,
        130000,
        8130000
    ),
    array(
        "Cathay Pasific",
        "Sultan Iskandarmuda (BTJ)",
        "Husein Sastranegara (BDO)",
        200000,
        100000,
        300000
    ),
    array(
        "Garuda Indonesia",
        "Inanwatan (INX)",
        "Soekarno-Hatta (CGK)",
        8000000,
        140000,
        8140000
    ),
    array(
        "Citilink Air",
        "Juanda (SUB)",
        "Husein Sastranegara (BDO)",
        2000000,
        70000,
        2070000
    ),
    array(
        "Scoot Airways",
        "Hasanuddin (UPG)",
        "Juanda (SUB)",
        200000,
        110000,
        310000
    )
, array (
  0 => 'Batik',
  1 => 'Husein Sastranegara (BDO)',
  2 => 'Sultan Iskandarmuda (BTJ)',
  3 => '100000',
  4 => 100000,
  5 => 200000,
), array (
  0 => 'Sriwijaya Air',
  1 => 'Soekarno-Hatta (CGK)',
  2 => 'Husein Sastranegara (BDO)',
  3 => 40000,
  4 => 80000,
  5 => 120000,
));

// Convert data to JSON
$jsonData = json_encode($data);

// Set headers
header('Content-Type: application/json');

// Output the JSON
echo($jsonData);
?>
