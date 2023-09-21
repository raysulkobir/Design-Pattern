<?php
// Concrete Class
class Vehicle 
{
    public $model;

    public $enginesCount;

    public $type;

    const CAR = "Car";

    const BUS = "Bus";

    const TRAILER = "Trailer";

    public function __construct()
    {

    }
}


// Builder interface
interface VehicleBuilderInterface
{
    public function setModel();

    public function setEnginesCount();

    public function setType();

    public function getVehicle();
}


// Builder implementations
class KiaCarBuilder implements VehicleBuilderInterface
{
    private $vehicle;
    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }
    public function setModel()
    {
        $this->vehicle->model = "Kia";
    }
    public function setEnginesCount()
    {
        $this->vehicle->enginesCount = 1;
    }
    public function setType()
    {
        $this->vehicle->type = Vehicle::CAR;
    }
    public function getVehicle()
    {
        return $this->vehicle;
    }
}

class VehicleDirector
{
    public function build(VehicleBuilderInterface $builder)
    {
        $builder->setModel("model");
        $builder->setEnginesCount('eng');
        $builder->setType('car');

        return $builder->getVehicle();
    }
}

// $kiaCarBuilder = new KiaCarBuilder(new Vehicle());
// $vehicleDirector = new VehicleDirector();
// print_r($vehicleDirector->build($kiaCarBuilder));

$kiaCar = (new VehicleDirector())->build(new KiaCarBuilder(new Vehicle()));
print_r($kiaCar);