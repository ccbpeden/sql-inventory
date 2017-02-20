<?php


    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Inventory.php";

    $server = 'mysql:host=localhost:8889;dbname=inventory_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class InventoryTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Inventory::deleteAll();
        }

        function test_constructor()
        {
            $input_price = 5;
            $input_description = "pokemonster";
            $newInventory = new Inventory($input_description, $input_price);

            $result = array($newInventory->getDescription(), $newInventory->getPrice());

            $this->assertEquals(array("pokemonster", 5), $result);
        }


    }
 ?>
