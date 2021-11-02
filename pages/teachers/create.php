<!DOCTYPE html>
<html lang="en">

    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/components/head.php'); ?>

    <body class="sb-nav-fixed">

        <?php require_once($_SERVER['DOCUMENT_ROOT'].'/components/top.menu.php'); ?>

        <div id="layoutSidenav">

            <?php require_once($_SERVER['DOCUMENT_ROOT'].'/components/left.menu.php'); ?>

            <div id="layoutSidenav_content">

                <?php require_once($_SERVER['DOCUMENT_ROOT'].'/pages/teachers/create_form.php'); ?>
                <?php require_once($_SERVER['DOCUMENT_ROOT'].'/components/footer.php'); ?>

            </div>
        </div>

        <?php require_once($_SERVER['DOCUMENT_ROOT'].'/components/scripts.php'); ?>
        
    </body>
</html>