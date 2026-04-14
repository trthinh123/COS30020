<?php
class HitCounter {
    private $host;
    private $user;
    private $pswd;
    private $dbnm;
    private $tablename;
    private $conn;

    // Constructor
    public function __construct($host, $user, $pswd, $dbnm, $tablename) {
        $this->host = $host;
        $this->user = $user;
        $this->pswd = $pswd;
        $this->dbnm = $dbnm;
        $this->tablename = $tablename;

        // OOP connection
        $this->conn = new mysqli($host, $user, $pswd, $dbnm);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // getHits()
    public function getHits() {
        $sql = "SELECT hits FROM $this->tablename WHERE id = 1";
        $result = $this->conn->query($sql);

        if ($result && $row = $result->fetch_assoc()) {
            return $row['hits'];
        }
        return 0;
    }

    // setHits()
    public function setHits() {
        $sql = "UPDATE $this->tablename SET hits = hits + 1 WHERE id = 1";
        $this->conn->query($sql);
    }

    // startOver()
    public function startOver() {
        $sql = "UPDATE $this->tablename SET hits = 0 WHERE id = 1";
        $this->conn->query($sql);
    }

    // closeConnection()
    public function closeConnection() {
        $this->conn->close();
    }
}
?>