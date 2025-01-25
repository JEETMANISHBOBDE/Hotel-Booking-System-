<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Booking</title>
    <style>
        /* Include previous styles here */

        /* Updated styles for Sign In/Sign Up buttons */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f9f9f9;
            border-bottom: 1px solid #ddd;
            position: relative;
        }

        .header .logo {
            font-size: 24px;
            color: #333;
        }

        .header .auth-buttons {
            position: absolute;
            top: 10px;
            right: 20px;
            display: flex;
            gap: 10px;
        }

        .header .auth-buttons a {
            padding: 8px 15px;
            background-color: #ff6600;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .header .auth-buttons a:hover {
            background-color: #cc2900;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <h1>Hotel Booking</h1>
        </div>
        <div class="auth-buttons">
            <a href="signin.php">Sign In</a>
            <a href="signup.php">Sign Up</a>
        </div>
    </div>

    <!-- Your existing content -->
</body>
</html>

    <div class="booking-container">
        <h1>Book Hotels and Homestays</h1>
        <form action="search_results.php" method="GET" class="search-form">
            <div class="form-group">
                <label for="destination">Where to</label>
                <input type="text" id="destination" name="destination" placeholder="e.g. - Area, Landmark or Property Name" required>
            </div>
            <div class="form-group">
                <label for="checkin">Check-in</label>
                <input type="date" id="checkin" name="checkin" required>
            </div>
            <div class="form-group">
                <label for="checkout">Check-out</label>
                <input type="date" id="checkout" name="checkout" required>
            </div>
            <div class="form-group">
                <label for="guests">Guests & Rooms</label>
                <select id="guests" name="guests">
                    <option value="1 Adult|1 Room">1 Adult | 1 Room</option>
                    <option value="2 Adults|1 Room">2 Adults | 1 Room</option>
                    <option value="3 Adults|2 Rooms">3 Adults | 2 Rooms</option>
                    <option value="4 Adults|2 Rooms">4 Adults | 2 Rooms</option>
                </select>
            </div>
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>
</body>
</html>
