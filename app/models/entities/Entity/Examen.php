<?php

namespace Entity;


/**
 * Examen
 *
 * @Table(name="examen")
 * @Entity
 */
 
class Examen
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
     * @Column(name="hu", type="string", length=50)
     */
    private $hu;
    
     /**
     * @var string
     *
     * @Column(name="examen_bcf", type="string", length=50)
     */
    private $examenBcf;
    
     /**
     * @var string
     *
     * @Column(name="contractions", type="string", length=50)
     */
    private $contractions;
    
     /**
     * @var integer
     *
     * @Column(name="pde", type="integer")
     */
    private $pde;
       
     /**
     * @var string
     *
     * @Column(name="autre_facteur_risque", type="text", nullable=true)
     */
    private $autre_facteur_risque;
    
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
     * @Column(name="created_date", type="date", nullable=true)
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
     * Set ta
     *
     * @param string $ta
     * @return Examen
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
     * @return Examen
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
     * @return Examen
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
     * Set hu
     *
     * @param string $hu
     * @return Examen
     */
    public function setHu($hu)
    {
        $this->hu = $hu;
    
        return $this;
    }

    /**
     * Get hu
     *
     * @return string 
     */
    public function getHu()
    {
        return $this->hu;
    }

    /**
     * Set examenBcf
     *
     * @param string $examenBcf
     * @return Examen
     */
    public function setExamenBcf($examenBcf)
    {
        $this->examenBcf = $examenBcf;
    
        return $this;
    }

    /**
     * Get examenBcf
     *
     * @return string 
     */
    public function getExamenBcf()
    {
        return $this->examenBcf;
    }

    /**
     * Set contractions
     *
     * @param string $contractions
     * @return Examen
     */
    public function setContractions($contractions)
    {
        $this->contractions = $contractions;
    
        return $this;
    }

    /**
     * Get contractions
     *
     * @return string 
     */
    public function getContractions()
    {
        return $this->contractions;
    }

    /**
     * Set pde
     *
     * @param integer $pde
     * @return Examen
     */
    public function setPde($pde)
    {
        $this->pde = $pde;
    
        return $this;
    }

    /**
     * Get pde
     *
     * @return integer 
     */
    public function getPde()
    {
        return $this->pde;
    }

    /**
     * Set autre_facteur_risque
     *
     * @param string $autreFacteurRisque
     * @return Examen
     */
    public function setAutreFacteurRisque($autreFacteurRisque)
    {
        $this->autre_facteur_risque = $autreFacteurRisque;
    
        return $this;
    }

    /**
     * Get autre_facteur_risque
     *
     * @return string 
     */
    public function getAutreFacteurRisque()
    {
        return $this->autre_facteur_risque;
    }

    /**
     * Set femme
     *
     * @param \Entity\Femme $femme
     * @return Examen
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
     * @return Examen
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
}
