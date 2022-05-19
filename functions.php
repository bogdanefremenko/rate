<?php
include 'Database/database.php';
function showExchange($rate) {
    //building a table
    echo '<table class="table table-dark table-hover">';
    foreach ($rate as $oneCurrency) {
        echo '
        <thead>
        <th colspan="2">' . $oneCurrency["ccy"] . " -> " . $oneCurrency["base_ccy"] . '</th>
        </thead>
        <tr>
            <td>
                buy
            </td>
            <td>' . $oneCurrency["buy"] . '</td>
        </tr>
        <tr>
            <td>
                sale
            </td>
            <td>' . $oneCurrency["sale"] . '</td>
        </tr>';
    }
    echo '</table>';
}
function getValues($time): array
{
    //getting data from database
    global $link;
    $sql = "SELECT * FROM rate WHERE time='$time';";
    $result = mysqli_query($link, $sql);
    //creating array to contain associative arrays
    $array = array();
    for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
        $array[$i] = $row;
    }
    return $array;
}
function setValues() {
    //saving API data to database
    global $link;
    $data = getAPIData("4");
    foreach ($data as $array) {
        $ccy = $array["ccy"];
        $base_ccy = $array["base_ccy"];
        $buy = $array["buy"];
        $sale = $array["sale"];
        $time = date("m.j H:i");
        $sql = "INSERT INTO rate (ccy, base_ccy, buy, sale, time) VALUES ('$ccy', '$base_ccy', '$buy', '$sale', '$time')";
        if (!mysqli_query($link, $sql)) {
            echo "Error with table";
        }
    }
}
function getAPIData(string $coursId) {
    //sending a request to the privatbank API
    $json = file_get_contents("https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=" . $coursId);
    return json_decode($json, true);
}
function timeVariants(): array
{
    //getting various time variants
    global $link;
    $sql = "SELECT DISTINCT time FROM rate";
    $result = mysqli_query($link, $sql);
    return mysqli_fetch_all($result);
}