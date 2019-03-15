<?php

$servername = "localhost";
$username = "andec_andec";
$password = "Bravia14";
$dbname = "andec_BeerTimer";

class SQL_query
{


    function SQL_Connection()
    {
        // Create connection
        global $servername, $username, $password, $dbname;
        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->set_charset('utf8');
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }


    function getTable()
    {
        $conn = $this->SQL_Connection();

        $sql = "SELECT * FROM highscoreOfBeers ORDER BY DrinkingTime ASC;";

        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }


    function deleteItemFromTable($id){
        $conn = $this->SQL_Connection();
        $sql = "DELETE FROM fryser WHERE id = $id";
        $conn->query($sql);
        $conn->close();
        return true;
    }



    function setNameOnID($id, $PersonName){
        $conn = $this->SQL_Connection();
        $sql = "UPDATE highscoreOfBeers SET PersonName=\"$PersonName\", UploadTime=UploadTime WHERE ID=$id";
        $conn->query($sql);
        $conn->close();
        echo $sql;
        return true;
    }

    function newBeer($time, $bongID)
    {
        $conn = $this->SQL_Connection();
        $time = $time/1000;
        $sql = "INSERT INTO highscoreOfBeers (DrinkingTime, BongID) VALUES (\"$time\", \"$bongID\")";
        $conn->query($sql);
        $conn->close();
        return true;
    }




    function deleteItemFromBeer($id){
        $conn = $this->SQL_Connection();
        $sql = "DELETE FROM highscoreOfBeers WHERE id = $id";
        $conn->query($sql);
        $conn->close();
        return true;
    }



}

