<?php
require_once '../Listdb.inc.php';
require_once '../function.php';
print_r($_SESSION);
if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
    header("Location: login.php");
}
$datas = get_edit_article($_GET["i"]);

//print_r($datas);
?>

<!DOCTYPE HTML>
<html lang="zh-Tw">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>公司網站-後台-文章編輯</title>
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
                    <form id="article">
                    <input type="hidden" id="id" value="<?php echo $datas['id'];?>">
                          <div class="form-group">
                            <label for="title">標題</label>
                            <input type="text" class="form-control" id="title" placeholder="輸入標題" value="<?php echo $datas['title'];?>">
                          </div>
                          <div class="form-group">
                              <label for="category">分類</label>
                            <select id="category" class="form-control">
                            <option value="新聞" <?php echo ($datas['category'] == "新聞")?'selected':'';?>>新聞</option>
                            <option value="心得" <?php echo ($datas['category'] == "心得")?'selected':'';?>>心得</option>
                            </select>
                          </div>
                          <div class="form-group" >
                            <label for="content" >內文</label>
                            <textarea id="content" class="form-control" rows="10"><?php echo $datas['content'];?></textarea>
                          </div>
                          <div class="form-group">
                            <label class="radio-inline">
                              <input type="radio" name="publish" value="1" <?php echo ($datas['publish'] ==1 )?'checked':'';?> checked> 發布
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="publish" value="0"  <?php echo ($datas['category'] == 0)?'checked':'';?>> 不發布
                            </label>
                          </div>
                          <button type="submit" class="btn btn-default">存檔</button>
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
            
            
           
            
              //當表單送出去得時候 檢查密碼是否兩個都輸入正確
            $('#article').on("submit",function(){                   
                if($("#title").val() =='' || $("#content").val() == '')
                    {
                        alert("請填妥標題或內文");
                    }
                else
                    {
                        $.ajax({
                        type : "POST", //表單傳送的方式 同 form 的method屬性
                        url  : "../update_article.php", //目標給哪個檔案 同 form 的 action 屬性
                        data : {//為要傳過去的資料 使用物件方式呈現 因為變數key值為英文的關係 所以用物件方式送 。 ex{name : "輸入的名子",password : "輸入的密碼"}
                        'id'    : $("#id").val(),
                        'title'    : $("#title").val(), //代表要傳一個 n 變數值為 username 文字方塊裡的值
                        'category'    : $("#category").val(), //代表要傳一個 n 變數值為 username 文字方塊裡的值
                        'content'    : $("#content").val(), //代表要傳一個 n 變數值為 username 文字方塊裡的值
                        'publish'   : $("input[name='publish']:checked").val()   
                        },
                        dataType: 'html' //設定該網頁回應的會是 html 格式
                    }).done(function(data){
                        console.log(data);
                        if(data == true)
                        {
                            alert("更新成功.點擊確認回到列表頁"); 
                            window.location.href = "article_list.php";
                             
                        }
                        else
                        {
                            console.log(data);
                            alert("更新失敗" + data); 
                        }
                        
                    }).fail(function(jqXHR,textStatus,errorThrom){
                        //失敗的時候
                        alert("有錯誤");
                        console.lag(jqXHR.responseText);
                    });
                        
                    
                    }
                    
                
                     
                   return false;
            });          
        });
        </script>
    
    </body>
</html>