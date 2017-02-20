<?php
    Class Inventory
    {
        private $description;
        private $price;
        private $id;


        function __construct($description, $price, $id = null)
        {
            $this->description = $description;
            $this->price = $price;
            $this->id = $id;
        }

        function getDescription()
        {
            return $this->description;
        }

        function getPrice()
        {
            return $this->price;
        }

        function getId()
        {
            return $this->id;
        }

        function setDescription($new_description)
        {
            $this->description = $new_description;
        }

        function setPrice($new_price)
        {
            $this->price = $new_price;
        }

        static function getAll()
        {
            $returned_stuff = $GLOBALS['DB']->query("SELECT * FROM stuff;");
            $stuffs = array();
            foreach($returned_stuff as $stuff){
                $description = $stuff['description'];
                $price = $stuff['price'];
                $id = $stuff['id'];
                $new_inventory = new Inventory($description, $price, $id);
                array_push($stuffs, $new_inventory);
            }
            return $stuffs;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stuff;");
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stuff (description, price) VALUES ('{$this->getDescription()}', '{$this->getPrice()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

    }
?>
