<?php
    $message  = $_POST['message'];
    $tag_save = $_POST['save-btn'];
    $user_id  = $_COOKIE['id'];
    
    preg_match_all('/(?<=\s|^)#\w+/u', $message, $matches);
    $tag_text = isset($matches[0][0]) ? $matches[0][0] : null;

    $temp_desc = preg_replace('/#\w+/', '', $message);
    

    $mysql = new mysqli('localhost', 'root', '', 'users');

    if (isset($tag_text)) {
        $result = $mysql -> query("SELECT * FROM `tags` WHERE `text` = '$tag_text'");

        if ($result && $result -> num_rows > 0) {
            $row = $result -> fetch_assoc();
            $tag_id = $row['id'];
        }
    }

    $tag_id_present   = isset($tag_id);
    $tag_save_present = $tag_save == 'save';

    $sql    = "INSERT INTO `sms` (user_id, description";
    $values = "('$user_id', '$temp_desc'";
    
    if ($tag_save_present) {
        $sql .= ", save";
        $values .= ", '$tag_save'";
    }
    if ($tag_id_present) {
        $sql .= ", tag_id";
        $values .= ", '$tag_id'";
    }
    $sql .= ") VALUES " . $values . ")";
    $add_sms = $mysql->query($sql);

    $mysql->close();

    header('Location: /course-work/');
?>