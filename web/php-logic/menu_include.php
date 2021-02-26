<?php
require_once("../php-logic/db-connection.php");
$errors = array();
if (isset($_POST))
{
    $name = strip_tags(mysqli_real_escape_string($link, $_POST['name']));
    $dateTo = strip_tags(mysqli_real_escape_string($link, $_POST['dateTo']));
    $price =strip_tags( mysqli_real_escape_string($link, $_POST['price']));
    $master = strip_tags(mysqli_real_escape_string($link, $_POST['master']));
    if (!empty($master))
    {
        mysqli_query($link, "INSERT INTO menu ( name, price, date, master) VALUES ( '" . $name . "', '"
            . $price . "', '" . $dateTo . "', '" . $master . "')");
    } else
    {
        mysqli_query($link, "INSERT INTO menu ( name, price, date) VALUES ( '" . $name . "', '"
            . $price . "', '" . $dateTo . "')");
    }
    echo "INSERT INTO menu ( name, price, date) VALUES ( '" . $name . "', '"
        . $price . "', '" . $dateTo . "')";
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/web/cook/menu.php');
}
?>