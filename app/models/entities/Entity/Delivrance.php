<?php

namespace Entity;

/**
 * Delivrance
 *
 * @Table(name="delivrance")
 * @Entity
 */
class Delivrance {

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
     * @Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var boolean
     *
     * @Column(name="type", type="boolean", nullable=true)
     */
    private $type;

    /**
     * @var boolean
     *
     * @Column(name="etat", type="boolean", nullable=true)
     */
    private $etat;

    /**
     * @var String
     *
     * @Column(name="poids_placenta", type="string", nullable=true)
     */
    private $poidsPlacenta;

    /**
     * @var String
     *
     * @Column(name="longeur_cordon", type="string", nullable=true)
     */
    private $longeurCordon;

    /**
     * @var String
     *
     * @Column(name="petit_cote_cordon", type="string", nullable=true)
     */
    private $petitCoteCordon;

    /**
     * @var boolean
     *
     * @Column(name="evacuation_reference", type="boolean", nullable=true)
     */
    private $evacuationReference;


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
    public function getId() {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Delivrance
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Set type
     *
     * @param boolean $type
     *
     * @return Delivrance
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return boolean
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Delivrance
     */
    public function setEtat($etat) {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return boolean
     */
    public function getEtat() {
        return $this->etat;
    }

    /**
     * Set evacuationReference
     *
     * @param boolean $evacuationReference
     *
     * @return Delivrance
     */
    public function setEvacuationReference($evacuationReference) {
        $this->evacuationReference = $evacuationReference;

        return $this;
    }

    /**
     * Get evacuationReference
     *
     * @return boolean
     */
    public function getEvacuationReference() {
        return $this->evacuationReference;
    }


    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return Delivrance
     */
    public function setCreatedDate($createdDate) {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime
     */
    public function getCreatedDate() {
        return $this->createdDate;
    }

    /**
     * Set femme
     *
     * @param \Entity\Femme $femme
     *
     * @return Delivrance
     */
    public function setFemme(\Entity\Femme $femme) {
        $this->femme = $femme;

        return $this;
    }

    /**
     * Get femme
     *
     * @return \Entity\Femme
     */
    public function getFemme() {
        return $this->femme;
    }


    /**
     * Set poidsPlacenta
     *
     * @param string $poidsPlacenta
     *
     * @return Delivrance
     */
    public function setPoidsPlacenta($poidsPlacenta)
    {
        $this->poidsPlacenta = $poidsPlacenta;
    
        return $this;
    }

    /**
     * Get poidsPlacenta
     *
     * @return string
     */
    public function getPoidsPlacenta()
    {
        return $this->poidsPlacenta;
    }

    /**
     * Set longeurCordon
     *
     * @param string $longeurCordon
     *
     * @return Delivrance
     */
    public function setLongeurCordon($longeurCordon)
    {
        $this->longeurCordon = $longeurCordon;
    
        return $this;
    }

    /**
     * Get longeurCordon
     *
     * @return string
     */
    public function getLongeurCordon()
    {
        return $this->longeurCordon;
    }

    /**
     * Set petitCoteCordon
     *
     * @param string $petitCoteCordon
     *
     * @return Delivrance
     */
    public function setPetitCoteCordon($petitCoteCordon)
    {
        $this->petitCoteCordon = $petitCoteCordon;
    
        return $this;
    }

    /**
     * Get petitCoteCordon
     *
     * @return string
     */
    public function getPetitCoteCordon()
    {
        return $this->petitCoteCordon;
    }
}
