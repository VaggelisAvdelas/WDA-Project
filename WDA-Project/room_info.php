<div class="room-container">

    <div class="room-title-container">
        <p class="sr-block">
            <?php echo $row["name"]." - ".$row["city"].",".$row["area"]." | Reviews: " ?> 
            <span style="float: right;">Per Night:<?php echo $row["price"]."&euro;"?></span>
        </p>
        <?php echo "<img src='images/rooms/".$row["photo"]."' alt='room-image' style='width: 60%; height: auto;'>"?>
    </div>

    <div class="room-info-container">                   
        <div class="info-guests">
            <i class="fas fa-user"></i><?php echo $row["count_of_guests"] ?><br>
            <label for="info-guests">Count of Guests</label>
        </div>
        <div class="info-room">
            <i class="fas fa-bed"></i><?php echo $row["room_type"] ?><br>
            <label for="info-room">Type of Room</label>
        </div>
        <div class="info-parking">
            <i class="fas fa-car"></i><?php echo $row["parking"] ?><br>
            <label for="info-parking">Parking</label>
        </div>
        <div class="info-wifi">        
            <i class="fas fa-wifi"></i><?php echo $row["wifi"] ?><br>
            <label for="info-wifi">Wifi</label>
        </div>
        <div class="info-pets">
            <i class="fas fa-paw"></i>
            <?php if($row["pet_friendly"] == 1){
                echo "Yes";
            }else {
                echo "No";
            } ?><br>
            <label for="info-pets">Pet Friendly</label>
        </div>                       
    </div>
    <div class="room-description">
        <span class="review-labels">Room Description</span>
        <p><?php echo $row["long_description"] ?></p>
    </div>
    
    <?php if (isset($_POST["booked"])) {
        $stmt = $conn->prepare("INSERT INTO bookings VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssii", $checkin, $checkout, $date, $user_id, $hotel_id);

        $checkin = $_SESSION["checkin"];
        $checkout = $_SESSION["checkout"];
        $date = ('Y-m-d H:i:s');
        $user_id = 1;
        $hotel_id = $_GET["room_id"];
        $stmt->execute();

        $stmt->close();
    }?>
    <form class='book-button' method='POST' action="">
        <input type="submit" name="booked" value="Book Room">
    </form>
    <div class="map">
    <?php echo "<iframe src='https://maps.google.com/maps?q=" . $row["lat_location"] . ',' . $row["lng_location"] . "&hl=es;z=14&amp;output=embed'></iframe>" ?>
    </div>