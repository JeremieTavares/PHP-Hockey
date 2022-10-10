<?php
    require_once('./models/dbConnect.php');
    require_once('./controllers/home.php');
    require_once('./controllers/list.php');
    require_once('./controllers/add.php');
    require_once('./controllers/edit.php');
    require_once('./controllers/delete.php');
	
    $db = dbConnect::getMySqlConnection();
	$action = isset($_GET['action']) ? $_GET['action'] : 'home';

    if (isset($_GET['action']))
        $action = $_GET['action'];

    switch ($action) {
        case 'list':
            $controller = new ListController($db);
            break;
        case 'add':
            $controller = new AddController($db);
            break;
        case 'edit':
            $controller = new EditController($db);
            break;
        case 'delete':
            $controller = new DeleteController($db);
            break;
        case 'home':
        default:
            $controller = new HomeController($db);
    }

    if (!empty($_POST))
        $controller->handlePost($_GET, $_POST);

    else
        $controller->handle($_GET);
?>