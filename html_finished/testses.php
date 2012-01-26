<?php
session_start();
if(!empty($_SESSION['user_rank'])){
echo $_SESSION['user_rank'];
}
else{
echo 'geen variabele';
}
?>
