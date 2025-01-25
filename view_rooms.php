<?php
// Get the hotel_id from the URL
$hotel_id = $_GET['hotel_id'];

// Fetch rooms for the selected hotel
$sql = "SELECT * FROM rooms WHERE hotel_id = $hotel_id AND room_status = 'available'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Rooms</title>
</head>
<body>
    <h1>Rooms Available at <?php echo htmlspecialchars($hotel_name); ?></h1>

    <div>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div>
                    <h2><?php echo $row['room_name']; ?></h2>
                    <p>Price: $<?php echo $row['room_price']; ?> per night</p>
                    <a href="book_room.php?room_id=<?php echo $row['room_id']; ?>" class="book-now">Book Now</a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No available rooms at this hotel.</p>
        <?php endif; ?>
    </div>
</body>
</html>
