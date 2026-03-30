<?php

class Collatz
{
    private $startNumber;
    protected $results = [];

    public function __construct($number)
    {
        $this->startNumber = $number;
    }

    public function calculate($n)
    {
        $iterations = 0;
        $maxValue = $n;
        $current = $n;

        while ($current != 1) {

            if ($current % 2 == 0) {
                $current = $current / 2;
            } else {
                $current = 3 * $current + 1;
            }

            if ($current > $maxValue) {
                $maxValue = $current;
            }

            $iterations++;
        }

        return [
            "iterations" => $iterations,
            "maxValue" => $maxValue
        ];
    }

    public function calculateInterval($from, $to)
    {
        for ($i = $from; $i <= $to; $i++) {
            $this->results[$i] = $this->calculate($i);
        }
    }

    public function statistics()
    {
        $maxIterations = 0;
        $minIterations = PHP_INT_MAX;
        $maxReachedValue = 0;

        $numberMaxIterations = 0;
        $numberMinIterations = 0;
        $numberMaxValue = 0;

        foreach ($this->results as $number => $data) {

            if ($data["iterations"] > $maxIterations) {
                $maxIterations = $data["iterations"];
                $numberMaxIterations = $number;
            }

            if ($data["iterations"] < $minIterations) {
                $minIterations = $data["iterations"];
                $numberMinIterations = $number;
            }

            if ($data["maxValue"] > $maxReachedValue) {
                $maxReachedValue = $data["maxValue"];
                $numberMaxValue = $number;
            }
        }

        return [
            "Number with Max Iterations" => $numberMaxIterations,
            "Number with Min Iterations" => $numberMinIterations,
            "Number with Max Reached Value" => $numberMaxValue
        ];
    }
}
?>