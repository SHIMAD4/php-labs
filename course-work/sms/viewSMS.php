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
                echo "<div class='border flex justify-center items-center flex-col w-[600px] mx-0 my-5 px-0 py-5 border-solid border-[black]'>
                        <p class='font-[bold] text-xl mb-2.5'>
                            {$saveTag}
                        </p>
                        <p class='text-[25px] border px-5 py-2.5 border-solid border-[black]'>
                            {$description}
                        </p>
                      <div class='border flex justify-center items-center flex-row gap-2.5 mt-5 mb-0 mx-0 px-[15px] py-0 border-solid border-[black]'>";
            } else {
                echo "<div class='border flex justify-center items-center flex-col w-[600px] mx-0 my-5 px-0 py-5 border-solid border-[black]'>
                        <p class='text-[25px] border px-5 py-2.5 border-solid border-[black]'>
                            {$description}
                        </p>
                      <div class='border flex justify-center items-center flex-row gap-2.5 mt-5 mb-0 mx-0 px-[15px] py-0 border-solid border-[black]'>";
            }

            if ($sms['tag_text'] != null or $sms['tag_text'] != '') {
                echo "<p class='block w-fit text-xl font-[bold]'>
                        {$sms['tag_text']}
                      </p>";
            } else {
                echo "<p class='block w-fit text-xl font-[bold]'>
                        Нет хештегов.
                      </p>";
            }

            echo "</div></div>";
        }
    } else {
        echo "Нет сообщений.";
    }

    $mysqli->close();

?>