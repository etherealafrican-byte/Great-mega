<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) { header("Location: login.php"); exit; }
require_once '../includes/db_connect.php';
require_once '../includes/banner_helper.php';

$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        delete_banners($conn);
        $msg = "Banner removed.";
    } else {
        $header = $_POST['header'] ?? '';
        $url = $_POST['url'] ?? '';
        $days = intval($_POST['days'] ?? 1);
        $image_path = '';
        if (isset($_FILES['banner_image']) && $_FILES['banner_image']['tmp_name']) {
            $ext = pathinfo($_FILES['banner_image']['name'], PATHINFO_EXTENSION);
            $filename = "banner_" . time() . "." . $ext;
            $dest = "../uploads/banners/".$filename;
            if (!is_dir("../uploads/banners")) { mkdir("../uploads/banners", 0777, true); }
            move_uploaded_file($_FILES['banner_image']['tmp_name'], $dest);
            $image_path = "uploads/banners/".$filename;
        } else {
            $current = get_active_banner($conn);
            $image_path = $current ? $current['image_path'] : "";
        }
        save_banner($conn, $header, $url, $days, $image_path);
        $msg = "Banner updated!";
    }
}
$current = get_active_banner($conn);
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Banner Management</title>
<style>
.preview-img { max-width: 300px; max-height: 120px; margin-top:10px; }
</style>
</head>
<body>
<h2>Site Banner Management</h2>
<?php if ($msg) echo "<div style='color:green'>$msg</div>"; ?>
<form method="post" enctype="multipart/form-data">
    <label>Banner Image (replace):</label><br>
    <input type="file" name="banner_image"><br>
    <?php if ($current && $current['image_path']) echo "<img src='../".$current['image_path']."' class='preview-img'><br>"; ?>
    <label>Header Text:</label><br>
    <input type="text" name="header" value="<?php echo htmlspecialchars($current['header_text'] ?? ''); ?>" required><br>
    <label>Banner Link (URL):</label><br>
    <input type="url" name="url" value="<?php echo htmlspecialchars($current['url'] ?? ''); ?>" required><br>
    <label>Expiry (days):</label><br>
    <input type="number" name="days" value="<?php echo htmlspecialchars($current['expiry_days'] ?? 1); ?>" min="1" required><br><br>
    <input type="submit" value="Save Banner">
    <?php if ($current) { ?>
        <input type="submit" name="delete" value="Delete Banner" onclick="return confirm('Are you sure?');">
    <?php } ?>
</form>
</body>
</html>
