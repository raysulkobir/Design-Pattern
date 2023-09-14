<?php include "inc/header.php" ?>
    Facade pattern hides the complexities of the system and provides an interface to the client using which the client can access the system. This type of design pattern comes under structural pattern as this pattern adds an interface to existing system to hide its complexities
<hr />
<h1>Facade pattern</h1>
<hr />
<?php
    class SpaceShuttle{
        function powerOn(){
            echo "Power on <br>";
        }

        function checkTemperature(){
            echo "Temperature ok <br>";
        }

        function startEngine(){
            echo "Engine ok <br>";
        }

        function startThrusters(){
            echo "Thrusters ok <br>";
        }
    }



    class SpaceShuttleFacade{
        private $shuttle;

        function __construct(SpaceShuttle $shuttle){
            $this->shuttle = $shuttle;
        }

        function takeOff(){
            $this->shuttle->powerOn();
            $this->shuttle->checkTemperature();
            $this->shuttle->startEngine();
            $this->shuttle->startThrusters();
        }
    }

    $ss = new SpaceShuttle();

    $ssf = new SpaceShuttleFacade($ss);
    $ssf->takeOff();

?>

<?php include "inc/footer.php" ?>