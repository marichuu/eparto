<?php

namespace Entity;


/**
 * Agent
 *
 * @Table(name="agent")
 * @Entity
 */
 
class Agent
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
     * @Column(name="nom", type="string", length=255, precision=0, scale=0, nullable=false, unique=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @Column(name="prenom", type="string", length=255, precision=0, scale=0, nullable=false, unique=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @Column(name="qualification", type="string", length=255)
     */
    private $qualification;
    
    
    /**
     * @var boolean
     *
     * @Column(name="status", type="boolean")
     */
    private $status;
    
  
     /**
     * @var \Entity\Structure
     *
     * @ManyToOne(targetEntity="Structure")
     * @JoinColumns({
     *   @JoinColumn(name="structure_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $structure;

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
     * @return Agent
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
     * @return Agent
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
     * @return Agent
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
     * @return Agent
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
     * Set structure
     *
     * @param \Entity\Structure $structure
     * @return Agent
     */
    public function setStructure(\Entity\Structure $structure)
    {
        $this->structure = $structure;
    
        return $this;
    }

    /**
     * Get structure
     *
     * @return \Entity\Structure 
     */
    public function getStructure()
    {
        return $this->structure;
    }
}
