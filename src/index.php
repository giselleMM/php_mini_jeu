<?php
    /*
    if(empty($_GET['nom'])){
        echo"pas de nom";
    }else{
        echo"nom";
    }*/

    //enregistre une fonction en tant qu'implémentation
    spl_autoload_register(function ($className){
        require 'classes/' . $className . '.php';
    });

    //base de donnée
    $db = PDOFactory::connexion();

    // [Action] bouton Créer
    if (isset($_POST['creer'])) {
        $nom = $_POST['nom'];
        $type = $_POST['type'];
        //Vérification que le nom ne soit pas vide + nom innexistant
        if(empty($nom)){
            echo"Veuillez saisir un nom";
        }else{
            $personnage = new PersonnageManager($db);
            $personnage->createPerso($nom, $type);
        }
    }
?>
<h1>Création d'un personnage</h1>
<form action="" method="post">
    <label for="nom">
        <input type="text" id="nom" name="nom" placeholder="Saisir le nom de votre Personnage"/>
    </label>
    <label for="type">
        <select name="type" id="type">
            <option value="Magicien">Magicien</option>
            <option value="Guerrier">Guerrier</option>
        </select>
    </label>
    <input type="submit" name="creer" value="Créer">
</form>
<?php
    $query =$db->query('SELECT * FROM personnages');
    $datas = $query->fetchAll();
    foreach ($datas as $data){
        $var = new personnage($data);
        $nom = $var->getNom();
        $type = $var->getType();
        //echo '<pre>' , var_dump($var) , '</pre>';

        #A déplacer
        /* echo "<p>Nom: ". $nom. " | Type: ". $type." <input type='button'  name='test' value='attaquer'></p>";
        if(isset($_POST['attaquer'])){
            echo $nom;
        }
        echo $var->getType(); */

        //Bouton de selection du personnage
        echo '<p>Nom : '.$var->getNom().' | Type : '.$var->getType().' <input type="submit" name="jouer" value="Jouer ce personnage" onclick="test()"></p>';

        #A retirer ?
        echo $var->getType();
    }
    //Fonction quand click sur bouton "Jouer ce personnage"
    function jouer(){
        echo "Mettre bouton attaquer ici";
    }
?>

<!-- Fonction qui "redirige" -->
<script>
    function test(){
        document.write('<?php jouer() ?>');
    }
</script>