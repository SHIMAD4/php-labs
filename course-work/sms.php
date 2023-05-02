<?php
    $message = $_POST['message'];
    $tag_save = $_POST['save-btn'];
    $user_id = $_COOKIE['id'];

    $mysql = new mysqli('localhost', 'root', '', 'users');

    preg_match_all('/(?<=\s|^)#\w+/u', $message, $matches);
    $tag_text = isset($matches[0][0]) ? $matches[0][0] : null;

    $temp_desc = preg_replace('/#\w+/', '', $message);

    if (isset($tag_text)) {
        $result = $mysql->query("SELECT * FROM `tags` WHERE `text` = '$tag_text'");

        if ($result && $result -> num_rows > 0) {
            $row = $result->fetch_assoc();
            $tag_id = $row['id'];
        }
    }

    if (isset($tag_id) and $tag_save == 'save') {
        $add_sms = $mysql -> query("INSERT INTO `sms` (user_id, description, save, tag_id) VALUES ('$user_id', '$temp_desc', '$tag_save', '$tag_id')");

    } elseif ($tag_save == 'save' and !isset($tag_id)) {
        $add_sms = $mysql -> query("INSERT INTO `sms` (user_id, description, save) VALUES ('$user_id', '$temp_desc', '$tag_save')");

    } elseif ($tag_save != 'save' and isset($tag_id)) {
        $add_sms = $mysql -> query("INSERT INTO `sms` (user_id, description, tag_id) VALUES ('$user_id', '$temp_desc', '$tag_id')");

    } else {
        $add_sms = $mysql -> query("INSERT INTO `sms` (user_id, description) VALUES ('$user_id', '$temp_desc')");
    }

    $mysql->close();

    header('Location: /course-work/');
?>