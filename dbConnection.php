 <?php   
    function connecToDB($dbName) {
            //  $host = "localhost";
            //  $username = "mayochoa13";
            // $password = "pulpO1013";
            // $dbname = $dbName; 
        // heroku info
         $host = "us-cdbr-iron-east-05.cleardb.net";
         $dbname = $dbName;
         $username = "b6c4f6e311039e";
         $password = "99eed8ab";
        
           //mysql://b6c4f6e311039e:99eed8ab@us-cdbr-iron-east-05.cleardb.net/heroku_83d3890dcc2d78f?reconnect=true
        $dsn = "mysql:host=$host; dbname=$dbname";
        $opt = [
            PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES    => false,
        ];
        $pdo = new PDO($dsn,$username,$password,$opt);
        return $pdo;
        // Create connection
        /*$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/
    
    }
   ?>