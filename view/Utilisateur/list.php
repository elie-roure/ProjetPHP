<!DOCTYPE html>
<html>
    <body>
        <?php
        foreach ($tab_v as $v){
             echo  '<p> Utilisateur de login : <a href="index.php?controller=utilisateur&action=read&login='.rawurlencode($v->getLogin()).'">' . htmlspecialchars($v->getLogin()) . '</a>';
        }
             echo '</br></br><a href="localhost/TD-PHP/TD8/index.php?controller=utilisateur&action=create">Creer un nouvel utilisateur</a>';
        ?>
        
    </body>
</html>
