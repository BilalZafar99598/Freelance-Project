<?php include '../includes/functions.php'; ?>

<?php
$result = getCitybyValue($_GET['C']);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['City'] .'">' . $row['City'] . '</option>';
    }
}
?>