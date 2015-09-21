<?php
    //open connection to mysql db
    $connection = mysqli_connect("localhost","root","jyadmin123","sas") or die("Error " . mysqli_error($connection));

    //fetch table rows from mysql db
    $sql = "select name,openingbalance from ledger";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //create an array
    $ledger = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $ledger[] = $row;
    }
    echo json_encode($ledger);

    //close the db connection
    mysqli_close($connection);
?>