<?php
    $userId = $_COOKIE['id'];
    $mysqli = new mysqli('localhost', 'root', '', 'users');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $result = $mysqli->query(
        "SELECT sms.*, tags.text as tag_text 
        FROM sms 
        LEFT JOIN tags ON sms.tag_id = tags.id 
        WHERE sms.user_id = $userId OR (sms.save != 'save' OR sms.save IS NULL)
        GROUP BY sms.id"        
        );

    if ($result->num_rows > 0) {
        while ($sms = $result->fetch_assoc()) {
            $description = preg_replace('/#\w+/', '', $sms["Description"]);
            $saveTag = $sms["save"];

            if ($saveTag == 'save') {
                echo "<div class='sms'><p class='save-tag'>{$saveTag}</p><p class='sms__text'>{$description}</p><div class='sms__tags'>";
            } else {
                echo "<div class='sms'><p class='sms__text'>{$description}</p><div class='sms__tags'>";
            }

            if ($sms['tag_text'] != null or $sms['tag_text'] != '') {
                echo "<p class='sms__tags__text'>{$sms['tag_text']}</p>";
            } else {
                echo "<p class='sms__tags__text'>Нет хештегов.</p>";
            }

            echo "</div></div>";
        }
    } else {
        echo "Нет сообщений.";
    }

    $mysqli->close();

?>