<?php

class Connexion{

    static public function connect(){

      
        $link = new PDO("mysql:host=localhost;dbname=portfolio",
                        "root",
                        "");

        $link -> exec("set names utf8");

        return $link;

    }
}