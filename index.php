<?php
/*
$t =24;
switch ($t) {
    case 1:
        echo "Yes";
    case 2:
        echo "Yes2";
        break;
    case 3:
        echo "Yes3";
    default:
        echo "default";
}*/
#67f5493b4ee74f7188afb91c090df688
/*
$t = md5('kievlvov');
$i =0;
for (;;){
    echo "$i";
    break;
}
*/
/*
ob_start();
include "main1.html";
$html_data = ob_get_clean();
$html_data = str_replace('[[content]]', 'Hello <br> 
                                        123', $html_data);

echo $html_data;
*/
/*
$a = '0';
$a1 = '23a';
$a2 = 25;

echo var_dump(is_numeric($a));
echo var_dump(is_numeric($a1));
echo var_dump(is_numeric($a2));*/
/*
$errors = [];

if ($_POST)  // or isset($_POST['button']) если у кнопки name='button'
    {
    if (isset($_POST['name'])) {
       $name = $_POST['name'];
        if (strlen($name) > 3){
            $errors['name'] = 'Limit';
        }
    }

}
include ("main1.html");
*/

function printArray ($array) {
    ob_start();
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    return ob_get_clean();
}

function render (){
    $array_dump =  printArray($_FILES);
    if ($_FILES && isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $file_name =  $file['name'];
        $new_file_name = md5($file_name.'my_secret'.time());
        $file_name_parts = explode('.', $file_name);
        $file_ext = array_pop($file_name_parts);

        finfo_file(); // правильный способ

        move_uploaded_file(
            $file['tmp_name'],
            "./uploads/{$new_file_name}.{$file_ext}");
    }

    include ("main.html");
}

render();
?>