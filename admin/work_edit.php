<?php
require_once '../Listdb.inc.php';
require_once '../function.php';
print_r($_SESSION);
if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
    header("Location: login.php");
}
$data = get_edit_work($_GET['i']);

//print_r($datas);
?>

<!DOCTYPE HTML>
<html lang="zh-Tw">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>公司網站-後台-作品編輯</title>
        <meta name="description" content="baseketball 超人,聯盟">
        <meta name="author" content="帥哥">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
        
        <link rel="shortcut icon" href="../captain-america.png">
        <link rel="stylesheet" href="../all.css">
    </head>
   <!--<link rel="stylesheet" href="../all.css">-->
    <body>
       <?php include_once 'menu.php';?>
        
 
        
     <div class="container">
  <!--<h2>Activate Modal with JavaScript</h2>-->
  <!-- Trigger the modal with a button -->
  <!--<button type="button" class="btn btn-info btn-lg" id="myBtn">Open Modal</button>-->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">注意!!!</h4>
        </div>
        <div class="modal-body">
          <p>你確定要刪除嗎?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>   
        
        
        
        
        
        
  
        
        
        
        
        
        
        
        
        
        
         <div class="main">
          <div class="container">
            <div class="row add_btn_area">
              <div class="co-xs-12">
                  
              </div>
             </div>
              <div class="row">
                  <div class="col-xs-12">
                      <h2>新增編輯</h2>
                    <form id="work">
                        <input type="hidden" id="id" value="<?php echo $data['id'];?>">
                          <div class="form-group">
                            <label for="intro">簡介</label>
                     <textarea id="intro" class="form-control" rows="10"><?php echo $data['intro'];?></textarea>
                          </div>
                          <div class="form-group">
                              <label for="content">圖片上傳</label>
                            <input type="file" class="image">
                            <input type="hidden" id="image_path" value="<?php echo (!is_null($data['image_path']))?$data['image_path']:'';?>">
                              <div class='show_image'>
                              <?php if(!is_null($data['image_path'])):?>
                                  <img src='<?php echo "../".$data['image_path'] ?>'>
                                <?php endif;?> 
                              </div>
                              <a href='javascrip:void(0);' class="del_image btn btn-danger">刪除</a>
                          </div>
                          <div class="form-group" >
                            <label for="content" >影片上傳</label>
                              <textarea id="content" class="form-control" rows="10"></textarea>
                            <input type="file" class="video" accept="video/mp4">
                            <input type="hidden" id="video_path" value="<?php echo (!is_null($data['video_path']))?$data['video_path']:'';?>">
                              <div class='show_video'>
                              <?php if(!is_null($data['video_path'])):?>
                                  <video src="<?php echo "../". $data['video_path'] ?>" controls></video>
                                <?php endif;?>  
                              </div>
                              <a href='javascrip:void(0);' class="del_video btn btn-danger">刪除</a>
                          </div>
                          <div class="form-group">
                            <label class="radio-inline">
                              <input type="radio" name="publish" value="1" <?php echo ($data['publish'] == 1)?"checked":"";?>> 發布
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="publish" value="0" <?php echo ($data['publish'] == 0)?"checked":"";?>> 不發布
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
        
        <!--<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>-->
        
 
        <script>
            
                    
                                                      
        $(document).on("ready",function(){          
            
            $("input.image").on("change",function(){
                var save_path = "files/images/", // 暫存資料夾
                    form_data = new FormData(),                   
                    file_data = $(this)[0].files[0];
                 
                //console.log($(this)[0].files[0]);
            form_data.append("file",file_data); //傳送資料
            form_data.append("save_path" , save_path); 
                //console.log(form_data);
            
            //var form_data = new FormData();  
                
                
/*---------------------------AJAX圖片選擇後自動上傳------------------------------------*/
           
            $.ajax({
                type : 'POST',
                url : '../upload_file.php',
                data : form_data,
                cache : false,
                processData : false,
                contentType : false,
                dataType : 'html'
            }).done(function(data){
                //console.log(data);
                if(data == "yes"){
                    console.log(data);
                    //顯示圖片  "<img src=' ../" + save_path + file_data['name'] + "'>"
                    //console.log($("div.show_image"));
                    $("div.show_image").html("<img src=' ../" + save_path + file_data['name'] + "'>" );
                    //把相對路經放到 input裡面,之後送出表單,才可以抓得到
                    $("#image_path").val(save_path + file_data['name']);
                }
                
                //console.log(data);
            }).fail(function(jqXHR, textStatus, errorThrown){
                alert("錯誤請看 console log");
                console.log(jqXHR.responseText);
            });
        });
 
/*-----------------------------------AJAX圖片刪除-------------------------------------*/                            
            $("a.del_image").on("click", function(){
            var c = confirm("妳確定要刪除嗎");
                
            
            //var c = $("#myModal").modal();
           
                
                
                
              //var c = $("#myModal").modal();
            if($("#image_path").val() != '')
            {
                    
                if(c){
                $.ajax({
                    type : 'POST',
                    url : '../del_file.php',
                    data : {
                        'file' : $("#image_path").val()
                    },              
                    dataType : 'html'
                }).done(function(data){
                    console.log(data);
                    if(data == "yes"){
                        //清除圖片                   
                        $("div.show_image").html("");
                        //把相對路經清除
                        $("image_path").val('');
                        //以選擇檔案的input 也要清除
                        $("input.image").val('');
                    }
                }).fail(function(jqXHR, textStatus, errorThrown){
                    alert("錯誤請看 console log");
                    console.log(jqXHR.responseText);
                });
                    }
            }
            else
            {
                console.log(data);
                    alert("尚未上傳檔案,無法刪除");
            }
                
            });
/*-----------------------AJAX影片選擇後自動上傳----------------------------------------*/
                       
                $("input.video").on("change",function(){
                    var save_path = "files/videos/", // 暫存資料夾
                        form_data = new FormData(),                   
                        file_data = $(this)[0].files[0];

                    //console.log($(this)[0].files[0]);
                form_data.append("file",file_data); //傳送資料
                form_data.append("save_path" , save_path); 
                    //console.log(form_data);
                $("div.show_video").html('<i class="fas fa-spinner fa-pulse"></i>');
                //var form_data = new FormData();  

                $.ajax({
                    type : 'POST',
                    url : '../upload_file.php',
                    data : form_data,
                    cache : false,
                    processData : false,
                    contentType : false,
                    dataType : 'html'
                }).done(function(data){
                    //console.log(data);
                    if(data == "yes"){
                        //顯示影片                   
                        $("div.show_video").html("<video src=' ../" + save_path + file_data['name'] + "'controls>" );
                        //把相對路經放到 input裡面,之後送出表單,才可以抓得到
                        $("#video_path").val(save_path + file_data['name']);
                    }
                }).fail(function(jqXHR, textStatus, errorThrown){
                    alert("錯誤請看 console log");
                    console.log(jqXHR.responseText);
                });
            });
 /*----------------------------AJAX影片刪除-------------------------------------------*/       
                                
             $("a.del_video").on("click", function(){
            var c = confirm("妳確定要刪除嗎");
                
                
            if($("#video_path").val() != '')
            {
                    
                if(c){
                $.ajax({
                    type : 'POST',
                    url : '../del_file.php',
                    data : {
                        'file' : $("#video_path").val()
                    },              
                    dataType : 'html'
                }).done(function(data){
                    console.log(data);
                    if(data == "yes"){
                        //清除影片                   
                        $("div.show_video").html("");
                        //把相對路經清除
                        $("video_path").val('');
                        //以選擇檔案的input 也要清除
                        $("input.video").val('');
                    }
                }).fail(function(jqXHR, textStatus, errorThrown){
                    alert("錯誤請看 console log");
                    console.log(jqXHR.responseText);
                });
                    }
            }
            else
            {
                //console.log(data);
                    alert("尚未上傳檔案,無法刪除");
            }
                
            });
            
/*----------------------------------------------------------------------------------*/           
              //當表單送出去得時候 檢查密碼是否兩個都輸入正確
            $('#work').on("submit",function(){                   
                if($("#title").val() == '')
                    {
                        alert("請填妥簡介");
                    }
                else
                    {
                        $.ajax({
                        type : "POST", //表單傳送的方式 同 form 的method屬性
                        url  : "../update_work.php", //目標給哪個檔案 同 form 的 action 屬性
                        data : {//為要傳過去的資料 使用物件方式呈現 因為變數key值為英文的關係 所以用物件方式送 。 ex{name : "輸入的名子",password : "輸入的密碼"}                                            
                        'id' : $("#id").val(),
                        'intro'    : $("#intro").val(), //代表要傳一個 n 變數值為 username 文字方塊裡的值
                        'image_path'    : $("#image_path").val(), //代表要傳一個 n 變數值為 username 文字方塊裡的值
                        'video_path'    : $("#video_path").val(), //代表要傳一個 n 變數值為 username 文字方塊裡的值
                        'publish'   : $("input[name='publish']:checked").val()                                                                            
                        },
                        dataType: "html" //設定該網頁回應的會是 html 格式
                    }).done(function(data){
                            
                        //console.log(data);
                        if(data == true)
                        {
                            console.log(data);
                            alert("編輯成功.點擊確認回到列表頁"); 
                            window.location.href = "work_list.php";
                             
                        }
                        else
                        {
                              console.log(data);
                            alert("編輯失敗" + data); 
                        }
                        
                    }).fail(function(jqXHR,textStatus,errorThrom){
                        //失敗的時候
                        alert("有錯誤");
                        console.log(jqXHR.responseText);
                    });
                        
                    
                    }
                    
                
                     
                   return false;
            });          
        });
        </script>
    
    </body>
</html>