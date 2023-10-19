<?php $currentPage = "Volunteer"; ?>

<!DOCTYPE html>
<html lang="en">

<?php include "inc/head.php"; ?>

<body>
    
    <div class="container">

        <?php include "inc/header.php"; ?>

        <?php include "inc/nav.php"; ?>

        <?php
            include('../conn.php');

            $sql = "SELECT * FROM Volunteer";
            $result = $conn->query($sql);

            if($result){
                $records = [];
                while($rowHolder = $result->fetch_assoc()){
                    $records[] = $rowHolder;
                }
            }

            foreach($records as $this_row){
                echo '<div class="fade-in">';
                echo '<h2>'.$this_row['JobTitle'].'</h2>';
                echo '<h3><a href="'.$this_row['Link'].'" target="_blank">'.$this_row['CompanyName'].'</a></h3>';
                echo '<p>'.$this_row['Description'].'</p>';
                echo '</div>';
            }

            $conn->close();
        ?>

        <?php include "inc/footer.php"; ?>

    </div>

    <?php include "inc/scripts.php"; ?>

</body>
</html>