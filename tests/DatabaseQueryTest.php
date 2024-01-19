 <?php


class DatabaseQueryTest extends \PHPUnit\Framework\TestCase {
    public function testDatabaseConnection()
    {
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
            $query = "SELECT * FROM store";
            $result = mysqli_query($mysqli, $query);
            $this->assertNotEmpty($result);
        } else {
            // Connection attempt failed within the specified timeout
            $this->fail('Database connection attempt timed out');
        }
    }

    
    public function testInvalidQueryThrowsException()
    {
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
        $this->expectException(PDOException::class);
        // Check if the connection was successful
        if ($link) {
            $invalidQuery = "SELECT * FROM HHSJJ";
            $mysqli->query($invalidQuery);
        } else {
            // Connection attempt failed within the specified timeout
            $this->fail('Database connection attempt timed out');
        }
    }
}