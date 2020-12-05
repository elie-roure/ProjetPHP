
        <?php
        session_start();
        $panier = array();
        setcookie("panier", serialize($panier), time()+3600);
        $ROOT_FOLDER = __DIR__;
        $DS = DIRECTORY_SEPARATOR;
        require_once $ROOT_FOLDER . $DS.join($DS, array('lib','Session.php'));
        require_once "{$ROOT_FOLDER}$DS". "lib" . "$DS" . "File.php";
        require_once File::build_path(array("controller", "routeur.php"));
        ?>

