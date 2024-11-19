<div id="video-list">
    <?php
        // Ordner, in dem die Videos gespeichert sind
        $dir = "uploads/";

        // Alle Dateien im Ordner abrufen
        $files = scandir($dir);

        // Alle Dateien durchgehen
        foreach ($files as $file) {
            // Verhindern, dass systemeigene Ordner wie '.' und '..' angezeigt werden
            if ($file !== '.' && $file !== '..') {
                // Nur Videodateien anzeigen (MP4-Dateien)
                $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                if (in_array($file_extension, ['mp4', 'mov', 'avi', 'mkv'])) {
                    // HTML Video-Tag für das Abspielen des Videos
                    echo "<div class='video-item'>
                            <video width='320' height='240' controls>
                                <source src='$dir$file' type='video/mp4'>
                            </video>
                          </div>";
                }
            }
        }
    ?>
</div>
