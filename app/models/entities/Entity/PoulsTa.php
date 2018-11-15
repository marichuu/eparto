<?php

namespace Entity;

/**
 * PoulsTa
 *
 * @Table(name="poulsTa")
 * @Entity
 */
class PoulsTa {

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
     * @Column(name="pouls", type="string", length=255)
     */
    private $pouls;

    /**
     * @var string
     *
     * @Column(name="ta", type="string", length=255, nullable=true)
     */
    private $ta;

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
     * Set pouls
     *
     * @param string $pouls
     *
     * @return PoulsTa
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
     * Set ta
     *
     * @param string $ta
     *
     * @return PoulsTa
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
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return PoulsTa
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
     * @return PoulsTa
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
     * @return PoulsTa
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
