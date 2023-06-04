<?php
$rotate = true;
$vardate = $_POST["textfield"];
touch("currentdate.txt");
$filename = "currentdate.txt";
//$vardate = date(j, time());

if ($rotate) {
//if the date has changed, create a new random number to the variable $test
($cf = fopen($filename, "w")) or die("The file could not be opened, please check your directory permissions");
fwrite($cf, $vardate);
fclose($cf);
$cf = fopen($filename, "r");
$currentday = fread($cf, 3);
fclose($cf);
$test = rand(1,100);
$rotate = false;
}

if ($currentday != $vardate) {
$rotate = true;
}

echo ("today is $vardate, and the test date is $currentday, and the random number is $test");
?>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER[php_SELF] ?>">
  <input type="text" name="textfield" />
  <input type="submit" name="submitbutton" />
</form>