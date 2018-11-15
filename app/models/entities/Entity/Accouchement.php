<?php

namespace Entity;

/**
 * Accouchement
 *
 * @Table(name="accouchement")
 * @Entity
 */
class Accouchement {

    /**
     * @var integer
     *
     * @Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @Column(name="created_date", type="datetime", nullable=true)
     */
    private $createdDate;

    /**
     * @var String
     *
     * @Column(name="nom_accoucheur", type="string", nullable=true)
     */
    private $nomAccoucheur;
    
    /**
     * @var \Entity\User
     *
     * @ManyToOne(targetEntity="User")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $user;
    
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
     * @var String
     *
     * @Column(name="nbre_enfant", type="string", nullable=true)
     */
    private $nbre_enfant;

    /**
     * @var \Entity\Nouveau_ne
     *
     * @ManyToOne(targetEntity="Nouveau_ne")
     * @JoinColumns({
     *   @JoinColumn(name="nouveau_ne_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $nouveauNe;
    
    /**
     * @var boolean
     *
     * @Column(name="expulsion", type="boolean")
     */
    private $expulsion;
    
    /**
     * @var boolean
     *
     * @Column(name="mode", type="boolean")
     */
    private $mode;
    
    /**
     * @var string
     *
     * @Column(name="traitement", type="string", length=50)
     */
    private $traitement;


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
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return Accouchement
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
     * Set nomAccoucheur
     *
     * @param string $nomAccoucheur
     *
     * @return Accouchement
     */
    public function setNomAccoucheur($nomAccoucheur)
    {
        $this->nomAccoucheur = $nomAccoucheur;
    
        return $this;
    }

    /**
     * Get nomAccoucheur
     *
     * @return string
     */
    public function getNomAccoucheur()
    {
        return $this->nomAccoucheur;
    }

    /**
     * Set nbreEnfant
     *
     * @param string $nbreEnfant
     *
     * @return Accouchement
     */
    public function setNbreEnfant($nbreEnfant)
    {
        $this->nbre_enfant = $nbreEnfant;
    
        return $this;
    }

    /**
     * Get nbreEnfant
     *
     * @return string
     */
    public function getNbreEnfant()
    {
        return $this->nbre_enfant;
    }

    /**
     * Set expulsion
     *
     * @param boolean $expulsion
     *
     * @return Accouchement
     */
    public function setExpulsion($expulsion)
    {
        $this->expulsion = $expulsion;
    
        return $this;
    }

    /**
     * Get expulsion
     *
     * @return boolean
     */
    public function getExpulsion()
    {
        return $this->expulsion;
    }

    /**
     * Set mode
     *
     * @param boolean $mode
     *
     * @return Accouchement
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    
        return $this;
    }

    /**
     * Get mode
     *
     * @return boolean
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set traitement
     *
     * @param string $traitement
     *
     * @return Accouchement
     */
    public function setTraitement($traitement)
    {
        $this->traitement = $traitement;
    
        return $this;
    }

    /**
     * Get traitement
     *
     * @return string
     */
    public function getTraitement()
    {
        return $this->traitement;
    }

    /**
     * Set user
     *
     * @param \Entity\User $user
     *
     * @return Accouchement
     */
    public function setUser(\Entity\User $user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set femme
     *
     * @param \Entity\Femme $femme
     *
     * @return Accouchement
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
     * Set nouveauNe
     *
     * @param \Entity\Nouveau_ne $nouveauNe
     *
     * @return Accouchement
     */
    public function setNouveauNe(\Entity\Nouveau_ne $nouveauNe)
    {
        $this->nouveauNe = $nouveauNe;
    
        return $this;
    }

    /**
     * Get nouveauNe
     *
     * @return \Entity\Nouveau_ne
     */
    public function getNouveauNe()
    {
        return $this->nouveauNe;
    }
}
