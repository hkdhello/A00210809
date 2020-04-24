<?php

class Blog extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    /*
     * http://localhost/
     */
    function Index () {
        $this->view("template/header");
        $this->view("main/index");
        $this->view("template/footer");
        
    }

    function Read($blogId) {
        echo("This is the blog you picked! " . $blogId);

        // create blogModel
        // lookup blog id
        // get blog details
        // fill in template with record
    }

    function Create() {

        // check if authenticated
        // if yes, show blog create form
        // if no, redirect out
        // collect blog information
        // don't forget the CSRF token, Valdaidate.
        // create blogmodel
        // save the blog entry
    }
}
?>