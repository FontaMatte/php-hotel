<?php

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

    // Filter hotels by parking
    if(isset($_GET['parking']) && $_GET['parking'] == 1){
        $hotels = array_filter($hotels, function($hotel){
            return $hotel['parking'] == true;
        });
    }

    // Filter hotels by rating
    if(isset($_GET['vote']) && $_GET['vote'] != ''){
        $hotels = array_filter($hotels, function($hotel){
            return $hotel['vote'] >= $_GET['vote'];
        });
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Hotel</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container">

            <h1>PHP Hotel</h1>
            <!-- Filter form -->
            <form method="GET" action="">
                <div class="form-group mb-2">
                    <label for="parking">Parking:</label>
                    <input type="checkbox" name="parking" id="parking" value="1">
                </div>
                <div class="form-group mb-2">
                    <label for="rating">Rating:</label>
                    <select name="vote" id="rating" class="form-control">
                        <option value="">All</option>
                        <option value="3">3 stars or more</option>
                        <option value="4">4 stars or more</option>
                        <option value="5">5 stars</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
            <hr>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Distance to Center</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
                    foreach ($hotels as $hotel) {

                        echo '<tr>';
                        echo '<td>'.$hotel['name'].'</td>';
                        echo '<td>'.$hotel['description'].'</td>';
                        echo '<td>'.($hotel['parking']?'yes' : 'no').'</td>';
                        echo '<td>'.$hotel['vote'].'</td>';
                        echo '<td>'.$hotel['distance_to_center'].'</td>';
                        echo '</tr>';
                        
                    }
                ?>
                </tbody>

            </table>  

        </div>
        
    </body>
</html>