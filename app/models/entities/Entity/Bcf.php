<?php

namespace Entity;


/**
 * Bcf
 *
 * @Table(name="bcf")
 * @Entity
 */
 
class Bcf
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
    private $value;
    
    
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
     * Set value
     *
     * @param string $value
     *
     * @return Bcf
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return Bcf
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
     * Set femme
     *
     * @param \Entity\Femme $femme
     *
     * @return Bcf
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
}
