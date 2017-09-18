<?php
    include_once("headerMember.php");

    if(isset($_POST['upload'])) {
        include_once("db.php");

        $title = $_POST['title'];
        $story = $_POST['story'];
        $genre = $_POST['genre'];
        $cover = $_POST['cover'];
$date=date("Y-m-d H:i:s");
        
        if ($cover == null) {
            $cover = "https://cdn4.iconfinder.com/data/icons/miu/22/editor_document_file_2-128.png";
        }
       
        $title = mysqli_real_escape_string($db, $title);
        $story = mysqli_real_escape_string($db, $story);
        $genre = mysqli_real_escape_string($db, $genre);
        $cover = mysqli_real_escape_string($db, $cover);

        
        if ($title && $story) {
            $sql = "INSERT INTO stories VALUES ('','$title','$story','$user','$genre', '$cover','','$date')";
            $query = mysqli_query($db, $sql);
            echo "<script type='text/javascript'>
                    $(document).ready(function(){
                    $('#success').modal('show');
                    });
                </script>";
        }else{
            echo "<script type='text/javascript'>
                    $(document).ready(function(){
                    $('#fail').modal('show');
                    });
                </script>";
        }



    }


?>

<html>
    <head>
	   <title>Submit</title>
    </head>
    <body>

    <div style="margin-bottom:5%;" 
    class="container">
            <div class="row"> 
                <div class="panel panel-default">
                    <div class="panel-body">

        <div class="form-group container">
            <div id="login-form">
                <h1 align="center" style="font-weight:200;">Submit</h1>
                    <fieldset>
                        <form style="margin-right:3%;" action="submit.php" method="post" enctype="multipart/form-data">
                            <input style="background-color: #fafafa;" maxlength="25" class="form-control" placeholder="Title" name="title" type="text" autofocus></br>
                            <textarea style="background-color: #fafafa; resize:none" rows="15" cols="50" class="form-control" placeholder="Story" name="story" type="text"></textarea></br>
                            <div class="form-group">
                                <label for="genre">Select One:</label>
                                <select class="form-control" name="genre">
                                    <option value="Action">Action</option>
                                    <option value="Adventure">Adventure</option>
                                    <option value="Chick Lit">Chick Lit</option>
                                    <option value="Classics">Classics</option>
                                    <option value="Fan Fiction">Fan Fiction</option>
                                    <option value="General Fiction">General Fiction</option>
                                    <option value="Historical Fiction">Historical Fiction</option>
                                    <option value="Horror">Horror</option>
                                    <option value="Humor">Humor</option>
                                    <option value="Mystery">Mystery</option>
                                    <option value="Non-Fiction">Non-Fiction</option>
                                    <option value="Paranormal">Paranormal</option>
                                    <option value="Poetry">Poetry</option>
                                    <option value="Random">Random</option>
                                    <option value="Romance">Romance</option>
                                    <option value="Science Fiction">Science Fiction</option>
                                    <option value="Short Story">Short Story</option>
                                    <option value="Spiritual">Spiritual</option>
                                    <option value="Teen Fiction">Teen Fiction</option>
                                    <option value="Vampire">Vampire</option>
                                </select>
                            </div>
                            <input style="background-color: #fafafa;" class="form-control" placeholder="Cover Art Link" name="cover" type="text" autofocus><br>
                            <input class="btn btn-primary" name="upload" data-toggle="modal" type="submit" value="Upload">
                            <br>
                        </form>

                        
                    </fieldset>
            </div>
        </div>


                    </div>
                </div>
            </div>
        </div>







<!-- Button trigger modal -->


        <div class="modal fade" id="success">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <p><center>Your story has been sucessfully uploaded!<center></p>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="fail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <p><center>One or more fields have been left empty!<center></p>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



    </body>
</html>