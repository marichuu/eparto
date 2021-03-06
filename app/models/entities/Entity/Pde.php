<?php

namespace Entity;

/**
 * Pde
 *
 * @Table(name="pde")
 * @Entity
 */
class Pde {

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
     * @Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * @var string
     *
     * @Column(name="chevauchement", type="string", length=255, nullable=true)
     */
    private $chevauchement;

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
     * @var \Entity\User
     *
     * @ManyToOne(targetEntity="User")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
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
     * Set value
     *
     * @param string $value
     *
     * @return Pde
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
     * Set chevauchement
     *
     * @param string $chevauchement
     *
     * @return Pde
     */
    public function setChevauchement($chevauchement)
    {
        $this->chevauchement = $chevauchement;
    
        return $this;
    }

    /**
     * Get chevauchement
     *
     * @return string
     */
    public function getChevauchement()
    {
        return $this->chevauchement;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return Pde
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
     * @return Pde
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
     * @return Pde
     */
    public function setUser(\Entity\User $user = null)
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
