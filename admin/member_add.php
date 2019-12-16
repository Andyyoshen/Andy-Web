<?php
require_once '../Listdb.inc.php';
require_once '../function.php';
print_r($_SESSION);
if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
    header("Location: login.php");
}
//$datas = get_all_article();

//print_r($datas);
?>

<!DOCTYPE HTML>
<html lang="zh-Tw">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>公司網站-後台-會員新增</title>
        <meta name="description" content="baseketball 超人,聯盟">
        <meta name="author" content="帥哥">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="shortcut icon" href="../captain-america.png">
        <link rel="stylesheet" href="../all.css">
    </head>
<!--    <link rel="stylesheet" href="../all.css">-->
    <body>
       <?php include_once 'menu.php';?>
         <div class="main">
          <div class="container">
            <div class="row add_btn_area">
              <div class="co-xs-12">
                  
              </div>
             </div>
              <div class="row">
                  <div class="col-xs-12">
                    <form class="form-horizontal"  id="register_form" >
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
                    <label for="confirm_password" class="col-sm-4 control-label">確認密碼</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" id="confirm_password" placeholder="請再次確認密碼" required>
                    </div>
                  </div>                    
                  <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">暱稱</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="name" id="name" placeholder="請輸入暱稱" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="co-xs-12 text-center">
                      <button type="submit" class="btn btn-default">確認新增</button>
                    </div>
                  </div>
                </form>
                  </div>
              </div>
           </div>
         </div>        
         <?php include_once 'footer.php';?>
        
<!-------------------------------以下為資料存檔----------------------------------------->
        
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>
        $(document).on("ready",function(){
             // 當帳號輸入後 檢查帳號是否重複
            $("#username").on("keyup",function(){
                if($(this).val()!='')
                {
                        //非空字串才檢查
                    $.ajax({
                        type : "POST", //表單傳送的方式 同 form 的method屬性
                        url  : "../check_username.php", //目標給哪個檔案 同 form 的 action 屬性
                        data : {//為要傳過去的資料 使用物件方式呈現 因為變數key值為英文的關係 所以用物件方式送 。 ex{name : "輸入的名子",password : "輸入的密碼"}
                        'n'    : $(this).val() //代表要傳一個 n 變數值為 username 文字方塊裡的值
                        },
                        dataType: 'html' //設定該網頁回應的會是 html 格式
                    }).done(function(data){
                        console.log(data);
                        if(data == 'yes')
                            {
                               alert("此帳號已存在"); $("#username").parent().parent().removeClass('has-success').addClass('has-error');
                                //console.log(data);
                            $("#register_form button").attr('disabled', true);
                            }
                        else
                        {
                            $("#username").parent().parent().removeClass('has-error').addClass('has-success');
                            $("#register_form button").attr('disabled', false);
                        }
                        
                    }).fail(function(jqXHR,textStatus,errorThrom){
                        //失敗的時候
                        alert("有錯誤");
                        console.lag(jqXHR.responseText);
                    });
                }
                else
                {
                    //不檢查帳號
                    $("#username").parent().parent().removeClass('has-success').removeClass('has-error');
                    $("#register_form button").attr('disabled', false);
                }
                //console.log('ttt');
                //console.log($(this).val());
            });
            
           
            
              //當表單送出去得時候 檢查密碼是否兩個都輸入正確
            $('#register_form').on("submit",function(){                   
                 
                //判別兩個密碼是否一樣
                if($("#password").val() != $("#confirm_password").val()){
                    
                    $("#password").parent().parent().addClass('has-error');
                    $("#confirm_password").parent().parent().addClass('has-error');
                    
                   alert("檢查中");
                
                }
                else
                {
                //密碼正確    
                   // $("#password").on("keyup",function(){
                    $.ajax({
                        type : "POST", //表單傳送的方式 同 form 的method屬性
                        url  : "../add_user.php", //目標給哪個檔案 同 form 的 action 屬性
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
                            window.location.href = "member_list.php";
                             alert("新增成功"); 
                        }
                        else
                        {
                            //console.lag('n');
                            alert("新增失敗"); 
                        }
                        
                    }).fail(function(jqXHR,textStatus,errorThrom){
                        //失敗的時候
                        alert("有錯誤");
                        console.lag(jqXHR.responseText);
                    });
                        
                    //});
                }
                     
                   return false;
            });          
        });
        </script>
    
    </body>
</html>