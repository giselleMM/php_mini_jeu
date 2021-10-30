<?php


class PersonnageManager extends BaseManager
{
//fonction qui recup les info du formulaire pour créer un perso
    public function createPerso(string $nom, string $type){
        //echo $nom .' '. $type;
        if($type === "Magicien"){
            $atq = rand(5,10);
            $request = $this->getDb()->prepare("INSERT INTO personnages (type, nom, pv, atq, def, cd) VALUES ('".$type."', '".$nom."', '100', ".$atq.", '0', true)");
            $request->execute(array(
                "type" => $type,
                "nom" => $nom,
                "pv" => 100,
                "atq" => $atq,
                "def" => 0,
                "cd" => true
            ));
            echo "Création magicien";
        }else{
            $atq = rand(20, 40);
            var_dump($atq);
            $def = rand(10, 19);
            var_dump($def);
            $req = $this->getDb()->prepare("INSERT INTO personnages (type, nom, pv, atq, def, cd) VALUES ('".$type."', '".$nom."', '100', ".$atq.", ".$def.", false)");
            $req->execute(array(
                "type" => $type,
                "nom" => $nom,
                "pv" => 100,
                "atq" => $atq,
                "def" => $def,
                "cd" => false
            ));
            echo "Création Guerrier";
        }
    }
//fonction personnage mort : suppression du personnage de la base de donnée

//fonction personnage mort : suppression du personnage de la base de donnée
    /*
        public function death($enemy){
            //vérifie si l'ennemy a pour pv = 0
            si 0:
                req= "SELECT * FROM personnages WHERE nom =".ennemy->getNom().""
        }
    */

//fonction getPersonnage : Récup et affiche tous les perso de la bdd (code dans index)

}