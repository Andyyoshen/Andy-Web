<?php
 require_once 'Listdb.inc.php';
    
    if(isset($_SESSION['is_log'])&&$_SESSION['is_log']){
        header("Location: index.php");
    }
?>

<!DOCTYPE HTML>
<html lang="zh-Tw">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>公司網站</title>
        <meta name="description" content="baseketball 超人,聯盟">
        <meta name="author" content="帥哥">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="shortcut icon" href="captain-america.png">
        <link rel="stylesheet" href="all.css">
    </head>
    <link rel="stylesheet" href="all.css">
    <body>
        <!-- <button id="btdiolog">按我</button> -->
       <?php include_once 'menu.php';?>
         <div class="main">
          <div class="container">
            <div class="row">
              <div class="co-xs-12">
                  <div class="alert alert-success" role="alert">歡迎來到復仇者聯盟
                  </div>
              </div>
             </div>
           </div>
             <?php include_once 'slide_show.php';?>
         </div>        
         <?php include_once 'footer.php';?>
        <?php //include_once 'slide_show.php';?>
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
    </body>
    <?php //include_once 'slide_show.php';?>
</html>