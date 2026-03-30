<?php
include 'collatz_class.php';

class CollatzStats extends Collatz
{
    // constants
    const BIN_SIZE = 10;
    const MAX_BINS = 20;

    protected $histogram = [];

    public function __construct($number)
    {
        parent::__construct($number);
    }

    // histogram function
    public function generateHistogram($from, $to)
    {
        $this->calculateInterval($from, $to);

        // initialize bins
        for ($i = 0; $i < self::MAX_BINS; $i++) {
            $this->histogram[$i] = 0;
        }

        foreach ($this->results as $data) {

            $iterations = $data["iterations"];
            $binIndex = intdiv($iterations, self::BIN_SIZE);

            if ($binIndex >= self::MAX_BINS) {
                $binIndex = self::MAX_BINS - 1;
            }

            $this->histogram[$binIndex]++;
        }
    }

    public function printHistogram()
    {
        echo "<pre>";

        foreach ($this->histogram as $bin => $count) {

            $start = $bin * self::BIN_SIZE;
            $end = ($bin + 1) * self::BIN_SIZE - 1;

            echo "[$start - $end] : ";

            for ($i = 0; $i < $count; $i++) {
                echo "*";
            }

            echo "\n";
        }

        echo "</pre>";
    }
}
?>