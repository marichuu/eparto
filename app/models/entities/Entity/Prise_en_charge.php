<?php

namespace Entity;

/**
 * Prise_en_charge
 *
 * @Table(name="prise_en_charge")
 * @Entity
 */
class Prise_en_charge {

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
     * @var \Entity\User
     *
     * @ManyToOne(targetEntity="User")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $user;
    
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
     * @var String
     *
     * @Column(name="temperature", type="string", nullable=true)
     */
    private $temperature;

    /**
     * @var String
     *
     * @Column(name="respiration", type="string", nullable=true)
     */
    private $respiration;

    /**
     * @var String
     *
     * @Column(name="coloration_peau", type="string", nullable=true)
     */
    private $coloration_peau;

    /**
     * @var boolean
     *
     * @Column(name="reanimation", type="boolean")
     */
    private $reanimation;
    
    /**
     * @var boolean
     *
     * @Column(name="mise_au_sein", type="boolean")
     */
    private $mise_au_sein;
    
    /**
     * @var boolean
     *
     * @Column(name="malformation", type="boolean")
     */
    private $malformation;
    
    /**
     * @var String
     *
     * @Column(name="type_malformation", type="string", nullable=true)
     */
    private $type_malformation;
    
    /**
     * @var String
     *
     * @Column(name="taille", type="string", nullable=true)
     */
    private $taille;
    
    /**
     * @var String
     *
     * @Column(name="perimetre_cranien", type="string", nullable=true)
     */
    private $perimetre_cranien;
    
    /**
     * @var String
     *
     * @Column(name="observation", type="string", nullable=true)
     */
    private $observation;
    
    /**
     * @var boolean
     *
     * @Column(name="vitk1", type="boolean")
     */
    private $vitk1;
    
    /**
     * @var boolean
     *
     * @Column(name="polio0", type="boolean")
     */
    private $polio0;
    
    /**
     * @var boolean
     *
     * @Column(name="tetra_oph", type="boolean")
     */
    private $tetra_oph;
    
    /**
     * @var boolean
     *
     * @Column(name="chlorexidinedigluconate", type="boolean")
     */
    private $chlorexidinedigluconate;
    
    


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
     * @return Prise_en_charge
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
     * Set temperature
     *
     * @param string $temperature
     *
     * @return Prise_en_charge
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;
    
        return $this;
    }

    /**
     * Get temperature
     *
     * @return string
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * Set respiration
     *
     * @param string $respiration
     *
     * @return Prise_en_charge
     */
    public function setRespiration($respiration)
    {
        $this->respiration = $respiration;
    
        return $this;
    }

    /**
     * Get respiration
     *
     * @return string
     */
    public function getRespiration()
    {
        return $this->respiration;
    }

    /**
     * Set colorationPeau
     *
     * @param string $colorationPeau
     *
     * @return Prise_en_charge
     */
    public function setColorationPeau($colorationPeau)
    {
        $this->coloration_peau = $colorationPeau;
    
        return $this;
    }

    /**
     * Get colorationPeau
     *
     * @return string
     */
    public function getColorationPeau()
    {
        return $this->coloration_peau;
    }

    /**
     * Set reanimation
     *
     * @param boolean $reanimation
     *
     * @return Prise_en_charge
     */
    public function setReanimation($reanimation)
    {
        $this->reanimation = $reanimation;
    
        return $this;
    }

    /**
     * Get reanimation
     *
     * @return boolean
     */
    public function getReanimation()
    {
        return $this->reanimation;
    }

    /**
     * Set miseAuSein
     *
     * @param boolean $miseAuSein
     *
     * @return Prise_en_charge
     */
    public function setMiseAuSein($miseAuSein)
    {
        $this->mise_au_sein = $miseAuSein;
    
        return $this;
    }

    /**
     * Get miseAuSein
     *
     * @return boolean
     */
    public function getMiseAuSein()
    {
        return $this->mise_au_sein;
    }

    /**
     * Set malformation
     *
     * @param boolean $malformation
     *
     * @return Prise_en_charge
     */
    public function setMalformation($malformation)
    {
        $this->malformation = $malformation;
    
        return $this;
    }

    /**
     * Get malformation
     *
     * @return boolean
     */
    public function getMalformation()
    {
        return $this->malformation;
    }

    /**
     * Set typeMalformation
     *
     * @param string $typeMalformation
     *
     * @return Prise_en_charge
     */
    public function setTypeMalformation($typeMalformation)
    {
        $this->type_malformation = $typeMalformation;
    
        return $this;
    }

    /**
     * Get typeMalformation
     *
     * @return string
     */
    public function getTypeMalformation()
    {
        return $this->type_malformation;
    }

    /**
     * Set taille
     *
     * @param string $taille
     *
     * @return Prise_en_charge
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
     * Set perimetreCranien
     *
     * @param string $perimetreCranien
     *
     * @return Prise_en_charge
     */
    public function setPerimetreCranien($perimetreCranien)
    {
        $this->perimetre_cranien = $perimetreCranien;
    
        return $this;
    }

    /**
     * Get perimetreCranien
     *
     * @return string
     */
    public function getPerimetreCranien()
    {
        return $this->perimetre_cranien;
    }

    /**
     * Set observation
     *
     * @param string $observation
     *
     * @return Prise_en_charge
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;
    
        return $this;
    }

    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set vitk1
     *
     * @param boolean $vitk1
     *
     * @return Prise_en_charge
     */
    public function setVitk1($vitk1)
    {
        $this->vitk1 = $vitk1;
    
        return $this;
    }

    /**
     * Get vitk1
     *
     * @return boolean
     */
    public function getVitk1()
    {
        return $this->vitk1;
    }

    /**
     * Set polio0
     *
     * @param boolean $polio0
     *
     * @return Prise_en_charge
     */
    public function setPolio0($polio0)
    {
        $this->polio0 = $polio0;
    
        return $this;
    }

    /**
     * Get polio0
     *
     * @return boolean
     */
    public function getPolio0()
    {
        return $this->polio0;
    }

    /**
     * Set tetraOph
     *
     * @param boolean $tetraOph
     *
     * @return Prise_en_charge
     */
    public function setTetraOph($tetraOph)
    {
        $this->tetra_oph = $tetraOph;
    
        return $this;
    }

    /**
     * Get tetraOph
     *
     * @return boolean
     */
    public function getTetraOph()
    {
        return $this->tetra_oph;
    }

    /**
     * Set chlorexidinedigluconate
     *
     * @param boolean $chlorexidinedigluconate
     *
     * @return Prise_en_charge
     */
    public function setChlorexidinedigluconate($chlorexidinedigluconate)
    {
        $this->chlorexidinedigluconate = $chlorexidinedigluconate;
    
        return $this;
    }

    /**
     * Get chlorexidinedigluconate
     *
     * @return boolean
     */
    public function getChlorexidinedigluconate()
    {
        return $this->chlorexidinedigluconate;
    }

    /**
     * Set user
     *
     * @param \Entity\User $user
     *
     * @return Prise_en_charge
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
     * Set nouveauNe
     *
     * @param \Entity\Nouveau_ne $nouveauNe
     *
     * @return Prise_en_charge
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
