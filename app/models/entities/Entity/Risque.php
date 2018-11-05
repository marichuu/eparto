<?php

namespace Entity;


/**
 * Risque
 *
 * @Table(name="risque")
 * @Entity
 */
 
class Risque
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var string
     *
     * @Column(name="taille", type="string", length=255)
     */
    private $taille;
    
     /**
     * @var boolean
     *
     * @Column(name="hemoragie", type="boolean")
     */
    private $hemoragie;
    
     /**
     * @var boolean
     *
     * @Column(name="terme", type="boolean")
     */
    private $terme;
    
     /**
     * @var integer
     *
     * @Column(name="cpn", type="integer")
     */
    private $cpn;
    
    /**
     * @var integer
     *
     * @Column(name="nb_cpn", type="integer", nullable=true)
     */
    private $nbCpn;
    
     /**
     * @var boolean
     *
     * @Column(name="cesarienne_dernier_accouchement", type="boolean")
     */
    private $cesarienneDernierAccouchement;
      /**
     * @var boolean
     *
     * @Column(name="presentation", type="boolean")
     */
    private $presentation;
    
     /**
     * @var boolean
     *
     * @Column(name="dernier_enfant", type="boolean")
     */
    private $dernierEnfant;
    
      /**
     * @var \Entity\Femme
     *
     * @ManyToOne(targetEntity="Femme")
     * @JoinColumns({
     *   @JoinColumn(name="femme_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $femme;

    /**
     * @var \DateTime
     *
     * @Column(name="created_date", type="datetime", nullable=true)
     */
    private $createdDate;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set taille
     *
     * @param string $taille
     * @return Risque
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;
    
        return $this;
    }

    /**
     * Get taille
     *
     * @return string 
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set hemoragie
     *
     * @param boolean $hemoragie
     * @return Risque
     */
    public function setHemoragie($hemoragie)
    {
        $this->hemoragie = $hemoragie;
    
        return $this;
    }

    /**
     * Get hemoragie
     *
     * @return boolean 
     */
    public function getHemoragie()
    {
        return $this->hemoragie;
    }

    /**
     * Set terme
     *
     * @param boolean $terme
     * @return Risque
     */
    public function setTerme($terme)
    {
        $this->terme = $terme;
    
        return $this;
    }

    /**
     * Get terme
     *
     * @return boolean 
     */
    public function getTerme()
    {
        return $this->terme;
    }

    /**
     * Set cpn
     *
     * @param integer $cpn
     * @return Risque
     */
    public function setCpn($cpn)
    {
        $this->cpn = $cpn;
    
        return $this;
    }

    /**
     * Get cpn
     *
     * @return integer 
     */
    public function getCpn()
    {
        return $this->cpn;
    }

    
    /**
     * Set cesarienneDernierAccouchement
     *
     * @param boolean $cesarienneDernierAccouchement
     * @return Risque
     */
    public function setCesarienneDernierAccouchement($cesarienneDernierAccouchement)
    {
        $this->cesarienneDernierAccouchement = $cesarienneDernierAccouchement;
    
        return $this;
    }

    /**
     * Get cesarienneDernierAccouchement
     *
     * @return boolean 
     */
    public function getCesarienneDernierAccouchement()
    {
        return $this->cesarienneDernierAccouchement;
    }

    /**
     * Set dernierEnfant
     *
     * @param boolean $dernierEnfant
     * @return Risque
     */
    public function setDernierEnfant($dernierEnfant)
    {
        $this->dernierEnfant = $dernierEnfant;
    
        return $this;
    }

    /**
     * Get dernierEnfant
     *
     * @return boolean 
     */
    public function getDernierEnfant()
    {
        return $this->dernierEnfant;
    }

    /**
     * Set femme
     *
     * @param \Entity\Femme $femme
     * @return Risque
     */
    public function setFemme(\Entity\Femme $femme)
    {
        $this->femme = $femme;
    
        return $this;
    }

    /**
     * Get femme
     *
     * @return \Entity\Femme 
     */
    public function getFemme()
    {
        return $this->femme;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return Risque
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    
        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set presentation
     *
     * @param boolean $presentation
     *
     * @return Risque
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;
    
        return $this;
    }

    /**
     * Get presentation
     *
     * @return boolean
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

   

    /**
     * Set nbCpn
     *
     * @param integer $nbCpn
     *
     * @return Risque
     */
    public function setNbCpn($nbCpn)
    {
        $this->nbCpn = $nbCpn;
    
        return $this;
    }

    /**
     * Get nbCpn
     *
     * @return integer
     */
    public function getNbCpn()
    {
        return $this->nbCpn;
    }
}
