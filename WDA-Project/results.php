<div class="results-container-right">
    <p class="sr-block">Search Results</p>

    <?php

    #flag is used because the user can access the list page by clicking the logo
    #this way it gives no arguments to $_GET so we use WHERE 1=1 to show everything
    #we append to the sql query based on what fields the user has picked 
    
    $flag = FALSE;
    $sql = "SELECT room_id, name, city, area, photo, room_type.room_type, count_of_guests, price, short_description
    FROM room 
    INNER JOIN room_type ON room.room_type=room_type.id";

    if (!empty($_GET)) {
        $sql .= " WHERE 1=1";
        $flag = TRUE;
        if (isset($_GET["city"])) {
            if ($flag) {
                $sql .=" and city='".$_GET["city"]."'";
            }else {
                $sql .=" city='".$_GET["city"]."'";
                $flag = TRUE;
            }
        }
        if (isset($_GET["room-type"])) {
            if ($flag) {
                $sql .=" and room_type.id='".$_GET["room-type"]."'";
            }else {
                $sql .=" room_type.id='".$_GET["room-type"]."'";
                $flag = TRUE;
            }
        }
        if (isset($_GET["price-min"]) and (isset($_GET["price-max"]))) {
            $_GET["price-min"] = str_replace("€","",$_GET["price-min"]);
            $_GET["price-max"] = str_replace("€","",$_GET["price-max"]);
            if ($flag){
                $sql .=" and price>='".$_GET["price-min"]."' and price<='".$_GET["price-max"]."'";
            }else {
                $sql .=" price>='".$_GET["price-min"]."' and price<='".$_GET["price-max"]."'";
                $flag = TRUE;
            }
        }
        if (isset($_GET["guests"])) {
            if ($flag) {
                $sql .= " and count_of_guests='".$_GET["guests"]."'";
            }else {
                $sql .= " count_of_guests='".$_GET["guests"]."'";
                $flag = TRUE;
            }
        }
    }
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="hotel-container">
                    <span><?php echo "<img src='images/rooms/".$row["photo"]."' alt='room-image'>"?></span>
                    <div class="hotel-text">
                        <span><?php echo $row["name"];?></span><br>
                        <span style="font-size: 14px;"><?php echo $row["city"].",".$row["area"]?></span>
                        <p><?php echo $row["short_description"]?></p>
                        <a href="room_page.php?room_id=<?php echo $row["room_id"]?>">Go to Room Page</a>
                    </div>

                    <div class="hotel-price-container">
                        <div class="hotel-price">
                            <span><?php echo "Per Night: ".$row["price"]."&euro;"?></span>
                        </div>
                        <div class="hotel-room">
                            <span><?php echo "Count of Guests: ".$row["count_of_guests"]?></span>
                            <span><?php echo "Type of Room: ".$row["room_type"]?></span>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
?>
</div>