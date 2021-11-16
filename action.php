<?php
if (isset($_POST['submit'])){
    $contents=$_POST['_contents'];
}

$file=fopen("ooc_website.txt", "w");
fwrite($file, $contents);
fclose($file);

system("main.exe");

if ($query_does_not_execute){
    $errcode = "error_code=003";
}

$referer=$_SERVER['HTTP_REFERER'];

if ($errcode){
    if (strpos($referer, '?') === false){
        $referer .= "?";
    }
    header("Location: $referer&$errcode");
}
else{
    header("Location: $referer");
}
exit;
?>
