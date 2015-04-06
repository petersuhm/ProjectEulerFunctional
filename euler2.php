<?php

function even($list)
{
    return array_values(array_filter($list, function($term)
    {
        return $term % 2 === 0;
    }));
}

function createFibonacciSequence($limit, $sequence = [1, 2])
{
    $length = count($sequence);
    $nextTerm = $sequence[$length-1] + $sequence[$length-2];

    if ($nextTerm < $limit) {
        $sequence[] = $nextTerm;
        return createFibonacciSequence($limit, $sequence);
    }

    return $sequence;
}

echo "Sum: " . array_sum(even(createFibonacciSequence(4000000))) . "\n\n";

echo "Tests:\n\n";

require_once 'TestFrameworkInATweet.php';
it('creates a sequence of Fibonacci numbers not exceeding 100', createFibonacciSequence($limit = 100) === [1, 2, 3, 5, 8, 13, 21, 34, 55, 89]);
it('creates a sequence of Fibonacci numbers not exceeding 250', createFibonacciSequence($limit = 250) === [1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233]);
it('finds even valued terms in a list', even([1, 2, 3, 5, 8, 13, 21, 34, 55, 89]) === [2, 8, 34]);
done();
