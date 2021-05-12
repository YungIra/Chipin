<?php 
define ("ServerName", "localhost");
define ("User", "c21535_chipin_ai_info_ru");
define ("Pass", "SeNgaQawqevay75");
define ("Db", "c21535_chipin_ai_info_ru");
//123

function Set ($con)
{
    $userName = $_POST["addGuestUsername"];
    $age = $_POST["addGuestAge"];
    $quantity = $_POST["addGuestQuantity"];
    $payment = $_POST["addGuestTotal"];

    if (($userName != null) && ($age != null) && ($quantity != null) && ($payment != null))
    {
        $sql = "INSERT main (name, age, quantity, payment)
        VALUES('$userName', '$age', '$quantity', '$payment')";

        $con->query($sql);
    }
}

function Get($con)
{
    $request = "SELECT name, age, quantity, payment FROM main ORDER BY userId ASC";
    $result = $con ->query($request);
    $array = [];
    if ($result -> num_rows > 0)
    {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $array[] = $row;
        }
    }
    header ('Content-Type: application/json');
    echo json_encode($array);
}

$con = new mysqli(ServerName, User, Pass, Db);

if ($con->connect_error) 
{
    die("Connection failed: " . $con->connect_error);
}

Set($con);
Get($con);

$con -> close();

?>