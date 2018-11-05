<?php

namespace Entity;


/**
 * Structure
 *
 * @Table(name="structure")
 * @Entity
 */
 
class Structure
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
     * @Column(name="libelle", type="string", length=255)
     */
    private $libelle;
    
     /**
     * @var string
     *
     * @Column(name="region", type="string", length=255)
     */
    private $region;
    
     /**
     * @var string
     *
     * @Column(name="cercle", type="string", length=255)
     */
    private $cercle;
    
     /**
     * @var string
     *
     * @Column(name="commune", type="string", length=255)
     */
    private $commune;
    
    
    
    /**
     * @var boolean
     *
     * @Column(name="status", type="boolean")
     */
    private $status;
    
  
    

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
     * Set nom
     *
     * @param string $nom
     * @return Structure
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Structure
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    
    /**
     * Set status
     *
     * @param boolean $status
     * @return Structure
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set qualification
     *
     * @param string $qualification
     * @return Structure
     */
    public function setQualification($qualification)
    {
        $this->qualification = $qualification;
    
        return $this;
    }

    /**
     * Get qualification
     *
     * @return string 
     */
    public function getQualification()
    {
        return $this->qualification;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Structure
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Structure
     */
    public function setRegion($region)
    {
        $this->region = $region;
    
        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set cercle
     *
     * @param string $cercle
     * @return Structure
     */
    public function setCercle($cercle)
    {
        $this->cercle = $cercle;
    
        return $this;
    }

    /**
     * Get cercle
     *
     * @return string 
     */
    public function getCercle()
    {
        return $this->cercle;
    }

    /**
     * Set commune
     *
     * @param string $commune
     * @return Structure
     */
    public function setCommune($commune)
    {
        $this->commune = $commune;
    
        return $this;
    }

    /**
     * Get commune
     *
     * @return string 
     */
    public function getCommune()
    {
        return $this->commune;
    }
}
