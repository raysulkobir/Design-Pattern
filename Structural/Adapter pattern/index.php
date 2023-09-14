<?php include "inc/header.php" ?>

Adapter pattern works as a bridge between two incompatible interfaces. This type of design pattern comes under structural pattern as this pattern combines the capability of two independent interfaces.
<br />
This pattern involves a single class which is responsible to join functionalities of independent or incompatible interfaces. A real life example could be a case of card reader which acts as an adapter between memory card and a laptop. You plugin the memory card into card reader and card reader into the laptop so that memory card can be read via laptop.
<br />
We are demonstrating use of Adapter pattern via following example in which an audio player device can play mp3 files only and wants to use an advanced audio player capable of playing vlc and mp4 files.
<hr />
<h1>Adapter pattern</h1>
<hr />
<?php


// Target Interface
interface Notification
{
    public function send($message);
}

// Adaptee (Legacy Notification System)
class LegacyNotification
{
    public function sendNotification($content)
    {
        echo "Legacy notification sent: $content\n";
    }
}

// Adapter
class NotificationAdapter implements Notification
{
    protected $legacyNotification;

    public function __construct(LegacyNotification $legacyNotification)
    {
        $this->legacyNotification = $legacyNotification;
    }

    public function send($message)
    {
        // Adapt the call to the legacy system's method
        $this->legacyNotification->sendNotification($message);
    }
}

// New Notification System
class NewNotification implements Notification
{
    public function send($message)
    {
        echo "New notification sent: $message\n";
    }
}

// Client Code
function sendNotification(Notification $notification, $message)
{
    $notification->send($message);
}

// Using the Adapter Pattern
$legacyNotification = new LegacyNotification();
$legacyAdapter = new NotificationAdapter($legacyNotification);
$newNotification = new NewNotification();

sendNotification($legacyAdapter, "This is a legacy notification.");
sendNotification($newNotification, "This is a new notification.");



?>

<?php include "inc/footer.php" ?>