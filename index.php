<?php $currentPage = "Overview"; ?>

<!DOCTYPE html>
<html lang="en">

<?php include "inc/head.php"; ?>

<style>
    h2 {
        grid-column: 1/3;
    }

    ul {
        grid-column: 1/3;
    }
</style>

<body>
    
    <div class="container page-layout">

        <?php include "inc/header.php"; ?>

        <?php include "inc/nav.php"; ?>

        <h2>I specialize in:</h2>

        <ul>
            <li class="fade-in-item">Object-Oriented Programming</li>
            <li class="fade-in-item">Web Development</li>
            <li class="fade-in-item">Database Applications</li>
        </ul>

        <?php include "inc/footer.php"; ?>

    </div>

    <?php include "inc/scripts.php"; ?>

</body>
</html>