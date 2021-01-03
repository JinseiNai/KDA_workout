<?php
// if form is submitted, process the data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = $_POST['result'];
    $kills = $_POST['kills'];
    $deaths = $_POST['deaths'];
    $assists = $_POST['assists'];
}
 
print_r($_POST);

// Randomize a workout
function random_workout() {
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
    
    echo $workout;
}

// Calculate amount of reps due to KDA
// Each death equals 5 rep, divide by KDA
// KDA equals kills plus assists divide by deaths
// Round KDA and reps
// If game lost, add 20 reps
function reps() {
    $KDA = (($kills + $assists) / $deaths);
    echo $KDA;
}

random_workout();
reps();
?>