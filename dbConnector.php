<?php

class DbConnector {
    var $theQuery;
    var $link;

    public function __construct() {
        // Get the main settings from the array we just loaded
        $host = 'localhost';
        $db = 'u512651245_capstone';
        $user = 'u512651245_root';
        $pass = '@Sdp12345';

        // Connect to the database
        $this->link = mysqli_connect($host, $user, $pass, $db);

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
    }

    function __destruct() {
        mysqli_close($this->link);
    }

    //*** Function: query, Purpose: Execute a database query ***
    function query($query) {
        $this->theQuery = $query;
        return mysqli_query($this->link, $query);
    }

    //*** Function: fetchArray, Purpose: Get array of query results ***
    function fetchArray($result) {
        return mysqli_fetch_array($result);
    }

    //*** Function: close, Purpose: Close the connection ***
    function close() {
        mysqli_close($this->link);
    }
}

?>
