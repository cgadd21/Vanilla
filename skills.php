<?php $currentPage = "Skills"; ?>

<!DOCTYPE html>
<html lang="en">

<?php include "inc/head.php"; ?>

<body>
    
    <div class="container">

        <?php include "inc/header.php"; ?>

        <?php include "inc/nav.php"; ?>
        
        <?php
            include('../conn.php');

            $sql = "SELECT * FROM Skill";
            $result = $conn->query($sql);

            if($result){
                $records = [];
                while($rowHolder = $result->fetch_assoc()){
                    $records[] = $rowHolder;
                }
            }

            $groupedRecords = array();

            foreach ($records as $this_row) {
                $category = $this_row['Category'];
                if (!isset($groupedRecords[$category])) {
                    $groupedRecords[$category] = array();
                }
                $groupedRecords[$category][] = $this_row;
            }

            foreach ($groupedRecords as $category => $categoryRecords) {
                echo '<div class="fade-in">';
                echo '<h2>' . $category . '</h2>';
                foreach ($categoryRecords as $record) {
                    echo '<h3>' . $record['SkillName'] . '</h3>';
                }
                echo '</div>';
            }

            $conn->close();
        ?>

        <?php include "inc/footer.php"; ?>

    </div>

    <?php include "inc/scripts.php"; ?>
    
</body>
</html>