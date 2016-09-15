<?php

$c = (isset($_GET["choose"])) ? 1 : 0;

$name = $_POST["name"];
if ($c) $name = $_GET["newname"];
$write = array();

$write[] = $_POST["cmdline"];
$cmd = "";

$passed = 0;
foreach($_POST["module-input-text"] as $key=>$val){
	if (empty($val)) continue;
	$ok = (isset($_POST["module-input-check".$key])) ? 1 : 0;
	if ($c && !$ok) continue;
	$write[] = "m->$ok->".$val;
	if ($ok && !$passed) $passed = 1;
	if ($ok) $cmd .= "module add ".$val."\n";
}

if ($passed) $cmd .= "\n";
$passed = 0;
foreach($_POST["export-input-text"] as $key=>$val){
	if (empty($val)) continue;
	$ok = (isset($_POST["export-input-check".$key])) ? 1 : 0;
	if ($c && !$ok) continue;
	$value = chop($_POST["export-text"][$key]);
	$write[] = "e->$ok->".$val."->".$value;
	if ($ok && !$passed && !empty($value)) $passed = 1;
	if ($ok && !empty($value)) $cmd .= "export $val=\"$value\"\n";
}

if ($passed) $cmd .= "\n";

$cmd .= $_POST["cmdline"]." ";

foreach($_POST["flag-input-text"] as $key=>$val){
	if (empty($val)) continue;
	$ok = (isset($_POST["flag-input-check".$key])) ? 1 : 0;
	if ($c && !$ok) continue;
	$value = $_POST["flag-text"][$key];
	//$value = chop($_POST["flag-text"][$key]);
	$write[] = "f->$ok->".$val."->".$value;
	if ($ok){
		if ($value == "")
			$cmd .= "$val ";
		else if ($value == "x")
			$cmd .= "$val=\"\" ";
		else
			$cmd .= "$val=\"$value\" ";
	}
}

echo $cmd;
$write = implode("\n", $write);

$file = file("list.txt");
$file[] = $name;
foreach($file as $key=>$val) $file[$key] = chop($val);
$file = array_unique(array_filter($file));
sort($file);
file_put_contents("./list.txt", implode("\n", $file));
file_put_contents("./configs/".$name, $write);
//echo $write;








exit;
echo "<pre><textarea style='min-height:200px;'>";

$write = implode("\n", $write);
echo $write;


echo "</textarea></pre>";

print_r($_POST);







?>
