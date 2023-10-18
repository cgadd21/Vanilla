<?php $currentPage = "Projects"; ?>

<!DOCTYPE html>
<html lang="en">

<?php include "inc/head.php"; ?>

<body>

    <div class="container">

        <?php include "inc/header.php"; ?>

        <?php include "inc/nav.php"; ?>

        <?php
            include('../conn.php');

            $sql = "SELECT * FROM Project";
            $result = $conn->query($sql);

            if($result){
                $records = [];
                while($rowHolder = $result->fetch_assoc()){
                    $records[] = $rowHolder;
                }
            }

            foreach($records as $this_row){
                echo '<div>';
                echo '<h2><a href="'.$this_row['ProjectLink'].'" target="_blank">'.$this_row['ProjectName'].'</a></h2>';
                echo '<p>'.$this_row['ProjectDescription'].'</p>';
                echo '</div>';
            }

            $conn->close();
        ?>

        <?php include "inc/footer.php"; ?>

    </div>

    <?php include "inc/scripts.php"; ?>
    
</body>
</html>