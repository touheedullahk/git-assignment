<?php

include 'collatz_class.php';

// Create object (constructor runs automatically)
$collatz = new Collatz(25);

// Calculate interval 25–100 (you can change to 25–24658)
$collatz->calculateInterval(25, 24658);

// Get statistics
$stats = $collatz->statistics();

// Print results
echo "<pre>";
print_r($stats);
echo "</pre>";
