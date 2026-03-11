<?php

$values = [
    "1234",
    'testing',
    'wency',
    'embarassing',
];

// foreach ($values as $value) {
//     echo calculate($value);
//     echo "<br>";
// }

for ($i = 0; $i < count($values); $i++) {
    echo calculate($values[$i]);
    echo "<br>";
}

function calculate($value) {
    $valueLength = strlen($value);
    $half = round($valueLength / 2);

    $astHalf = str_repeat('*', $half);
    $_asterisk = str_repeat('*', $valueLength + ($half * 2));

    echo $_asterisk . '<br>';
    echo $astHalf . $value . $astHalf . '<br>';
    echo $_asterisk . '<br>';
}
