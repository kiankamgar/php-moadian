<?php

namespace KianKamgar\MoadianPhp\Helpers;

use JetBrains\PhpStorm\Pure;

class VerhoeffAlgorithm
{
    private array $multiplicationTable = [
        [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
        [1, 2, 3, 4, 0, 6, 7, 8, 9, 5],
        [2, 3, 4, 0, 1, 7, 8, 9, 5, 6],
        [3, 4, 0, 1, 2, 8, 9, 5, 6, 7],
        [4, 0, 1, 2, 3, 9, 5, 6, 7, 8],
        [5, 9, 8, 7, 6, 0, 4, 3, 2, 1],
        [6, 5, 9, 8, 7, 1, 0, 4, 3, 2],
        [7, 6, 5, 9, 8, 2, 1, 0, 4, 3],
        [8, 7, 6, 5, 9, 3, 2, 1, 0, 4],
        [9, 8, 7, 6, 5, 4, 3, 2, 1, 0]
    ];

    private array $permutationTable = [
        [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
        [1, 5, 7, 6, 2, 8, 3, 0, 9, 4],
        [5, 8, 0, 3, 7, 9, 6, 1, 4, 2],
        [8, 9, 1, 6, 0, 4, 3, 5, 2, 7],
        [9, 4, 5, 3, 1, 2, 6, 8, 7, 0],
        [4, 2, 8, 6, 5, 7, 3, 9, 0, 1],
        [2, 7, 9, 3, 8, 0, 6, 4, 1, 5],
        [7, 0, 4, 6, 9, 1, 3, 2, 5, 8]
    ];

    private array $inverseTable = [0, 4, 3, 2, 1, 5, 6, 7, 8, 9];

    /**
     * Generate check digit
     *
     * @param $num
     * @return string
     */
    #[Pure]
    public function generateCheckDigit($num): string
    {
        $c = 0;
        $myArray = $this->stringToReversedIntArray($num);

        for ($i = 0; $i < count($myArray); $i++) {

            $c = $this->multiplicationTable[$c][$this->permutationTable[(($i + 1) % 8)][$myArray[$i]]];
        }

        return $this->inverseTable[$c];
    }

    /**
     * Validate check digit
     *
     * @param $num
     * @return bool
     */
    #[Pure]
    public function validateCheckDigit($num): bool
    {
        $c = 0;
        $myArray = $this->stringToReversedIntArray($num);

        for ($i = 0; $i < count($myArray); $i++) {

            $c = $this->multiplicationTable[$c][$this->permutationTable[($i % 8)][$myArray[$i]]];
        }

        return ($c == 0);
    }

    /**
     * Convert string to reversed int array
     *
     * @param $num
     * @return array
     */
    private function stringToReversedIntArray($num): array
    {
        $myArray = [];

        for ($i = 0; $i < strlen($num); $i++) {

            $myArray[$i] = (int)$num[$i];
        }

        return array_reverse($myArray);
    }
}