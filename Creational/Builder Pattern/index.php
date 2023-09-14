<?php include "inc/header.php" ?>
Builder pattern builds a complex object using simple objects and using a step by step approach. This type of design pattern comes under creational pattern as this pattern provides one of the best ways to create an object.
<br>
A Builder class builds the final object step by step. This builder is independent of other objects.

<hr>
<h1>Builder Pattern</h1>
<hr>
<?php

// Product class
class Product
{
    private $name;
    private $size;
    private $color;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function show()
    {
        echo "Product: {$this->name}, Size: {$this->size}, Color: {$this->color}\n";
    }
}

// Builder interface
interface ProductBuilder
{
    public function build();
    public function setName($name);
    public function setSize($size);
    public function setColor($color);
}

// Concrete Builder
class ConcreteProductBuilder implements ProductBuilder
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function setName($name)
    {
        $this->product->setName($name);
    }

    public function setSize($size)
    {
        $this->product->setSize($size);
    }

    public function setColor($color)
    {
        $this->product->setColor($color);
    }

    public function build()
    {
        return $this->product;
    }
}

// Director
class Director
{
    public function buildProduct(ProductBuilder $builder)
    {
        $builder->setName("Sample Product");
        $builder->setSize("Medium");
        $builder->setColor("Blue");
    }
}

// Client code
$builder = new ConcreteProductBuilder();
$director = new Director();
$director->buildProduct($builder);
$product = $builder->build();
$product->show();


?>

<?php include "inc/footer.php" ?>