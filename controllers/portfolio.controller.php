<?php

class ControllerPortfolio {

    /*=============================================
    SHOW PORTFOLIO CONTENT
    =============================================*/

    static public function ctrShowPortfolio(){

        $table = "aboutme";

        $response = ModelPortfolio::mdlShowPortfolio($table);

        return $response;

    }

    /*=============================================
    SHOW PROJECT CONTENT
    =============================================*/

    static public function ctrShowProject($start, $count){

        $table = "projects";

        $response = ModelPortfolio::mdlShowProjects($table, $start, $count);

        return $response;

    }

    /*=============================================
    SHOW EXPERIENCE CONTENT
    =============================================*/

    static public function ctrShowExperience(){

        $table = "experience";

        $response = ModelPortfolio::mdlShowExperience($table);

        return $response;

    }

    /*=============================================
    SHOW EDUCATION CONTENT
    =============================================*/

    static public function ctrShowEducation(){

        $table = "education";

        $response = ModelPortfolio::mdlShowEducation($table);

        return $response;

    }

}