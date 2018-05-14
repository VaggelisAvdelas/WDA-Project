<div class="results-container-right">
    <p class="sr-block">Search Results</p>

    <?php
    $sql = "SELECT room_id, name, city, area, photo, room_type.room_type, count_of_guests, price, short_description FROM room inner join room_type on room.room_type=room_type.id";
    if (isset($_GET["city"])) {
        $sql .=" WHERE city='".$_GET["city"]."'";
        if (isset($_GET["room-type"])) {
            $sql .=" and room_type.id='".$_GET["room-type"]."'";
            if (isset($_GET["price-min"]) and (isset($_GET["price-max"]))) {
                $_GET["price-min"] = str_replace("€","",$_GET["price-min"]);
                $_GET["price-max"] = str_replace("€","",$_GET["price-max"]);
                $sql .=" and price>='".$_GET["price-min"]."' and price<='".$_GET["price-max"]."'";
            }
        }
    }
    elseif (isset($_GET["room-type"])) {
        $sql .=" WHERE room_type.id='".$_GET["room-type"]."'";
        if (isset($_GET["price-min"]) and (isset($_GET["price-max"]))) {
            $_GET["price-min"] = str_replace("€","",$_GET["price-min"]);
            $_GET["price-max"] = str_replace("€","",$_GET["price-max"]);
            $sql .=" and price>='".$_GET["price-min"]."' and price<='".$_GET["price-max"]."'";
        }
    }
    elseif (isset($_GET["price-min"]) and (isset($_GET["price-max"]))) {
        $_GET["price-min"] = str_replace("€","",$_GET["price-min"]);
        $_GET["price-max"] = str_replace("€","",$_GET["price-max"]);
        $sql .=" WHERE price>='".$_GET["price-min"]."' and price<='".$_GET["price-max"]."'";
    }
    
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) { ?>

            <div class="hotel-container">
                <span><?php echo "<img src='images/rooms/".$row["photo"]."' alt='room-image'>"?></span>
                <div class="hotel-text">
                    <span id="getName"><?php echo $row["name"];?></span><br>
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
    else {
        echo "No results matching your criteria.";
    }
    ?>
</div>