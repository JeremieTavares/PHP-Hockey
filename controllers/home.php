<?php
    require_once(__DIR__ . '/../controllers/controller.php');

    class HomeController extends Controller {
        function handle($get) {
            require(__DIR__ . '/../views/home.php');
        }
    };
?>