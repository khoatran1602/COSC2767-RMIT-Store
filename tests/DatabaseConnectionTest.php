<?php
use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase {
    public function testDatabaseConnection() {
        // Set a timeout for the database connection attempt (e.g., 5 seconds)
        $timeout = 1.5;

        // Use mysqli_init and mysqli_options to set the connection timeout
        $mysqli = mysqli_init();
        mysqli_options($mysqli, MYSQLI_OPT_CONNECT_TIMEOUT, $timeout);

        // Attempt to connect to the database
        $link = @mysqli_real_connect(
            $mysqli,
            "54.146.26.230:8081",
            "db_admin",
            "rmit_password",
            "rmit_store_db"
        );

        // Check if the connection was successful
        if ($link) {
            $this->assertInstanceOf(mysqli::class, $mysqli);
            mysqli_close($mysqli);
        } else {
            // Connection attempt failed within the specified timeout
            $this->fail('Database connection attempt timed out');
        }
    }
}