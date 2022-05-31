<?php include '../includes/functions.php'; ?>

<?php
$result = getappliancesbyValue($_GET['C']);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['Name'] . '" data-value="' . $row['Watts'] . '">' . $row['Name'] . '</option>';
    }
}
?>