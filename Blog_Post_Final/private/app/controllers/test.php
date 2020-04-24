<?php

class Test extends Controller {

    function __construct() {
        parent::__construct();
    }

    function Index () {
        $this->view("template/header");
        // print_r($_SESSION);
        $is_auth = isset($_SESSION["username"]);
        
        if ($is_auth) {
            $this->view("test/auth");
        } else {
            $this->view("test/noauth");
        }
        // $this->view("test/test");
        $this->view("template/footer");
    }

    function parameterTest($param) {
        echo($param);
    }

    function Login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $post_csrf = htmlentities($_POST["csrf"]);
            $cook_csrf = htmlentities($_COOKIE["csrf"]);
            $csrf = $_SESSION["csrf"];

            if ($csrf == $post_csrf && $csrf == $cook_csrf) {
                $this->model("UserModel");
                $cl_name = htmlentities($_POST["username"]);
                $cl_pass = htmlentities($_POST["password"]);

                $auth = $this->UserModel->authenticateUser($cl_name, $cl_pass);
                if ($auth) {
                    $page = $this->buildRelativeUrl($_SERVER['HTTP_REFERER'], 3);
                    
                    if ($this->currentUrl == $page) {
                        $page = "/";
                    }

                    header("location: " . $page);
                } else {
                    echo("Not Authenticated");
                }
            } else {
                echo("bad csrf");
            }
        } else {
            $csrf = random_int(10000, 100000000);
            // echo($csrf);
            $_SESSION['csrf'] = $csrf;
            setcookie("csrf", $csrf);
            $this->view("test/login", array("csrf" => $csrf));
        }
    }

    function Logout() {
        session_unset();
        session_destroy();
        $_SESSION = Array();

        $page = $this->buildRelativeUrl($_SERVER['HTTP_REFERER'], 3);
                    
        if ($this->currentUrl == $page) {
            $page = "/";
        }

        header("location: " . $page);
    }

}

?>