<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['videoFile'])) {
    $target_dir = "uploads/";  // Hier landen die Videos
    $target_file = $target_dir . basename($_FILES["videoFile"]["name"]);
    $uploadOk = 1;
    $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Überprüfen, ob es eine gültige Video-Datei ist
    if (in_array($videoFileType, ['mp4', 'mov', 'avi', 'mkv'])) {
        // Video speichern
        if (move_uploaded_file($_FILES["videoFile"]["tmp_name"], $target_file)) {
            echo "Das Video wurde erfolgreich hochgeladen.";
        } else {
            echo "Es gab ein Problem beim Hochladen des Videos.";
        }
    } else {
        echo "Nur Videos im Format MP4, MOV, AVI oder MKV sind erlaubt.";
    }
}
?>
