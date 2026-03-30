<?php
include 'collatz_stats.php';

// default values
$from = 1;
$to = 100;

// get user input
if (isset($_GET['from']) && isset($_GET['to'])) {
    $from = (int)$_GET['from'];
    $to = (int)$_GET['to'];
}

// fix order if needed
if ($from > $to) {
    $temp = $from;
    $from = $to;
    $to = $temp;
}

// create object
$stats = new CollatzStats(10);

// generate histogram
$stats->generateHistogram($from, $to);

// get statistics
$statsData = $stats->statistics();

// capture histogram output
ob_start();
$stats->printHistogram();
$histogram = ob_get_clean();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Collatz Histogram</title>
</head>

<body>

<h2>Collatz Histogram</h2>

<form method="get">
    From:
    <input type="number" name="from" value="<?php echo $from; ?>" required>

    To:
    <input type="number" name="to" value="<?php echo $to; ?>" required>

    <button type="submit">Generate</button>
</form>

<hr>

<p>
    Showing iteration distribution from <b><?php echo $from; ?></b> to <b><?php echo $to; ?></b>
</p>

<p>
    Total numbers analyzed: <b><?php echo ($to - $from + 1); ?></b>
</p>

<p>
    Number with max iterations: 
    <b><?php echo $statsData["Number with Max Iterations"]; ?></b>
</p>

<hr>

<pre>
<?php echo $histogram; ?>
</pre>

<hr>

<p><small>Assignment 3 – PHP Inheritance & Histogram</small></p>

</body>
</html>