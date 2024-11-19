<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['videoFile'])) {
    $target_dir = "uploads/";  // Zielordner
    $file_name = basename($_FILES["videoFile"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $maxFileSize = 500 * 1024 * 1024; // 500 MB

    // Überprüfen, ob der Ordner existiert, ansonsten erstellen
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    // Überprüfen, ob es eine gültige Video-Datei ist
    if (!in_array($videoFileType, ['mp4', 'mov', 'avi', 'mkv'])) {
        echo "Nur Videos im Format MP4, MOV, AVI oder MKV sind erlaubt.";
        $uploadOk = 0;
    }

    // Datei-Größenprüfung
    if ($_FILES["videoFile"]["size"] > $maxFileSize) {
        echo "Die Datei ist zu groß. Maximal erlaubt: 500 MB.";
        $uploadOk = 0;
    }

    // Wenn alles ok ist, Datei hochladen
    if ($uploadOk) {
        if (move_uploaded_file($_FILES["videoFile"]["tmp_name"], $target_file)) {
            echo "Das Video '" . htmlspecialchars($file_name) . "' wurde erfolgreich hochgeladen.";
        } else {
            echo "Fehler beim Hochladen der Datei.";
        }
    }
} else {
    echo "Keine Datei hochgeladen.";
}
?>
