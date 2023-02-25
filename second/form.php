<?php
$source = "./upload";

if (file_exists($source) == false) {
    if (!mkdir($source, 0777, true)) {
        die('Не удалось создать директорий...');
    }
}

if($_FILES['csv']['error'] == 0){
    $name = $_FILES['csv']['name'];
    $ext = explode('.', $name);
    $ext = end($ext);
    $tmpName = $_FILES['csv']['tmp_name'];

    if($ext === 'csv'){
        if(($handle = fopen($tmpName, 'r')) !== FALSE) {
            // necessary if a large csv file
            set_time_limit(0);

            $row = 0;

            while(($data = fgetcsv($handle, 1000, ';')) !== FALSE) {
                $rowName = $data[0];
                $rowContent = $data[1];
                $row++;
                $type = explode('.', $rowName);
                $fh = fopen('./upload/' . $row . "." . end($type), 'w');
                fwrite($fh, $rowContent);
            }
            fclose($handle);
        }
    }
}
