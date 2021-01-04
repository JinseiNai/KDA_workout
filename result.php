<?php
// declare variables
$KDA = 0;
$reps = 0;
$workout = '';
// if form is submitted, process the data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = $_POST['result'];
    $kills = $_POST['kills'];
    $deaths = $_POST['deaths'];
    $assists = $_POST['assists'];
}
 
// test post results
// print_r($_POST);

// Randomize a workout
function random_workout() {
    // call global variable
    global $workout;
    // get random number to represent a workout
    $random_number = rand(1,3);

    // test random number
    // echo "workout " . $random_number;

    // if a number to equal a certain workout
    if ($random_number == 1) {
        $workout = "Squats";
    }
    elseif ($random_number == 2) {
        $workout = "Push-ups";
    }
    elseif ($random_number == 3) {
        $workout = "Sit-ups";
    }
    
    return $workout;
}

// Calculate amount of reps due to KDA
// Each death equals 5 rep, divide by KDA
// KDA equals kills plus assists divide by deaths
// Round KDA and reps
// If game lost, add 20 reps
function calc_reps() {
    // get global variables
    global $KDA, $reps, $result, $kills, $deaths, $assists;

    // calculate KDA, rounded
    $KDA = round(($kills + $assists) / $deaths);

    // multiply each death by 5 rep, divide by KDA, round it
    $reps = round(($deaths * 5) / $KDA);

    // check if result is a win or lost
    // if lost, add 20 to reps
    if ($result == 'lose') {
        $reps += 20;
    }

    // return number of reps
    return $reps;
}

// call functions
random_workout();
calc_reps();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>KDA Workout Result</title>
</head>
<body>
    <div class="background-image">
        <div class="header">
            <div class="hero-text">
                <h1>KDA Workout</h1>
            </div>
        </div>
        <div class="content">
            <div class="result">
                <h2>
                <?php 
                    if ($result == 'win') {
                        echo 'You Won!';
                    } else {
                        echo 'You Lost...';
                    }
                ?>
                </h2>
                <p>Your game score: <?php echo $kills . '/' . $deaths . '/' . $assists; ?></p>
                <p>Your KDA score: <?php echo number_format(($kills + $assists) / $deaths, 2); ?></p>
                <h2 class="red">Do <?php echo $reps . ' ' . $workout; ?>!</h2>
                <a class="new-game" href="index.html">Enter New Game</a>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-text">
            <p><em>Designed and Created by Calvin Wang &copy; 2021</em></p>
        </div>
    </footer>
</body>
</html>