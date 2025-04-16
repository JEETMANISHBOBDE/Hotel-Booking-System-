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

