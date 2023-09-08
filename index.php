<?php $currentPage = "Overview"; ?>

<!DOCTYPE html>
<html lang="en">

<?php include "inc/head.php"; ?>

<style>
    h2 {
        grid-column: 1/3;
    }

    h3 {
        grid-column: 1/2;
    }

    ul {
        grid-column: 1/2;
    }
</style>

<body>
    
    <div class="container page-layout">

        <?php include "inc/header.php"; ?>

        <?php include "inc/nav.php"; ?>

        <h2>I design and develop software.</h2>

        <h3>I specialize in:</h3>
        <ul>
            <li>Object-Oriented Programming</li>
            <li>Web Development</li>
            <li>Database Applications</li>
        </ul>

        <img src="images/me.png" alt="me">

        <?php include "inc/footer.php"; ?>

    </div>

    <?php include "inc/scripts.php"; ?>

</body>
</html>