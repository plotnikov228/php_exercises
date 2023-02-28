<?php
$source = "./upload";

if (file_exists($source) == false) {
    if (!mkdir($source, 0777, true)) {
        die('Не удалось создать директорий...');
    }
}

$name = $_FILES['csv']['name'];
$ext = explode('.', $name);
$ext = end($ext);
if($_FILES['csv']['error'] == 0 and $ext == 'csv'){
    
$tmpName = $_FILES['csv']['tmp_name'];
    if(($handle = fopen($tmpName, 'r')) !== FALSE) {

        $row = 0;

        while(($data = fgetcsv($handle, 1000, ';')) !== FALSE) {
            $rowName = $data[0];
            $rowContent = $data[1];
            $row++;
            $type = explode('.', $rowName);
            $fh = fopen('./upload/' . $row . "." . end($type), 'w');
            fwrite($fh, $rowContent);
            fclose($fh);
        }
        fclose($handle);
    }
    
}


//Какие дыры это может создать? Как бороться?

//Если в csv будет больше 2 столбцов то эта функция их учитывать не будет. Для того что-бы этого избежать нужно будет создавать цикл,
// который будет прогонятся по длине "$data = fgetcsv($handle, 1000, ';')". 
