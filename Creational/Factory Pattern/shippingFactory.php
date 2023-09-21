<?php
// PaymentGatewayInterface.php
interface PaymentGatewayInterface
{
    public function processPayment($amount);
}

// PayPalGateway.php
class PayPalGateway implements PaymentGatewayInterface
{
    public function processPayment($amount)
    {
        echo "Implement PayPal payment processing logic here";
    }
}

// StripeGateway.php
class StripeGateway implements PaymentGatewayInterface
{
    public function processPayment($amount)
    {
        echo "Implement Stripe payment processing logic here";
    }
}

// PaymentGatewayFactory.php
class PaymentGatewayFactory
{
    public static function createPaymentGateway($gatewayType)
    {
        switch ($gatewayType) {
            case 'paypal':
                return new PayPalGateway();
            case 'stripe':
                return new StripeGateway();
            default:
                throw new \InvalidArgumentException("Invalid gateway type: $gatewayType");
        }
    }
}


$gatewayType = 'stripe'; // or 'stripe'
$paymentGateway = PaymentGatewayFactory::createPaymentGateway($gatewayType);
return $paymentGateway->processPayment($amount = 20);
