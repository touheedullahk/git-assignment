<html>
<body>

<h2>Collatz 3x + 1 program</h2>

<form method="post">

Enter number :
<input type="number" name="num">

<input type="submit" value="Run">

</form>

<?php

if(isset($_POST["num"]))
{

$n = $_POST["num"];

echo "<br>";
echo "Start number : ".$n;
echo "<br><br>";

echo "Sequence : ";
echo $n;

$count = 0;

while($n != 1)
{

 if($n % 2 == 0)
 {

 $n = $n / 2;

 }

 else
 {

 $n = 3*$n + 1;

 }

 echo " -> ".$n;

 $count = $count + 1;

}

echo "<br><br>";
echo "Steps = ".$count;

}

?>

</body>
</html>