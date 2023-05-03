<?php
    setcookie('user', $user['full_name'], time() - 3600, '/');
    setcookie('id', $user['id'], time() - 3600, '/');
    header('Location: /course-work/');
?>