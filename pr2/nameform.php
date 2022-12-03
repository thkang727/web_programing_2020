<!DOCTYPE html>

<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>hw05_php01</title>
       <style>
            div.name {
                width: 350px;
                height: 200px;
                padding: 10px;
                border: 1px solid black;
            }
            img {
                float: right;
                width: 100px;
                height: 100px;
                margin-right: 5px;
        }
        </style>
      
      <title>name card</title>
      <style type = "text/css">
         p       { margin: 0px; }
         .error  { color: red }
         p.head  { font-weight: bold; margin-top: 10px; }
      </style>
   </head>

   <body>
    
        <?php

        //$tempid = "";

         // determine whether phone number is valid and print
         // an error message if not
         extract( $_POST ); 
         
         //$tempid = test_input($_POST["tempid"]);
         if (!preg_match( "/^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/", $_POST["ysid"]))
         {
            print( "<p class = 'error'>Invalid school Id form </p>
               <p>A valid school Id number must be in the form 
               123456789 , 
               Please retry & resubmit it.</p>
               <p>Thank You.</p></body></html>" );
            die(); // terminate script execution
         }
         if (!filter_var($yemail, FILTER_VALIDATE_EMAIL))
        {
            print( "<p class = 'error'>Invalid email form</p>
                <p>A valid email must be in the form 
                abc@defg  
                Please retry! </p>
                <p>Thank You.</p></body></html>" );
            die(); // terminate script execution
        }

        $memname = $_POST["yname"]; // creates variable $select
        $memscid = $_POST["ysid"];
        $mememail = $_POST["yemail"];
        $mempic = $_POST["ypic"];

        $img = file_get_contents($mempic);
        $svimg = file_put_contents("myimg.jpg",$img);

        print("<br>");

         // build SELECT query
         $server = "pnuailab.synology.me:3310";
         $user = "201724404"; //<= 여기에 학번을 적으면 됩니다
         $pass = "kthang98";  // <= 여기에 MySQL 비밀번호를 적으면 됩니다
         $dbname = "201724404";
         $conn = new mysqli($server, $user, $pass,$dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "INSERT INTO namecard (usrname, usrsid, usremail, usrpic)
        VALUES ('$memname', '$memscid', '$mememail', '$mempic')";
 
        if ($conn->query($sql) === TRUE) {
            echo "record created successfully";
        } else {
            echo "Error record: " . $conn->error;
         }

         $conn->close();
        ?>


        <div class="name" >
            <?php
            print("<p><img src =\"myimg.jpg\" alt=\"pic\">");
            print("<h2 align = \"center\"> 신분증 </h2>");
            print("<p> 이  름 : $memname</p>"); 
            print("<p> 학  번 : $memscid</p>");
            print("<p> 이메일 : $mememail</p>");
            ?>
        </div>
         <?php
            print("<br><br>");
            print("<a href = \"201724404_hw5_php2.php\">link to db table</a>"); 
        
        ?>
    

   </body>
</html>

