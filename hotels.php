
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
