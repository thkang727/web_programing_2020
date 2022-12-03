
<html>
   <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>db table</title>
   <style type = "text/css">
         body  { font-family: sans-serif;
                 background-color: lightyellow; } 
         table { background-color: lightblue; 
                 border-collapse: collapse; 
                 border: 1px solid gray; }
         td    { padding: 5px; }
         tr:nth-child(odd) {
                 background-color: white; }
      </style>
   </head>
   <body>
    <?php

        $server = "pnuailab.synology.me:3310";
        $user = "201724404"; //<= 여기에 학번을 적으면 됩니다
        $pass = "kthang98";  // <= 여기에 MySQL 비밀번호를 적으면 됩니다
        $dbname = "201724404";
        $conn = new mysqli($server, $user, $pass,$dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }           


         // build SELECT query
        $query = "SELECT  * FROM namecard ;";

        $q_result = mysqli_query( $conn, $query );

        while($q_now = mysqli_fetch_array($q_result)) {
            echo '<p> num ' . $q_now['id'] .'&nbsp; .name ='. $q_now['usrname'] .
            '&nbsp; .scid ='. $q_now['usrsid'] .'&nbsp; .email ='. $q_now['usremail'] . '<br> picurl ='. $q_now['usrpic']. '</p>';
        }

        $conn->close();
      ?><!-- end PHP script -->
      
   </body>
</html>

