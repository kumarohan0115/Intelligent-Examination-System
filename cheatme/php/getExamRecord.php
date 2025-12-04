<?php
session_start();
require('../config/connective.php');

if (isset($_POST["subject"])) {
    $subject_choosen = mysqli_real_escape_string($connection, $_POST["subject"]);
    $sql_show_record = "SELECT `user_name`,`$subject_choosen` FROM exam_record";
    $query_show_record = mysqli_query($connection, $sql_show_record);

    if ($query_show_record && mysqli_num_rows($query_show_record) > 0) {
        echo '<tr>';
        echo '<th>Student Name</th>';
        echo '<th>' . htmlspecialchars($subject_choosen) . '</th>';
        echo '</tr>';
        
        while ($row_subject = mysqli_fetch_assoc($query_show_record)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row_subject["user_name"]) . '</td>';
            echo '<td>' . htmlspecialchars($row_subject[$subject_choosen]) . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="2">No records found for this subject</td></tr>';
    }
} else {
    echo '<tr><td colspan="2">Please select a subject</td></tr>';
}
?>
