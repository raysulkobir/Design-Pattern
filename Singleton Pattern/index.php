<?php include "inc/header.php" ?>

Singleton pattern is one of the simplest design patterns in php. This type of design pattern comes under creational pattern as this pattern provides one of the best ways to create an object.
<br/>
This pattern involves a single class which is responsible to create an object while making sure that only single object gets created. This class provides a way to access its only object which can be accessed directly without need to instantiate the object of the class.
<hr />
    <h1>Singleton</h1>
<hr />
    <?php


    class Singleton
    {
        private static $instance = null;
        public $name;

        function __construct($name)
        {
            $this->name = $name;
        }

        static function getInstance($name = null)
        {
            if (empty(self::$instance)) {
                self::$instance = new Singleton($name);
            }
            return self::$instance;
        }


        public function sayHello()
        {
            echo "Hello from Singleton! my name is $this->name <br>";
        }
    }

    $s1 =  Singleton::getInstance("Md.Raysul kobir");
    $s1->sayHello();

    $s2 =  Singleton::getInstance('Md.Sajid');
    $s2->sayHello();


    ?>

    <?php include "inc/footer.php" ?>