<?php include 'sql_connection.php'; 
    session_start();
?>
<!DOCUMENT html>
<html>
    <head>
        <?php include "header.php" ?>
    </head>
    <body>
        <nav>
            <div class="nav-bar">
                <ul>
                    <li class="logo" style="float: left;"><a href="list_page.php" style="color: red;">EzBooking</a></li>
                    <li><a href="profile_page.php"><i class="fas fa-user"></i> Profile</a></li>
                    <li><a href="landing_page.php"><i class="fas fa-home"></i> Home</a></li>
                </ul>
            </div>
        </nav>   
        <main>
            <div class="results-container">
                <div class="filters-container-left">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
                        <span class="red-labels">FIND THE PERFECT HOTEL</span>
                        <div class="resultpage-guests">
                            <select name="guests">
                                <option value="" disabled selected hidden>Count of Guests</option>
                                <?php 
                                $sql = "SELECT DISTINCT count_of_guests FROM room";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row["count_of_guests"] ?>"><?php echo $row["count_of_guests"] ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        <div class="resultpage-roomtype">
                            <select name="room-type">
                                <option value="" disabled selected hidden>Room Type</option>
                                <?php 
                                $sql = "SELECT * FROM room_type";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row["id"] ?>"><?php echo $row["room_type"] ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        <div class="resultpage-city">
                            <select name="city">
                                <option value="" disabled selected hidden>City</option>
                                <?php 
                                $sql = "SELECT DISTINCT city FROM room";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row["city"] ?>"><?php echo $row["city"] ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        <div class="resultpage-price">
                            <input type="text" name="price-min" id="amount1" placeholder="0&euro;" style="margin:0 40% 0 0;">
                            <input type="text" name="price-max" id="amount2" placeholder="5000&euro;">
                        </div>
                        <div class="resultpage-slider">
                            <div id="slider-range"></div>
                        </div>
                        <div class="resultpage-checkin">
                            <input type="text" name="check-in" id="datepicker1" placeholder="Check-In Date">
                        </div>
                        <div class"resultpage-checkout">
                            <input type="text" name="check-out" id="datepicker2" placeholder="Check-Out Date">
                        </div>
                        <div class="resultpage-submitbutton">
                            <input type="submit" value="FIND HOTEL">
                        </div>
                    </form>
                </div>
                <div class="results-container-right">
                    <p class="sr-block">Search Results</p>
                    <?php
                    $sql = "SELECT name, city, area, photo, room_type.room_type, count_of_guests,price, short_description FROM room inner join room_type on room.room_type=room_type.id";
                    if (array_key_exists("city",$_GET)) {
                        $sql .=" WHERE city='".$_GET["city"]."'";
                        if (array_key_exists("room-type",$_GET)) {
                            $sql .=" and room_type.id='".$_GET["room-type"]."'";
                        }
                    }
                    elseif (array_key_exists("room-type",$_GET)) {
                        $sql .=" WHERE room_type.id='".$_GET["room-type"]."'";
                    }
                    
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="hotel-container">
                                <span><?php echo "<img src='images/rooms/".$row["photo"]."' alt='room-image'>"?></span>
                                <div class="hotel-text">
                                    <span class="getName"><?php echo $row["name"];?></span><br>
                                    <span style="font-size: 14px;"><?php echo $row["city"].",".$row["area"]?></span>
                                    <p><?php echo $row["short_description"]?></p>
                                    <button type="button" class="gotoRoomPage">Go to Room Page</button>
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
                            </div><?php
                        }
                    }
                    else {
                        echo "No results matching your criteria.";
                    }
                    ?>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
                $ (document).on('click','.gotoRoomPage', function() {
                    var hotel_name = $(".getName").text();
                    alert(hotel_name);
                } ) ;
            </script>
            <script>
                $( function() {                    
                    $( "#datepicker1" ).datepicker();
                    $( "#datepicker2" ).datepicker();
                } );
            </script>
            <script>
                $( function() {
                  $( "#slider-range" ).slider({
                    range: true,
                    min: 0,
                    max: 600,
                    values: [ 150, 450 ],
                    slide: function( event, ui ) {
                      $( "#amount1" ).val( "€" + ui.values[ 0 ]);
                      $( "#amount2" ).val( "€" + ui.values[ 1 ]);
                    }
                  });
                  $( "#amount1" ).val("€" + $("#slider-range").slider( "values", 0 ));
                  $( "#amount2" ).val("€" + $("#slider-range").slider( "values", 1 ));
                } );
            </script>
        </main>
        <?php include "footer.php" ?>
    </body>
</html>
<?php mysqli_close($conn); ?>