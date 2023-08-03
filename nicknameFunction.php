<?php
function nicknameFunction(string $text):string{

    // Находим потенциальные никнеймы

    $nicknames = [];
    $words = explode(' ', $text);
    for($i = 0; $i < count($words); $i++){
        $word = $words[$i];
        if($word[0] === '@'){
            array_push($nicknames, $word);
        }
    }

    /* Проверяем никнеймы на условия: первое значение не должно быть цифрой
    и ник должен состоять из символов английского алфавита и цифр */

    $sortedNicknames = [];
    for($i = 0; $i < count($nicknames); $i++){
        $nicknames[$i] = substr($nicknames[$i], 1);
        if(preg_match('/^[a-z][a-z0-9]*$/i', $nicknames[$i]) === 1){
            array_push($sortedNicknames, $nicknames[$i]);
        }
    }

    /* Добавляем тег <b> к исходной строке */

    for($i = 0; $i < count($sortedNicknames); $i++){
        $word = '@' . $sortedNicknames[$i];
        $splitText = explode($word, $text);
        $text = $splitText[0] . "<b>" . $word . '</b>' . $splitText[1];
    }
    echo $text;
    return $text;
}
nicknameFunction('Правильный ник: @usersnick | неправильный ник: @usernick;');