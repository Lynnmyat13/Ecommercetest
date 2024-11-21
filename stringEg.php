<?php
$str1 = "Inle Lake is a freshwater lake located in the
Nyaungshwe Township of Taunggyi District of Shan
State, part of Shan Hills in Myanmar (Burma).";
echo $str1;
echo "<br>";
echo "<br>";
echo "The length of string is ".strlen($str1);
echo "<br>";
echo "<br>";
echo "The total number of characters in this string is ".strlen(str_replace(" ","",$str1));
echo "<br>";
echo "<br>";
echo "The total number of words in this string is ".str_word_count($str1);
echo "<br>";
echo "<br>";
echo strtoupper($str1);
echo "<br>";
echo "<br>";
echo strtolower($str1);
echo "<br>";
echo "<br>";
echo ucwords($str1);
echo "<br>";
echo "<br>";
echo lcfirst($str1);



?>