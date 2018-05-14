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
            <div class="profile-container">
                <div class="reviews-container-left">
                    <span class="red-labels">FAVORITES</span>
                    <div class="favorites-container">
                        <ol>
                            <li>Megali Vretania Hotel</li>
                        </ol>
                    </div>
                    <span class="red-labels">REVIEWS</span>
                    <div class="reviews-container">
                        <dl class="reviewed-hotels">
                            <dt>Hilton Hotel</dt>
                            <dd>
                                <div class="rating">                                                                  
                                </div>
                            </dd>
                            <dt>Megali Vretania Hotel</dt>
                        </dl>
                    </div>
                </div>
                <div class="results-container-right">
                    <p class="sr-block">My Bookings</p>
                    <div class="hotel-container">
                        <span><img src="images/rooms/room-1.jpg" alt="room-image"></span>
                        <div class="hotel-text">
                            <span>HILTON HOTEL</span><br>
                            <span style="font-size: 14px;">ATHENS, ZWGRAFOU</span>
                            <p>Mpla mpla mpla mpla mpla mpla mpla polles lekseis edw 
                                Mpla mpla mpla mpla mpla mpla mpla polles lekseis edw</p>
                                <a href="room_page.php?room_id=<?php echo $row["room_id"]?>">Go to Room Page</a>
                        </div>
                        <div class="hotel-price-container">
                            <div class="hotel-price">
                                <span>Total Cost: 350&euro;</span>
                            </div>
                            <div class="hotel-room">
                                <span>Check-In Date: 2018-06-25</span>
                                <span>Check-Out Date: 2018-07-25</span>
                                <span><?php  echo "Type of Room: "/*.$row["room_type"] */?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include "footer.php"?>
    </body>
</html>
<?php mysqli_close($conn); ?>