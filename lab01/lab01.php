<!DOCTYPE html>

<html>
	<body>

	<?php
  //VARS
  $x = 86;
  $y = 74;
  //ENDVARS

  echo "PHP Arithmetic Operators";
  echo $x + $y;
  echo "<BR>";
  echo $x - $y;
  echo "<BR>";
  echo $x * $y;
  echo "<BR>";
  echo $x / $y;
  echo "<BR>";
  echo $x % $y;
  echo "<BR>";
  echo "<BR>";
  echo "PHP Comparison Operators";
  echo $x == $y;
  echo "<BR>";
  echo $x === $y;
  echo "<BR>";
  echo $x != $y;
  echo "<BR>";
  echo  $x <> $y;
  echo "<BR>";
  echo $x !== $y;
  echo "<BR>";
  echo $x > $y;
  echo "<BR>";
  echo $x < $y;
  echo "<BR>";
  echo $x >= $y;
  echo $x <= $y;
  echo "<BR>";
  echo "<BR>";
  echo "PHP Logical Operators";
  echo "<BR>";
  echo $x and $y;
  echo "<BR>";
  echo $x or $y;
  echo "<BR>";
  echo $x xor $y;
  echo "<BR>";
  echo $x && $y;
  echo "<BR>";
  echo $x || $y;
  echo !$x;
  echo "<BR>";
  echo "<BR>";
  echo "PHP Increment / Decrement Operators";
  echo "<BR>";
  $x = 86;
  echo ++$x;
  echo "<BR>";
  $x = 86;
  echo $x++;
  echo "<BR>";
  $x = 86;
  echo --$x;
  echo "<BR>";
  $x = 86;
  echo $x--;
  echo "<BR>";
  echo "<BR>";
  echo "PHP Array Operators";
  echo "<BR>";
  $x = array("a" => "red", "b" => "green");
  $y = array("c" => "blue", "d" => "yellow", "e" => "red");
  print_r($x + $y);
	echo "<BR>";
	print_r($x == $y);
	echo "<BR>";
	print_r($x === $y);
	echo "<BR>";
	print_r($x != $y);
	echo "<BR>";
	print_r($x <> $y);
	echo "<BR>";
	print_r($x !== $y);
  echo "<BR>";
  echo "<BR>";
  echo "PHP String Operators";
  echo "<BR>";
  $txt1 = "Hi";
  $txt2 = "Bye";
  echo $txt1.$txt2;
  echo "<BR>";
  $txt1.=$txt2;
  echo $txt1;
	?>

	</body>
</html>
