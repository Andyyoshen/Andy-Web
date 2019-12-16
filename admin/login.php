<?php
require_once '../Listdb.inc.php';
print_r($_SESSION);
if(isset($_SESSION['is_log']) && $_SESSION['is_log']){
    header("Location: index.php");
}
?>

<!DOCTYPE HTML>
<html lang="zh-Tw">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>會員註冊</title>
        <meta name="description" content="baseketball 超人,聯盟">
        <meta name="author" content="帥哥">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="shortcut icon" href="../captain-america.png">
        <link rel="stylesheet" href="../all.css">
    </head>
    <link rel="stylesheet" href="../all.css">
    <body>
       
         <div class="main">
          <div class="container">
            <div class="row">
              <div class="co-xs-12 col-sm-6 col-sm-offset-3 thumbnail">
                  <h1>會員登入</h1>
                <form class="form-horizontal"  id="login_form" method="get" action="php/add_member.php">
                  <div class="form-group">
                    <label for="username" class="col-sm-4 control-label">帳號</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="username" id="username" placeholder="請輸入帳號" required>
                    </div>
                    <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">密碼</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="password" class="form-control"  name="password" id="password" placeholder="請輸入密碼" required>
                    </div>
                  </div>
                                    
                 
                  <div class="form-group">
                    <div class="co-xs-12 text-center">
                      <button type="submit" class="btn btn-default">登入</button>
                    </div>
                  </div>
                </form>
              </div>
             </div>
           </div>
         </div>        
         <?php include_once 'footer.php';?>
    
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>
        $(document).on("ready",function(){
             // 當帳號輸入後 檢查帳號是否重複
            
            
           
            
              //當表單送出去得時候 檢查密碼是否兩個都輸入正確
            $('#login_form').on("submit",function(){                   
                                               
                //密碼正確    
                   // $("#password").on("keyup",function(){
                    $.ajax({
                        type : "POST", //表單傳送的方式 同 form 的method屬性
                        url  : "../php/verfiry_user.php", //目標給哪個檔案 同 form 的 action 屬性
                        data : {//為要傳過去的資料 使用物件方式呈現 因為變數key值為英文的關係 所以用物件方式送 。 ex{name : "輸入的名子",password : "輸入的密碼"}
                        'un'    : $("#username").val(), //代表要傳一個 n 變數值為 username 文字方塊裡的值
                        'pw'    : $("#password").val(), //代表要傳一個 n 變數值為 username 文字方塊裡的值
                        'n'    : $("#name").val() //代表要傳一個 n 變數值為 username 文字方塊裡的值
                        },
                        dataType: 'html' //設定該網頁回應的會是 html 格式
                    }).done(function(data){
                        console.log(data);
                        if(data == 'yes')
                        {
                            alert("登入成功"); 
                            window.location.href = "index.php";
                             
                        }
                        else
                        {
                            //console.lag('n');
                            alert("登入失敗"); 
                        }
                        
                    }).fail(function(jqXHR,textStatus,errorThrom){
                        //失敗的時候
                        alert("有錯誤");
                        console.lag(jqXHR.responseText);
                    });
                        
                    //});
                
                     
                   return false;
            });          
        });
        </script>
    </body>
</html>