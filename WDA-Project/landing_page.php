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
                    <li class="logo" style=" float: left;"><a href="list_page.php" style=" color: red;">EzBooking</a></li>            
                    <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                </ul>
            </div>
        </nav>
        <main>
            <div class="slideshow-container">
                <img class="mySlides" src="images/rooms/room-10.jpg" alt="room-image" style="width: 100%">
                <img class="mySlides" src="images/rooms/room-9.jpg" alt="room-image" style="width: 100%">
                <img class="mySlides" src="images/rooms/room-3.jpg" alt="room-image" style="width: 100%">
                <img class="mySlides" src="images/rooms/room-4.jpg" alt="room-image" style="width: 100%">
                <img class="mySlides" src="images/rooms/room-5.jpg" alt="room-image" style="width: 100%">
            </div>
            <div class="form-container">
                <form class="filters-flexbox-container" action="list_page.php" method="GET">
                    <div class="filters-select-flexitems">
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
                    <div class="filters-input-flexitems">
                        <input type="text" id="datepicker1" name="checkin" placeholder="Check-In Date" required>
                        <input type="text" id="datepicker2" name="checkout" placeholder="Check-Out Date" required>
                    </div>
                    <input type="submit" value="Search">
                </form>
            </div>
            <script type="text/javascript" src="slideshow.js"></script>
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
                $( function() {                    
                    $( "#datepicker1" ).datepicker({
                        dateFormat:"dd-mm-yy",
                        minDate: 0,
                        onSelect: function() {
                            var dt2 = $("#datepicker2");
                            var minDate = $(this).datepicker('getDate');
                            var dt2Date = dt2.datepicker('getDate');
                            //difference in days. 86400 seconds in day, 1000 ms in second
                            var dateDiff = (dt2Date - minDate)/(86400*1000);
                            //dt2 not set or dt1 date is greater than dt2 date
                            if (dt2Date == null || dateDiff < 0) {
                                dt2.datepicker('setDate', minDate);
                            }
                            //first day which can be selected in dt2 is selected date in dt1
                            dt2.datepicker('option', 'minDate', minDate);
                        }});
                    $( "#datepicker2" ).datepicker({
                        dateFormat:"dd-mm-yy",
                        minDate: 0});
                } );
            </script>
        </main>
        <?php include "footer.php" ?>
    </body>
</html>
<?php mysqli_close($conn); ?>