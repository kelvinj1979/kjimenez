<?php

require_once "connexion.php";

Class ModelPortfolio {

    /*=============================================
    SHOW PORTFOLIO CONTENT  
    =============================================*/
    static public function mdlShowPortfolio($table) {

        $stmt = Connexion::connect()->prepare("SELECT * FROM $table");

        $stmt -> execute();

        $result = $stmt -> fetch();

        $stmt = null;

        return $result;

    }

    /*=============================================
    SHOW PROJECTS CONTENT  
    =============================================*/
    static public function mdlShowProjects($table, $start, $count) {

        $stmt = Connexion::connect()->prepare("SELECT * FROM $table LIMIT $start, $count");

        $stmt -> execute();

        $result = $stmt -> fetchAll();

        $stmt = null;

        return $result;

    }

    /*=============================================
    SHOW EXPERIENCE CONTENT  
    =============================================*/
    static public function mdlShowExperience($table) {

        $stmt = Connexion::connect()->prepare("SELECT * FROM $table order by experience_id desc");

        $stmt -> execute();

        $result = $stmt -> fetchAll();

        $stmt = null;

        return $result;

    }

    /*=============================================
    SHOW EDUCATION CONTENT  
    =============================================*/
    static public function mdlShowEducation($table) {

        $stmt = Connexion::connect()->prepare("SELECT * FROM $table order by education_id desc");

        $stmt -> execute();

        $result = $stmt -> fetchAll();

        $stmt = null;

        return $result;

    }
}
