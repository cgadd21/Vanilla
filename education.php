<?php $currentPage = "Education"; ?>

<!DOCTYPE html>
<html lang="en">

<?php include "inc/head.php"; ?>

<style>
    .page-layout {
        grid-template-columns: 1fr 1fr 1fr;
    }
    header{
        grid-column: 1/4;
    }
    nav {
        grid-column: 1/4;
    }
    #dean {
        grid-column: 2/3;
        grid-row: 3/4;
    }
    #test {
        grid-column: 3/3;
    }
    footer {
        grid-column: 1/4;
    }
</style>

<body>
    <div class="container page-layout">

        <?php include "inc/header.php"; ?>

        <?php include "inc/nav.php"; ?>

        <div>
            <h2>Rochester Institute of Technology</h2>
            <h3>Bachelor's degree, Computing and Information Technology</h3>
            <h4>2024</h4>
        </div>

        <div>
            <h2>Monroe Community College</h2>
            <h3>Associate's degree, Information Technology</h3>
            <h4>2022</h4>
        </div>

        <div>
            <h2>Attica Senior High School</h2>
            <h3>High School Diploma</h3>
            <h4>2020</h4>
        </div>

        <div id="test">
            <h2>TestOut Corporation</h2>
            <h3>Certified PC Pro</h3>
            <h4>2019</h4>
        </div>

        <div id="dean">
            <h2>Dean's List</h2>
            <div>
                <h3>RIT</h3>
                <ul>
                    <li>May 2023</li>
                </ul>
            </div>
            <div>
                <h3>MCC</h3>
                <ul>
                    <li>Decemeber 2022</li>
                    <li>May 2022</li>
                    <li>May 2021</li>
                    <li>December 2020</li>
                </ul>
            </div>
        </div>

        <?php include "inc/footer.php"; ?>

    </div>

    <?php include "inc/scripts.php"; ?>

</body>
</html>