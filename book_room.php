<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "hotel_booking");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get booking details from URL parameters
$room_id = $_GET['room_id'];
$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];

// Fetch room details
$sql = "SELECT * FROM rooms WHERE room_id = $room_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $room = $result->fetch_assoc();
} else {
    die("Invalid room ID.");
}

// Handle booking confirmation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = $_POST['customer_name'];

    // Insert booking details into the `bookings` table
    $sql = "INSERT INTO bookings (room_id, customer_name, booking_date)
            VALUES ($room_id, '$customer_name', CURDATE())";

    if ($conn->query($sql) === TRUE) {
    
        $update_sql = "UPDATE rooms SET room_status = 'booked' WHERE room_id = $room_id";
        $conn->query($update_sql);

        echo "<script>alert('Booking successful!'); window.location.href = 'index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 20px;
        }

        .container {
            max-width: 600px;
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

        .room-info {
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"], input[type="date"] {
            padding: 10px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .confirm-button {
            display: inline-block;
            padding: 10px 20px;
            background: #ff6600;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            border: none;
        }

        .confirm-button:hover {
            background: #cc2900;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Confirm Your Booking</h1>
        <div class="room-info">
            <p><strong>Room Name:</strong> <?php echo $room['room_name']; ?></p>
            <p><strong>Price:</strong> $<?php echo $room['room_price']; ?> per night</p>
            <p><strong>Check-in Date:</strong> <?php echo htmlspecialchars($checkin); ?></p>
            <p><strong>Check-out Date:</strong> <?php echo htmlspecialchars($checkout); ?></p>
        </div>

        <form method="POST">
            <label for="customer_name">Your Name:</label>
            <input type="text" id="customer_name" name="customer_name" required>

            <button type="submit" class="confirm-button">Confirm Booking</button>
        </form>
    </div>
</body>
</html>

<?php $conn->close(); ?>
