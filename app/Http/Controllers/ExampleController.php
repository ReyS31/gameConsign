<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

function batas(String $kata = null)
{
    if ($kata) {
        print_r("<br>" . $kata);
    }
    print_r("<br>");
}

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function anagramTest()
    {

        $defArr = ['kita', 'atik', 'tika', 'aku', 'kia', 'makan', 'kua'];
        $asciiArr = array();

        // Turn word to totalASCII
        foreach ($defArr as $value) {
            $totalASCII = 0;
            for ($i = 0; $i < strlen($value); $i++) {
                // Totalize per ACSII char
                $totalASCII = $totalASCII + ord($value[$i]);
            }
            $asciiArr[$value] = $totalASCII;
        }

        // Sort Assoc Array
        asort($asciiArr);

        // Get Keys
        $sorted = array_keys($asciiArr);

        $tempArr = array();

        $finalArr = array();

        for ($i = 0; $i < count($defArr); $i++) {

            // First array
            if (count($finalArr) < 1 && count($tempArr) < 1) {
                array_push($tempArr, $sorted[$i]);
                continue;
            }

            // Get first value from temporary array
            $firstTemp = reset($tempArr);

            // If both ASCII values arent same
            if ($asciiArr[$sorted[$i]] != $asciiArr[$firstTemp]) {
                array_push($finalArr, $tempArr);
                $tempArr = [];
                array_push($tempArr, $sorted[$i]);
                if (count($defArr) == $i + 1) {
                    array_push($finalArr, $tempArr);
                }
            }

            // If same ASCII values
            if ($asciiArr[$sorted[$i]] == $asciiArr[$firstTemp]) {
                array_push($tempArr, $sorted[$i]);
            }

        }
        rsort($finalArr);
        return json_encode($finalArr);
    }
}
