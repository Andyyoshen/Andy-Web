<!DOCTYPE html>

<html>
    <head>
        <title>
            會員註冊
        </title>
    </head>
    <style>
        form{
            border :#aaa solid 1px;
            margin:20px auto;
            padding : 30px;
            width: :300px;
        }
        
    </style>
    <body>
    <form method="post" action="checkSign.php">
    <div>
      帳號:<input type="text"  name="signname"> 
    </div>
    <div>
      密碼:<input type="text" name="signpassword">
    </div>
           <button type="submit">
               註冊
        </button>
        <input type="button"  value="首頁" onclick="location.href='http://localhost/Andy/SUPPER.html'"> 
    </form>
    </body>
</html>

