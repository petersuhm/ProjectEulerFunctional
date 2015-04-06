<?php

function findMultiplesOfThreeOrFiveBelow($limit)
{
    $numbers = range(1, $limit - 1);

    return array_values(array_filter($numbers, function($number) {
        return $number % 3 === 0 or $number % 5 === 0;
    }));
}

echo 'Sum: ' . array_sum(findMultiplesOfThreeOrFiveBelow(1000)) . "\n\n";
echo "Tests:\n\n";

require_once 'assert.php';
it('lists all multiples of 3 or 5 below 10', findMultiplesOfThreeOrFiveBelow(10) === [3, 5, 6, 9]);
it('lists all multiples of 3 or 5 below 15', findMultiplesOfThreeOrFiveBelow(15) === [3, 5, 6, 9, 10, 12]);
done();
