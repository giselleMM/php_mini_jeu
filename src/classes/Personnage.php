<?php


class personnage
{
    //Attributs
    private string $type;
    private string $nom;
    private int $pv = 100;
    private int $atq;
    private int $def;
    //private int $cd;
    private int $etat;

    //Etat du personnage
    const AUTO_ATTACK = 1;
    const ATTACK_SUCCESS = 2;
    const ENDORMI = 3;
    const DEAD = 4;

    public function __construct(array $data){
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (is_callable([$this, $method])) {
                $this->$method($value);
            }
        }
    }

    //btn jouer : récup le joueur

    //fonction verif si endormie : temps restant

    //fonction attaque - param ennemie : modification pv/def (appel verif 
    public function attack($adversaire): void{
        if($this->getName() == $adversaire->getName()){
            echo"Vous ne pouvez pas vous attaquer vous même";
        }
        else{
            #Prendre les pv, l'atq et la def de l'adversaire
            $pvRestant = $personnage->getPv() - ($this->getAtq() - $personnage->getDef());
            if($this->getAtq() > $personnage->getDef()){ #Self atq et enemy def
                $degats = $this->getAtq() - $personnage->getDef();
                echo"Bravo, vous avez infligé" .$degats. "points de dégâts.";
                $pvRestant = $personnage->getPv() - $degats;
                echo"Il reste" .$pvRestant. "points de vie à votre adversaire.";
                if ($pvRestant > $personnage->getPv()){
                    return;
                }
                elseif($pvRestant <= 0){
                    echo"Votre adversaire est mort";
                }
                $personnage->setPv($pvRestant);
                return;
            }
            else{
                echo"Vous n'avez pas assez d'attaque pour infliger des dégâts à votre adversaire.";
            };
        };
    }

    //Fonction qui permet de savoir quel perso joué
    function jouer(){
        echo $this->getNom();
    }
    //fonction verif auto attaque

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return int
     */
    public function getPv(): int
    {
        return $this->pv;
    }

    /**
     * @param int $pv
     */
    public function setPv(int $pv): void
    {
        $this->pv = $pv;
    }

    /**
     * @return int
     */
    public function getAtq(): int
    {
        return $this->atq;
    }

    /**
     * @param int $atq
     */
    public function setAtq(int $atq): void
    {
        $this->atq = $atq;
    }

    /**
     * @return int
     */
    public function getDef(): int
    {
        return $this->def;
    }

    /**
     * @param int $def
     */
    public function setDef(int $def): void
    {
        $this->def = $def;
    }


    /**
     * @return int
     */
    public function getEtat(): int
    {
        return $this->etat;
    }

    /**
     * @param int $etat
     */
    public function setEtat(int $etat): void
    {
        $this->etat = $etat;
    }

}

