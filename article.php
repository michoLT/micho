
        <?php
        include "mysqli-news.php";

        //unsanitized $_GET usage is a security vulnerability
        // site user can execute a SQL injection

$sanitized_id = (int)$_GET["id"];

        $query = mysqli_query($con, "Select * from news where id=" . $sanitized_id . " ORDER BY time DESC limit 1");
        while ($row = mysqli_fetch_assoc($query)){
          echo $row['article'];
        }

?>
