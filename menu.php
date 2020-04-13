<?php
$file_path = $_SERVER['PHP_SELF'];
$file_name = basename($file_path,".php");

switch($file_name){
    case 'Supper_list':
        $page_index = 1;
        break;
    case 'Supper':
        $page_index = 1;
        break;
    case 'work_list':
        $page_index = 2;
        break;
    case 'work':
        $page_index = 2;
        break;
    case 'about':
        $page_index = 3;
        break;
    case 'register':
        $page_index = 4;
        break;
    default:
        $page_index = 0;
        break;
}
?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<div class="top">
    <link rel="stylesheet" href="all.css">
    <div id="my-color" class="jumbotron" style="background-color:bisque">
        <div class="container">
            <div class="row">
                <div class="co-xs-12">
                <div>
            <h4 style="">瀏覽人數:<?php include_once 'Count/WebCount.php'?></h4>
                </div>
                            <h1 class="text-center">公司網站</h1>
<ul class="nav nav-pills">
<li role="presentation" <?php echo ($page_index == 0)?"class='active'":"";?>><a href="First.php">首頁</a></li>
<li role="presentation" <?php echo ($page_index == 1)?"class='active'":"";?>><a href="Supper_list.php">所有文章</a></li>
<li role="presentation"  <?php echo ($page_index == 2)?"class='active'":"";?>><a href="work.php">所有作品</a></li>
<li role="presentation"  <?php echo ($page_index == 3)?"class='active'":"";?>><a href="about.php">關於我們</a></li>
<li role="presentation" <?php echo ($page_index == 4)?"class='active'":"";?>><a href="register.php">註冊</a></li>
<!-- <li role="presentation" <?php echo ($page_index == 5)?"class='active'":"";?>><a href="admin/login.php">會員登入</a></li> -->
<li role="presentation" <?php echo ($page_index == 5)?"class='active'":"";?>><a id="bttest">會員登入</a></li>
</ul>
                    
                </div>
             </div>
        </div>
    </div>
</div>
<!-------------------------------------diolog會員新增-------------------------------->

<div class="modal" tabindex="-1" role="dialog" id="mymodal">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">會員登入</h5>
        <button type="button" class="close" id="bthide_diolog2"data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <label>帳號:</label>
          <div class="form-group">
              <input type="text" class="form-control" id="username">
          </div>
          <label>密碼:</label>
          <div class="form-group">
              <input type="text" class="form-control" id="password">
          </div>
       
      </div>
      <div class="modal-footer">
    <button type="button" class="btn btn-primary" id="bt_sava">登入</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="bthide_diolog">Close</button>
        </div>
        </div>
        </div>
        </div>
<!--------------------------------------會員登入------------------------------------->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>
        $(document).on("ready",function(){
           $("#bttest").on("click",function(){
               $("#mymodal").show("modal");
           }) 
            $("#bthide_diolog,#bthide_diolog2").on("click",function(){
                $("#mymodal").hide("modal");
            })
            $("#bt_sava").on("click",function(){
                $.ajax({
                type:"POST",
                url:"php/verfiry_user.php",
                data:{
                    'un':$("#username").val(),
                    'pw':$("#password").val()
                },
                dataType:'html'
            }).done(function(data){
                console.log(data);
                if(data=='yes'){
                    
                    window.location.href="admin/index.php";
                }
            }).fail(function(jqXHR,textStatus,errorThrom){
                console.log(jqXHR.responseText);
            });
            });
            
        });
        </script>
