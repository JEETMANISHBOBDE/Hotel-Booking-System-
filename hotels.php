<?php
$sql = "SELECT * FROM hotels";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Hotel</title>
</head>
<body>
    <h1>Select a Hotel</h1>
    <div>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div>
                    <a href="view_rooms echo $row['hotel_id']; ?>">
                        <?php echo $row['hotel_name']; ?>
                    </a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No hotels available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
