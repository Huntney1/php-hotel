<?php
    //servono per mostrare gli errori
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $filteredHotels = [];

    // Recupero i dati inviati dal form
    $parking = isset($_GET['parking']) ? $_GET['parking'] : '';
    $vote = isset($_GET['vote']) ? (int) $_GET['vote'] : '';
    
    // Filtra gli hotel
    foreach ($hotels as $hotel) {
        if (($parking == 'yes' && $hotel['parking'] == true) || ($parking == 'no' && $hotel['parking'] == false) || $parking == '') {
            if ($vote == '' || $hotel['vote'] >= $vote) {
                $filteredHotels[] = $hotel;
            }
        }
    }
    
    // Mostra gli hotel filtrati
    foreach ($filteredHotels as $hotel) {
        echo '<p>' . $hotel['name'] . '</p>';
        echo '<p>' . $hotel['description'] . '</p>';
        echo '<p>Parcheggio: ' . ($hotel['parking'] ? 'Sì' : 'No') . '</p>';
        echo '<p>Votazione: ' . $hotel['vote'];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonus Hotel</title>

    <!-- Autore -->
    <meta name="author" content="Simone Fera">
    <!-- Descrizione del sito -->
    <meta name="description" content="primo utilizzo della programmazione PHP">
    <!-- Refresh permette il client-pull (refrescia la pagina in automatico) -->
    <!--  <meta http-equiv="refresh" content="40"> -->

    <!-- Persona CSS -->
    <link rel="stylesheet" href="./CSS/style.css">
    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


</head>
<body>




    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">Voto</th>
                <th scope="col">Distanza dal centro</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td colspan="5">
                <form method="GET">
                    <div class="form-group">
                        <label for="parking">Parcheggio:</label>
                        <select name="parking" id="parking">
                            <option value="tutti">Tutti</option>
                            <option value="yes">Sì</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                    <td colspan="5">
                        <div class="form-group">
                            <label for="vote">Voto:</label>
                            <input type="number" name="vote" id="vote" min="1" max="5" step="1" placeholder="1=>5">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" name="name" id="name" placeholder="Search Hotel">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <button type="submit" class="btn btn-primary">Filtra</button>
                    </td>
                </tr>
        </tbody>
  
    </table>

</body>
</html>     
        <!--<form method="GET">
        <div class="form-group">
        <label for="parking">Parcheggio:</label>
        <select name="parking" id="parking">
            <option value="yes">Sì</option>
            <option value="no">No</option>
        </select>
        </div>
        <div class="form-group">
        <label for="vote">Voto:</label>
        <input type="number" name="vote" id="vote" min="1" max="5" step="1">
        </div>
        <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name">
        </div>
        <button type="submit" class="btn btn-primary">Filtra</button>
    </form> -->
            
     


