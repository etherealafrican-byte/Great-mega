<?php
require_once __DIR__ . '/db_connect.php'; // use your DB connection include here

function get_active_banner($conn) {
    $now = date('Y-m-d H:i:s');
    $sql = "SELECT * FROM banners WHERE TIMESTAMPADD(DAY, expiry_days, start_time) > ? ORDER BY id DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $now);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function save_banner($conn, $header, $url, $days, $image_path) {
    $start_time = date('Y-m-d H:i:s');
    $sql = "INSERT INTO banners (header_text, url, expiry_days, image_path, start_time) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssiss', $header, $url, $days, $image_path, $start_time);
    return $stmt->execute();
}

function delete_banners($conn) {
    $sql = "DELETE FROM banners";
    return $conn->query($sql);
}
?>
