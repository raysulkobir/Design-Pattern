<?php

interface PaymentGatewayFactory
{
    public function createPaymentGateway(): PaymentGateway;
    public function createPaymentProcessor(): PaymentProcessor;
    public function createTransactionManager(): TransactionManager;
}

class PayPalFactory implements PaymentGatewayFactory
{
    public function createPaymentGateway(): PaymentGateway
    {
        return new PayPalGateway();
    }

    public function createPaymentProcessor(): PaymentProcessor
    {
        return new PayPalPaymentProcessor();
    }

    public function createTransactionManager(): TransactionManager
    {
        return new PayPalTransactionManager();
    }
}

interface PaymentGateway
{
    public function processPayment($amount);
}

interface PaymentProcessor
{
    public function charge();
}

interface TransactionManager
{
    public function authorizeTransaction($orderId);
    public function captureTransaction($transactionId);
}

class PayPalGateway implements PaymentGateway
{
    public function processPayment($amount)
    {
        return $amount;
    }
}

class PayPalPaymentProcessor implements PaymentProcessor
{
    public function charge()
    {
        // Charge logic here
        return "Payment charged successfully";
    }
}

class PayPalTransactionManager implements TransactionManager
{
    public function authorizeTransaction($orderId)
    {
        return "orderId {$orderId} authorized";
    }

    public function captureTransaction($transactionId)
    {
        return "transactionId {$transactionId} captured";
    }
}

$paymentGatewayType = 'PayPal'; // Replace with your logic to determine the selected payment gateway

if ($paymentGatewayType === 'PayPal') {
    $factory = new PayPalFactory();
}

$paymentGateway = $factory->createPaymentGateway();
$paymentProcessor = $factory->createPaymentProcessor();
$transactionManager = $factory->createTransactionManager();

// Example usage
$amount = 100;
echo $paymentGateway->processPayment($amount);
echo $paymentProcessor->charge();
echo $transactionManager->authorizeTransaction(123);
echo $transactionManager->captureTransaction(456);
