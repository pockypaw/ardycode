<?php $data = [
    [
        "Adam Air",
        "Soekarno-Hatta (CGK)",
        "Sultan Iskandarmuda (BTJ)",
        "2000000",
        120000,
        2120000
    ],
    [
        "Batik",
        "Husein Sastranegara (BDO)",
        "Sultan Iskandarmuda (BTJ)",
        "100000",
        100000,
        200000
    ],
    [
        "Batik",
        "Soekarno-Hatta (CGK)",
        "Hasanuddin (UPG)",
        "890000",
        120000,
        1010000
    ],
    [
        "Citilink",
        "Soekarno-Hatta (CGK)",
        "Sultan Iskandarmuda (BTJ)",
        "89000",
        120000,
        209000
    ],
    [
        "Garuda Indonesia",
        "Soekarno-Hatta (CGK)",
        "Ngurah Rai (DPS)",
        1500000,
        130000,
        1630000
    ],
    [
        "Garuda Indonesia",
        "Soekarno-Hatta (CGK)",
        "Ngurah Rai (DPS)",
        2000000,
        130000,
        2130000
    ],
    [
        "Nippon Airways",
        "Ngurah Rai (DPS)",
        "Soekarno-Hatta (CGK)",
        8000000,
        130000,
        8130000
    ],
    [
        "Cathay Pasific",
        "Sultan Iskandarmuda (BTJ)",
        "Husein Sastranegara (BDO)",
        200000,
        100000,
        300000
    ],
    [
        "Garuda Indonesia",
        "Inanwatan (INX)",
        "Soekarno-Hatta (CGK)",
        8000000,
        140000,
        8140000
    ],
    [
        "Citilink Air",
        "Juanda (SUB)",
        "Husein Sastranegara (BDO)",
        2000000,
        70000,
        2070000
    ],
    [
        "Scoot Airways",
        "Hasanuddin (UPG)",
        "Juanda (SUB)",
        200000,
        110000,
        310000
    ]
];
    
    // Convert data to JSON
$jsonData = json_encode($data);

// Set headers
header('Content-Type: application/json');

// Output the JSON
echo($jsonData);
 ?>
