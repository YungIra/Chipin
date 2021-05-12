<?php
    define ("ServerName", "localhost");
    define ("User", "c21535_chipin_ai_info_ru");
    define ("Pass", "SeNgaQawqevay75");
    define ("Db", "c21535_chipin_ai_info_ru");
    
    $con = new mysqli(ServerName, User, Pass, Db);

    if ($con->connect_error) 
        die("Connection failed: " . $con->connect_error);
    
    $request = "SELECT name, age, quantity, payment FROM main";
    $result = $con ->query($request);
    $array = [];
    if ($result -> num_rows > 0)
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            $array[] = $row;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Скинемся!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script src="scripts/js/consoleLog.js"></script>
</head>
<body>
    <header>
        <div class="header-content">
            <a href="/"><img class="header-content-logo" src="assets/images/logo.png" alt="logo"></a>
        </div>
    </header>
</body>
    <h1>Гости</h1>
    <table class="persons" id="personsTable">
        <tr class="persons-titles">
            <td class="persons-titles-title">Имя</td>
            <td class="persons-titles-title">Возраст</td>
            <td class="persons-titles-title">Сколько берёт</td>
            <td class="persons-titles-title">Сколько скидывает</td>
        </tr>
        <? foreach($array as $arElement): ?>
            <tr class="persons-content">
                <td class="persons-content-note"><?=$arElement["name"]?></td>
                <td class="persons-content-note"><?=$arElement["age"]?></td>
                <td class="persons-content-note"><?=$arElement["quantity"]?></td>
                <td class="persons-content-note"><?=$arElement["payment"]?></td>
            </tr>
        <? endforeach; ?>
    </table>
    <h1>Добавить гостя</h1>
        <div class="add-person-div">
            <div class="add-person-form-pole">
                <label class="add-person-form-label" for="name">Имя</label>
                <input class="add-person-form-input form-input-name" type="text" id="addGuestUsername">
            </div>
            <div class="add-person-form-pole">
                <label class="add-person-form-label" for="name">Возраст</label>
                <input class="add-person-form-input form-input-age" type="text" id="addGuestAge">
            </div>
            <div class="add-person-form-pole">
                <label class="add-person-form-label" for="name">Сколько берёт</label>
                <input class="add-person-form-input form-input-amount" type="text" id="addGuestQuantity">
            </div>
            <div class="add-person-form-pole">
                <label class="add-person-form-label" for="name">Сколько скидывает</label>
                <input class="add-person-form-input form-input-sum" type="text" id="addGuestTotal">
            </div>
            <button class="add-person-form-submit" type="submit"id ="addGuestButton">Сохранить</button>
        </form>
</html>