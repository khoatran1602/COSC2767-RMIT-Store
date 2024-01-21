<?php
use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase {
    public function testDatabaseConnection() {
        $link = mysqli_connect(
            "54.146.26.230:8081",
            "db_admin",
            "rmit_password",
            "rmit_store_db"
        );



        $this->assertInstanceOf(mysqli::class, $link);
        // Checks if $link is an instance of the mysqli class,
        // which implies a successful database connection.
    }
}
