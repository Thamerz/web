<?php
$action = "welcome";
function includefile($file){
    $replace = str_replace("../","",$file);
    $replace = str_replace(".../","",$replace);
    include($replace);
}
function writelogs($error){
    $tmp_file="";
    if (is_writable(sys_get_temp_dir())) { 
        $tmp_file = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "sess_" . md5($error);
        }
    else {
        echo "Sorry We can't save logs";
    }
    if($tmp_file != "" && $tmp_file != NULL){
        if(file_put_contents($tmp_file,$error)){
            echo "[+] Logs saved to ".$tmp_file;
        }
    }
}
function welcome($name){
    echo "welcome to my website ".$name;
}
$name = $_GET['name'];
if($name == ""){
    echo "Please Put Your Name";
}
else{
extract($_GET);
call_user_func($action,$name);
}
?>
