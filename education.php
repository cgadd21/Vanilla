<?php $currentPage = "Education"; ?>

<!DOCTYPE html>
<html lang="en">

<?php include "inc/head.php"; ?>

<body>
    
    <div class="container">

        <?php include "inc/header.php"; ?>

        <?php include "inc/nav.php"; ?>

        <?php
            include('../conn.php');

            $sql = "SELECT * FROM Education";
            $result = $conn->query($sql);

            if($result){
                $records = [];
                while($rowHolder = $result->fetch_assoc()){
                    $records[] = $rowHolder;
                }
            }

            foreach($records as $this_row){
                echo '<div class="fade-in">';
                echo '<h2>'.$this_row['InstitutionName'].'</h2>';
                echo '<h3>'.$this_row['Degree'].'</h3>';
                echo '<h4>'.$this_row['GraduationYear'].'</h4>';
                echo '</div>';
            }

            $conn->close();
        ?>

        <?php include "inc/footer.php"; ?>

    </div>

    <?php include "inc/scripts.php"; ?>

</body>
</html>