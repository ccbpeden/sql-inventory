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

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM tasks;");
        }
    }
?>
