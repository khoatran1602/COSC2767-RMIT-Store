<?php
use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase {
    public function testDatabaseConnection() {
        $link = mysqli_connect(
            "44.195.95.44:8081", #Change this to your server IP address
            "db_admin",
            "rmit_password",
            "rmit_store_db"
        );



        $this->assertInstanceOf(mysqli::class, $link);
        // Checks if $link is an instance of the mysqli class,
        // which implies a successful database connection.
    }
}
