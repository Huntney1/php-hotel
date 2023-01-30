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

if (isset($_GET['parking'])) {
    $parking = $_GET['parking'];

    if ($parking === 'yes' || $parking === 'no') {
        $parking = ($parking === 'yes') ? true : false;
        foreach ($hotels as $hotel) {
            if ($hotel['parking'] === $parking) {
                $filteredHotels[] = $hotel;
            }
        }
    } else {
        $error = 'Il valore inserito per il parcheggio non è valido';
    }
} elseif (isset($_GET['vote'])) {
    $vote = intval($_GET['vote']);

    if ($vote >= 1 && $vote <= 5) {
        foreach ($hotels as $hotel) {
            if ($hotel['vote'] >= $vote) {
                $filteredHotels[] = $hotel;
            }
        }
    } else {
        $error = 'Il valore inserito per la votazione non è valido';
    }
} else {
    $filteredHotels = $hotels;
} 
 
// Recupera i dati inviati dal form
$parking = isset($_GET['parking']) ? $_GET['parking'] : '';
$vote = isset($_GET['vote']) ? (int) $_GET['vote'] : '';

// Filtra gli hotel
$filteredHotels = [];
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
if (!empty($_GET['vote'])) {
    $vote = (int) $_GET['vote'];
    if ($vote >= 1 && $vote <= 5) {
        $filteredHotels = array_filter($hotels, function($hotel) use ($vote) {
            return $hotel['vote'] >= $vote;
        });
    } else {
        echo 'Errore: la votazione deve essere compresa tra 1 e 5.';
    }
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

<form method="GET">
    <div class="form-group">
      <label for="parking">Parcheggio:</label>
      <select name="parking" id="parking">
        <option value="all">Tutti</option>
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
  </form>
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

</body>
</html>
