<?php
    if(!isset($_SESSION)){
        session_start();
    }
    
    if((!isset($_SESSION["nome"])) && (!isset($_SESSION["adm"]))){
        $_SESSION["nome"] = "padrão";
        $_SESSION["adm"] = 2;

        // header('location:../index.php');
        // exit();        
    }