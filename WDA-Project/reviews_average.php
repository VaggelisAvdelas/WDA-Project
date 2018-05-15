<!-- Calculates the average star rating of every hotel based on the reviews it has received -->
<?php
$average = 0;
$sql_reviews = "SELECT SUM(rate), COUNT(rate) FROM reviews WHERE room_id ='".$_GET["room_id"]."'";
$result_reviews = mysqli_query($conn, $sql_reviews);
if (mysqli_num_rows($result_reviews) > 0) {
    while ($row_reviews = mysqli_fetch_assoc($result_reviews)) {
        if ($row_reviews["COUNT(rate)"] != 0) {
            $average = round($row_reviews["SUM(rate)"]/$row_reviews["COUNT(rate)"]);
        }
    } 
}
switch ($average) {
    default:
        echo "<span class='fa fa-star'></span>";
        echo "<span class='fa fa-star'></span>";
        echo "<span class='fa fa-star'></span>";
        echo "<span class='fa fa-star'></span>";
        echo "<span class='fa fa-star'></span>";
        break;   
    case 1:
        echo "<span class='fa fa-star checked'></span>";
        echo "<span class='fa fa-star'></span>";
        echo "<span class='fa fa-star'></span>";
        echo "<span class='fa fa-star'></span>";
        echo "<span class='fa fa-star'></span>";
        break;
    case 2:
        echo "<span class='fa fa-star checked'></span>";
        echo "<span class='fa fa-star checked'></span>";
        echo "<span class='fa fa-star'></span>";
        echo "<span class='fa fa-star'></span>";
        echo "<span class='fa fa-star'></span>";
        break;
    case 3:
        echo "<span class='fa fa-star checked'></span>";
        echo "<span class='fa fa-star checked'></span>";
        echo "<span class='fa fa-star checked'></span>";
        echo "<span class='fa fa-star'></span>";
        echo "<span class='fa fa-star'></span>";
        break;
    case 4:
        echo "<span class='fa fa-star checked'></span>";
        echo "<span class='fa fa-star checked'></span>";
        echo "<span class='fa fa-star checked'></span>";
        echo "<span class='fa fa-star checked'></span>";
        echo "<span class='fa fa-star'></span>";
        break;
    case 5:
        echo "<span class='fa fa-star checked'></span>";
        echo "<span class='fa fa-star checked'></span>";
        echo "<span class='fa fa-star checked'></span>";
        echo "<span class='fa fa-star checked'></span>";
        echo "<span class='fa fa-star checked'></span>";
        break;
};
?>