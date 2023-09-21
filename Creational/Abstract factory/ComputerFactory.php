<?php

// Abstract Factory Interface
interface ComputerFactory
{
    public function createComputer(): Computer;
    public function createMonitor(): Monitor;
}

// Abstract Product Interfaces
interface Computer
{
    public function displayInfo(): string;
}

interface Monitor
{
    public function displayInfo(): string;
}

// Concrete Products
class GamingLaptop implements Computer
{
    public function displayInfo(): string
    {
        return "Gaming Laptop";
    }
}

class BusinessLaptop implements Computer
{
    public function displayInfo(): string
    {
        return "Business Laptop";
    }
}

class GamingMonitor implements Monitor
{
    public function displayInfo(): string
    {
        return "Gaming Monitor";
    }
}

class BusinessMonitor implements Monitor
{
    public function displayInfo(): string
    {
        return "Business Monitor";
    }
}

// Concrete Factory for Laptops
class LaptopFactory implements ComputerFactory
{
    public function createComputer(): Computer
    {
        return new GamingLaptop(); // Or return new BusinessLaptop();
    }

    public function createMonitor(): Monitor
    {
        return new BusinessMonitor(); // Or return new GamingMonitor();
    }
}

// Concrete Factory for Desktops
// class DesktopFactory implements ComputerFactory
// {
//     public function createComputer(): Computer
//     {
//         return new GamingDesktop(); // Or return new BusinessDesktop();
//     }

//     public function createMonitor(): Monitor
//     {
//         return new GamingMonitor(); // Or return new BusinessMonitor();
//     }
// }

// Usage example
$factory = new LaptopFactory(); // Change to DesktopFactory for different type

$computer = $factory->createComputer();
$monitor = $factory->createMonitor();

echo $computer->displayInfo(); // Outputs "Gaming Laptop" or "Business Laptop"
echo $monitor->displayInfo();  // Outputs "Business Monitor" or "Gaming Monitor"
