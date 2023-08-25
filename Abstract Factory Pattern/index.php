<?php include "inc/header.php" ?>

Abstract Factory patterns work around a super-factory which creates other factories. This factory is also called as factory of factories. This type of design pattern comes under creational pattern as this pattern provides one of the best ways to create an object.

In Abstract Factory pattern an interface is responsible for creating a factory of related objects without explicitly specifying their classes. Each generated factory can give the objects as per the Factory pattern.
<hr />
<h1>Abstract Factory patterns</h1>
<hr />
<?php
class Car
{
    function getName(){
        echo "My name is car\n";
    }
}

class Truck
{
    function getName(){
        echo "My Name is Truck\n";
    }
}

abstract class VFactory
{
    abstract function create();
}

class CarFactory extends VFactory
{
    function create()
    {
        return new Car();
    }
}

class TruckFactory extends VFactory
{
    function create()
    {
        return new Truck();
    }
}

class VehicleFactory
{
    function getVehicle($type = 'car')
    {
        if ('car' == $type) {
            return new CarFactory();
        } else if ('truck' == $type) {
            return new truckFactory();
        }
    }
}


$vf = new VehicleFactory();
$tf = $vf->getVehicle('truck');
$truck = $tf->create();
$truck->getName();


?>

<?php include "inc/footer.php" ?>