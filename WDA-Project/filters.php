<div class="filters-container-left">
    <form action="" method="GET">
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
            <input type="text" name="checkin" id="datepicker1" placeholder="Check-In Date">
        </div>
        <div class"resultpage-checkout">
            <input type="text" name="checkout" id="datepicker2" placeholder="Check-Out Date">
        </div>
        <div class="resultpage-submitbutton">
            <input type="submit" value="FIND HOTEL">
        </div>
    </form>
</div>