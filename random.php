<?php
// Declare variables
$reps = 20;
$workout = '';
// Randomize a workout
function random_workout() {
    // call global variable
    global $workout;
    // Array of workout variations
    $workout_arr = array("Squats", "Traditional Push-ups", "Sit-ups", "Lunges", "seconds of Planks", "Russian Twists", "Crunches", "Dips", "Leg Raises", "Mountain Climbers", "Wide Hand Push-ups", "Close Hand Push-ups", "total Bicep Curls (dumbbell)", "total Hammer Curls (dumbbell)", "total Triceps Kick Back (dumbbell)", "Overhead Press (dumbbell)", "(Bent Over Row (dumbbell)", "Russian Twists with Dumbbell", "Dumbbell Goblet Squat", "Dumbbell Lateral Raises");
    // get random number to represent a workout
    $random_number = rand(0,count($workout_arr) - 1);
    
    return $workout = $workout_arr[$random_number];
}

random_workout();
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
            <div class="opac-bg">
                <h2>Random Workout</h2>
                <h2 class="red">Do <?php echo $reps . ' ' . $workout; ?>!</h2>
                <form action="random.php" method="post">
                    <input type="submit" name="newWorkout" value="New Workout" class="pop-btn">
                </form>
                <br><br>
                <button><a href="index.html">Home</a></button>
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