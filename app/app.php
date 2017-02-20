<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Inventory.php";

    $app = new Silex\Application();

    $server = 'mysql:host=localhost:8889;dbname=inventory_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('inventory' => Inventory::getAll()));
    });

    $app->get("/inventory", function() use ($app) {
        return $app['twig']->render('inventory.html.twig', array('inventory' =>Inventory::getAll()));
    });

    $app->post("/inventory", function() use ($app) {
        $newItem = new Inventory($_POST['description'],$_POST['price']);
        $newItem->save();
        return $app['twig']->render('inventory.html.twig', array('inventory'=>Inventory::getAll()));

    });
    $app->post("/delete_items", function() use ($app) {

        Inventory::deleteAll();
        return $app['twig']->render('inventory.html.twig', array('inventory'=>Inventory::getAll()));

    });
    return $app;

?>
