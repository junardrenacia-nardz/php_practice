<?php

$grade = [80, 80, 75, 75, 75];
$totalGrade = 0;


for ($i = 0; $i < count($grade); $i++) {
    $totalGrade += $grade[$i];
}

$average = calculateAverage($totalGrade, count($grade));

function calculateAverage($studGrade, $numSubs) {
    return $studGrade / $numSubs;
}

if ($average > 100) {
    echo "Ano ka, Malakas";
} else if ($average > 94) {
    echo "Your Average is $average <br>";
    echo "Remarks: A";
} else if ($average > 89) {
    echo "Your Average is $average  <br>";
    echo "Remarks: B";
} else if ($average > 80) {
    echo "Your Average is $average <br>";
    echo "Remarks: C";
} else if ($average > 75) {
    echo "Your Average is $average <br>";
    echo "Remarks: D";
} else if ($average > 0) {
    echo "Your Average is $average <br>";
    echo "Remarks: F";
} else {
    echo "Invalid Output";
}