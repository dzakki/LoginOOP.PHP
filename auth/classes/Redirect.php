<?php

Class Redirect{

    public static function to($nama){
        header('location:'.$nama.'.php');
    }

}

?>