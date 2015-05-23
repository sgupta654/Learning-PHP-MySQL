<?php
	
//		File in DEMO folder:              errorTesting.php
echo '<h2>Error Testing:</h2>';
/*
echo '<h4>Syntax Errors:</h4>';

$a = 8 * 5;
echo "8 x 5 = ".$a;

echo "<br />";
*/

/*
echo '<h4>Semantic Error:</h4>';

for ($i = 5; $i < 2; $i++) {
	echo $i;
}
echo "<br />";
echo '$i = '.$i."<br />";

echo "<br />";
*/

/*
echo '<h4>Semantic (not Logic) Error:</h4>';

$i = 9;
$test = 3;
echo '$i = '.$i."<br />";
echo '$test = '.$test."<br />";

if ($i == $test) {echo '$i = $test'; } else {echo '$i <> $test'; }
*/


echo '<h4>Logic Error:</h4>';

$ij = 4;
$ji = 2;

echo '$ij = '.$ij."<br />";
echo '$ji = '.$ji."<br />";

if ($ij < $ji) {
	echo '$ij < $ji<br />';
} else if ($ij > $ji) {
	echo '$ij > $ji<br />'; 
} else {
	echo '$ij = $ji<br />';
}

echo "<br />";

echo '<h2>--------- END --------</h2>';

?>