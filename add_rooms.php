<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "hotel_booking");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Comprehensive list of Indian states and union territories
$states = [
    "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chhattisgarh", 
    "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jharkhand", 
    "Karnataka", "Kerala", "Madhya Pradesh", "Maharashtra", "Manipur", 
    "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Punjab", 
    "Rajasthan", "Sikkim", 
    // Union Territories
    "Delhi", "Puducherry", "Chandigarh", "Ladakh", "Andaman and Nicobar Islands", 
    "Dadra and Nagar Haveli and Daman and Diu"
];

// Detailed room types with specific pricing
$room_types = [
    [
        'name' => 'Standard Room',
        'price' => 1500,
        'description' => 'Comfortable room with basic amenities'
    ],
    [
        'name' => 'Deluxe Room',
        'price' => 3000,
        'description' => 'Spacious room with enhanced facilities'
    ],
    [
        'name' => 'Executive Suite',
        'price' => 5500,
        'description' => 'Luxurious suite with premium services'
    ],
    [
        'name' => 'Family Room',
        'price' => 4000,
        'description' => 'Spacious room suitable for families'
    ]
];

// Function to generate random room availability
function generateRoomAvailability() {
    $availabilities = ['available', 'available', 'available', 'booked'];
    return $availabilities[array_rand($availabilities)];
}

// Track total rooms added
$total_rooms_added = 0;

// Generate rooms for each state and room type
foreach ($states as $state) {
    foreach ($room_types as $room_type) {
        // Generate rooms for entire year 2025
        $start_date = strtotime("2025-01-01");
        $end_date = strtotime("2025-12-31");
        
        // Number of rooms per type in each state (randomized)
        $rooms_per_type = rand(5, 20);
        
        for ($i = 1; $i <= $rooms_per_type; $i++) {
            $current_date = $start_date;
            
            while ($current_date <= $end_date) {
                $formatted_date = date("Y-m-d", $current_date);
                
                // Create unique room name
                $room_name = "{$room_type['name']} - {$state} - Room $i";
                
                // Prepare SQL statement
                $sql = "INSERT INTO rooms 
                        (room_name, room_price, room_status, room_state, room_date) 
                        VALUES 
                        (?, ?, ?, ?, ?)";
                
                $stmt = $conn->prepare($sql);
                $status = generateRoomAvailability();
                $stmt->bind_param(
                    "sisss", 
                    $room_name, 
                    $room_type['price'], 
                    $status, 
                    $state, 
                    $formatted_date
                );
                
                if ($stmt->execute()) {
                    $total_rooms_added++;
                } else {
                    echo "Error: " . $stmt->error;
                }
                
                $stmt->close();
            
                $current_date = strtotime("+1 day", $current_date);
            }
        }
    }
}

echo "Total rooms added across India: $total_rooms_added";
$conn->close();
?>
