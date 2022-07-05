<?php

$distance = 20;
$track = [];


$chooseContestant = readline("Choose your favorite: ");
$placeBet = readline("Make a bet: ");



$contestants = explode(" ", readline("Insert contestants (symbols) " ));

for($i = 0; $i < count($contestants); $i++)
{

    $track[$i] = array_fill(0, $distance, "-");
    $track[$i][0] = $contestants[$i];

}

$iteration = 0;

$winner = [];

while (count($winner) < count($contestants)){

    system('clear');

    for($i = 0; $i < count($contestants); $i++){


        $currentPosition = array_search($contestants[$i], $track[$i]);

        if($currentPosition === false) continue;

        $step = rand(1,3);
        $nextPosition = $currentPosition + $step;

        if($nextPosition >= $distance){
            $nextPosition = $distance;

        }

        if(! in_array($contestants[$i], $winner)) {
            $track[$i][$nextPosition] = $contestants[$i];
            $track[$i][$currentPosition] = "-";
        }


        if($nextPosition === $distance && ! in_array($contestants[$i], $winner)){
            $winner[] = $contestants[$i];

    }



    }
    foreach ($track as $line){
        echo implode('', $line);
        echo PHP_EOL;
    }

    $i++;

    sleep(1);

}

$firstPlace = $placeBet * 2;
$middlePlaces = $placeBet * 1;
$lasPlace = 0;

$first = $winner[0];
$last = end($winner);



foreach ($winner as $places => $contestant){
    $place = $places + 1;

    echo "#{$place} - $contestant" . PHP_EOL;

}

echo "You bet on $chooseContestant " . PHP_EOL;
echo "Your bet was $placeBet coins " . PHP_EOL;

if($chooseContestant === $first){
    echo "Your choice $chooseContestant got first place! You won: " . $placeBet * 2 . " coins! " . PHP_EOL;
} elseif($chooseContestant === $last){
    echo "Your choice $chooseContestant got last place! You lose!" . PHP_EOL;
} else {
    echo "Your choice $chooseContestant got middle place! You got: " . $placeBet / 2 . "coins!" . PHP_EOL;
}


