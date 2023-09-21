<?php
// DatabaseConnection.php
class DatabaseConnection
{
    private $connection;

    public function __construct($host, $username, $password, $database)
    {
        $this->connection = new mysqli($host, $username, $password, $database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($sql)
    {
        return $this->connection->query($sql);
    }

    public function close()
    {
        $this->connection->close();
    }
}

// ConnectionPool.php
class ConnectionPool
{
    private $connections = [];
    private $maxConnections;

    public function __construct($maxConnections)
    {
        $this->maxConnections = $maxConnections;
    }

    public function getConnection($host, $username, $password, $database)
    {
        if (count($this->connections) < $this->maxConnections) {
            $this->connections[] = new DatabaseConnection($host, $username, $password, $database);
        }

        return array_pop($this->connections);
    }

    public function releaseConnection(DatabaseConnection $connection)
    {
        $this->connections[] = $connection;
    }
}

// Usage
$connectionPool = new ConnectionPool(5); // Create a pool with a maximum of 5 connections

// Acquire connections from the pool and use them
$connection1 = $connectionPool->getConnection('localhost', 'username', 'password', 'database');
$result1 = $connection1->query('SELECT * FROM table1');
$connectionPool->releaseConnection($connection1);

$connection2 = $connectionPool->getConnection('localhost', 'username', 'password', 'database');
$result2 = $connection2->query('SELECT * FROM table2');
$connectionPool->releaseConnection($connection2);

// Close connections when done
$connection1->close();
$connection2->close();
