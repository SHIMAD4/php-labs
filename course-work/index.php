<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Work</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center h-screen">
    <div class="container mx-auto flex flex-col justify-center items-center">

        <?php if($_COOKIE['user'] == ''): ?>

        <form class="flex flex-col mx-auto w-fit"
              action="./auth/auth.php"
              method="post">
            <label class="flex flex-col justify-center items-center">
                <input class="border-2 border-black border-solid text-[16px] px-[40px] py-[20px] mb-[10px]"
                       type="text"
                       name="login"
                       id="login"
                       placeholder="Введите логин">
            </label>
            <label class="flex flex-col justify-center items-center">
                <input class="border-2 border-black border-solid text-[16px] px-[40px] py-[20px] mb-[10px]"
                       type="text" 
                       name="pass"
                       id="pass"
                       placeholder="Введите пароль">
            </label>
            <label class="flex flex-col justify-center items-center mt-[10px]">
                <button class="border-2 border-[#ccc] border-solid bg-black text-white px-[30px] py-[15px] rounded-[10px] text-[20px] hover:cursor-pointer active:opacity-[.7]" 
                        type="submit">Войти</button>
            </label>
        </form>

        <?php else: ?>

        <div class="flex justify-center items-center gap-[50px] mt-50px">
            <form class="flex justify-center items-center flex-col" action="./sms/addSMS.php" method="post">
                <h2 class="text-[24px] font-bold text-black text-center mb-[30px]">
                    Привет <?= $_COOKIE['user'] ?>.</br>
                    Чтобы выйти нажмите
                    <a class="text-red-600 text-[24px] font-bold text-center" href="./auth/exit.php">здесь.</a>
                </h2>
                <label>
                    <textarea class="resize-none p-[20px] text-[17px] border-2" name="message" id="message" cols="40" rows="8"></textarea>
                </label>
                <label class="flex justify-center items-center mb-[20px]">
                    <input class="mr-[10px]" type="checkbox" name="save-btn" id="save-btn" value="save">
                    <span class="font-bold uppercase text-[17px]">save message</span>
                </label>
                <label>
                    <button class=" border-2 border-[#ccc] border-solid bg-black text-white px-[30px] py-[15px] rounded-[10px] text-[20px] hover:cursor-pointer active:opacity-[.7]" type="submit">
                        Отправить
                    </button>
                </label>
            </form>
            <div class="scroll-style flex flex-col items-center h-[530px] overflow-y-scroll pr-[20px]">
                <?php include './sms/viewSMS.php'; ?>
            </div>
        </div>

        <?php endif; ?>

    </div>
</body>
</html>