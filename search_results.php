<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "hotel_booking");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Get user input from the form
$destination = $_GET['destination'];
$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];
$guests = $_GET['guests'];

// Fetch relevant hotel data (for simplicity, using the destination as a search term)
$sql = "SELECT * FROM rooms WHERE room_status = 'available' AND room_name LIKE '%$destination%'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f9f9f9;
            border-bottom: 1px solid #ddd;
        }

        .header .home-button {
            display: inline-block;
            padding: 8px 15px;
            background-color: #ff6600;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .header .home-button:hover {
            background-color: #cc2900;
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="index.php" class="home-button">Home</a>
    </div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        h1 {
            color: #ff6600;
            margin-bottom: 20px;
        }

        .room {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }

        .room:last-child {
            border-bottom: none;
        }

        .room h2 {
            margin: 0 0 5px;
            color: #333;
        }

        .room p {
            margin: 5px 0;
            color: #666;
        }

        .book-now {
            display: inline-block;
            padding: 10px 20px;
            background: #ff6600;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .book-now:hover {
            background: #cc2900;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search Results for "<?php echo htmlspecialchars($destination); ?>"</h1>

        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="room">
                    <h2><?php echo $row['room_name']; ?></h2>
                    <p>Price: $<?php echo $row['room_price']; ?> per night</p>
                    <a href="book_room.php?room_id=<?php echo $row['room_id']; ?>&checkin=<?php echo $checkin; ?>&checkout=<?php echo $checkout; ?>" class="book-now">Book Now</a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No rooms available for your search. Please try a different destination or adjust your search dates.</p>
        <?php endif; ?>

    </div>
</body>
</html>

<?php $conn->close(); ?>
