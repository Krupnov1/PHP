<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание 1, 2, 3 и 5</title>
</head>
<body>
    <?php
    /*1.Установить программное обеспечение: веб-сервер, базу данных, интерпретатор, текстовый редактор. 
        Проверить, что все работает правильно.*/

    //2.Выполнить примеры из методички и разобраться, как это работает.
        
        print "Hello, World!<br/>";

        $name = "GeekBrains user";
        echo "Hello, $name!<br/>";

        define ( 'MY_CONST' , 100 );
        echo MY_CONST . "<br/>";

        $int10 = 42;
        $int2 = 0b101010;
        $int8 = 052;
        $int16 = 0x2A;
        echo "Десятеричная система $int10<br>";
        echo "Двоичная система $int2 <br>";
        echo "Восьмеричная система $int8<br>";
        echo "Шестнадцатеричная система $int16<br>";

        $precise1 = 1.5;
        $precise2 = 1.5e4;
        $precise3 = 6E-8;
        echo "$precise1 | $precise2 | $precise3<br/>";

        $a = 1;
        echo "$a<br/>";
        echo '$a<br/>';

        $a = 'Hello,';
        $b = 'world';
        $c = $a . $b;
        echo $c . "<br/>";

        $a = 4;
        $b = 5;
        echo $a + $b . "<br>" ; // сложение
        echo $a * $b . "<br>" ; // умножение
        echo $a - $b . "<br>" ; // вычитание
        echo $a / $b . "<br>" ; // деление
        echo $a % $b . "<br>" ; // остаток от деления
        echo $a ** $b . "<br>" ; // возведение в степень

        $a = 4;
        $b = 5;
        $a += $b;
        echo 'a = ' . $a;
        $a = 0;
        echo $a ++; // Постинкремент
        echo ++ $a ; // Преинкремент
        echo $a --; // Постдекремент
        echo -- $a ; // Предекремент

    //3.Объяснить, как работает данный код: 

        $a = 5;
        $b = '05';
        var_dump($a == $b);         // Почему true?
        //Так как сравнение по значению, цисло 5 равняется строке 05 
        var_dump((int)'012345');     // Почему 12345?
        //Так как строка содержит числа, то int переводит её в число. А так как число целое, то 0 отсекается 
        var_dump((float)123.0 === (int)123.0); // Почему false?
        /*float обозначает дробные числа, а int целые числа. В данном примере 123.0 как дробное число не может быть
        равно по типу целому числу 123.0*/
        var_dump((int)0 === (int)'hello, world'); // Почему true?
        //Так как в начале строки не содержится число, то int переводит строку в 0 и при сравнении 0 = 0

    /*5.*Используя только две переменные, поменяйте их значение местами. 
        Например, если a = 1, b = 2, надо, чтобы получилось b = 1, a = 2. 
        Дополнительные переменные использовать нельзя. Сделайте это через битовые операции в одну строчку.*/

        $a = 1;
        $b = 2;

        $a = $a | $b;  
        $b = $a ^ $b;  
        $a = $a ^ $b;  
        echo $a . "<br>"; // 2
        echo $b; // 1

    ?>

</body>
</html>