<?php

// File Reader - Legge il contenuto di un file di testo
function readTextFile($filePath) {
    try {
        if (!is_file($filePath)) {
            throw new Exception("Errore: Il file specificato non esiste.");
        }

        if (!is_readable($filePath)) {
            throw new Exception("Errore: Il file non è leggibile.");
        }

        $content = file_get_contents($filePath);

        if ($content === false) {
            throw new Exception("Errore: Si è verificato un problema durante la lettura del file.");
        }

        $safeContent = nl2br(htmlspecialchars($content, ENT_QUOTES, 'UTF-8'));
        return $safeContent;
    } catch (Exception $e) {
        error_log($e->getMessage(), 3, '/path/to/error.log');
        return "Si è verificato un errore: " . $e->getMessage();
    }
}

?>
