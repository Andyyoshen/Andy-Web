<?php
//print_r($_FILES);
//echo "<hr>";
//print_r($_POST);
//echo $_FILES['file']['tmp_name'];

if(file_exists($_FILES['file']['tmp_name']))
{
    //先定義上傳的資料夾
    $target_folder = $_POST['save_path'];
    //取得圖檔原來的名稱
    $file_name = $_FILES['file']['name'];
    
    
    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_folder.$file_name))
    {
        echo "yes";
    }
    else
    {
        print_r($target_folder);
        echo "檔案轉移失敗 請確認{$_POST['save_path']}資料夾可寫入";
    }    
}   
else
{
    //print_r($_POST['save_path']);
    echo "暫存檔不存在,上傳失敗";
}

?>