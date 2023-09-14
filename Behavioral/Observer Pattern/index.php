<?php
    include "inc/header.php";
?>

Observer pattern is used when there is one-to-many relationship between objects such as if one object is modified, its depenedent objects are to be notified automatically. Observer pattern falls under behavioral pattern category.
<hr />
<h1> Observer Pattern</h1>
<hr />


<div class="para">
    <?php
    interface Observer
    {
        public function message();
    }

    class Skype implements Observer
    {
        public function message()
        {
            echo "Message Form skype <br>";
        }
    }

    class Gtalk implements Observer
    {
        public function message()
        {
            echo "Message Form gTalk..<br>";
        }
    }

    class Observable
    {
        private $observers = array();

        public function register($object)
        {
            if ($object instanceof Observer) {
                $this->observers[] = $object;
            } else {
                echo "Object should be implement interface ...<br>";
            }
        }
        public function stateChange()
        {
            foreach ($this->observers as $observer) {
                $observer->message();
            }
        }
    }

    $obj = new Observable();
    $gt = new Gtalk();
    $sk = new Skype();
    // $s = new stdClass();

    $obj->register($sk);
    $obj->register($gt);
    // $obj->register($s);
    $obj->stateChange()


    ?>


</div>

<?php include "inc/footer.php"; ?>