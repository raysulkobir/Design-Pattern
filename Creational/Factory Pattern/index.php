
<?php

// Product interface
interface Product
{
    public function getName();
}

// Concrete product classes
class ConcreteProductA implements Product
{
    public function getName()
    {
        return "Product A";
    }
}

class ConcreteProductB implements Product
{
    public function getName()
    {
        return "Product B";
    }
}

// Factory interface
interface Factory
{
    public function createProduct();
}

// Concrete factory classes
class ConcreteFactoryA implements Factory
{
    public function createProduct()
    {
        return new ConcreteProductA();
    }
}

class ConcreteFactoryB implements Factory
{
    public function createProduct()
    {
        return new ConcreteProductB();
    }
}

// Client code
$factoryA = new ConcreteFactoryA();
$productA = $factoryA->createProduct();
echo $productA->getName(); // Output: Product A

$factoryB = new ConcreteFactoryB();
$productB = $factoryB->createProduct();
echo $productB->getName(); // Output: Product B

?>

