<?php

namespace Entity;

/**
 * Surveillance
 *
 * @Table(name="surveillance")
 * @Entity
 */
class Surveillance {

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
     * @Column(name="saignement", type="string", nullable=true)
     */
    private $saignement;

    /**
     * @var String
     *
     * @Column(name="globe_securite", type="string", nullable=true)
     */
    private $globeSecurite;

    /**
     * @var string
     *
     * @Column(name="ta", type="string", length=50)
     */
    private $ta;

    /**
     * @var string
     *
     * @Column(name="pouls", type="string", length=50)
     */
    private $pouls;

    /**
     * @var string
     *
     * @Column(name="temperature", type="string", length=50)
     */
    private $temperature;

    /**
     * @var string
     *
     * @Column(name="traitement", type="string", nullable=true)
     */
    private $traitement;

    /**
     * @var string
     *
     * @Column(name="observation", type="string", nullable=true)
     */
    private $observation;

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
     * @var \Entity\User
     *
     * @ManyToOne(targetEntity="User")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $user;


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
     * @return Surveillance
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
     * Set saignement
     *
     * @param string $saignement
     *
     * @return Surveillance
     */
    public function setSaignement($saignement)
    {
        $this->saignement = $saignement;
    
        return $this;
    }

    /**
     * Get saignement
     *
     * @return string
     */
    public function getSaignement()
    {
        return $this->saignement;
    }

    /**
     * Set globeSecurite
     *
     * @param string $globeSecurite
     *
     * @return Surveillance
     */
    public function setGlobeSecurite($globeSecurite)
    {
        $this->globeSecurite = $globeSecurite;
    
        return $this;
    }

    /**
     * Get globeSecurite
     *
     * @return string
     */
    public function getGlobeSecurite()
    {
        return $this->globeSecurite;
    }

    /**
     * Set ta
     *
     * @param string $ta
     *
     * @return Surveillance
     */
    public function setTa($ta)
    {
        $this->ta = $ta;
    
        return $this;
    }

    /**
     * Get ta
     *
     * @return string
     */
    public function getTa()
    {
        return $this->ta;
    }

    /**
     * Set pouls
     *
     * @param string $pouls
     *
     * @return Surveillance
     */
    public function setPouls($pouls)
    {
        $this->pouls = $pouls;
    
        return $this;
    }

    /**
     * Get pouls
     *
     * @return string
     */
    public function getPouls()
    {
        return $this->pouls;
    }

    /**
     * Set temperature
     *
     * @param string $temperature
     *
     * @return Surveillance
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
     * Set traitement
     *
     * @param string $traitement
     *
     * @return Surveillance
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
     * Set observation
     *
     * @param string $observation
     *
     * @return Surveillance
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
     * Set femme
     *
     * @param \Entity\Femme $femme
     *
     * @return Surveillance
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
     * Set user
     *
     * @param \Entity\User $user
     *
     * @return Surveillance
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
}
