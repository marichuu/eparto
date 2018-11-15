<?php

namespace Entity;

/**
 * Urine
 *
 * @Table(name="urine")
 * @Entity
 */
class Urine {

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
     * @Column(name="proteinurie", type="string", length=255)
     */
    private $proteinurie;

    /**
     * @var string
     *
     * @Column(name="cetone", type="string", length=255)
     */
    private $cetone;

    /**
     * @var string
     *
     * @Column(name="volume", type="string", length=255)
     */
    private $volume;

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
     * Set proteinurie
     *
     * @param string $proteinurie
     *
     * @return Urine
     */
    public function setProteinurie($proteinurie)
    {
        $this->proteinurie = $proteinurie;
    
        return $this;
    }

    /**
     * Get proteinurie
     *
     * @return string
     */
    public function getProteinurie()
    {
        return $this->proteinurie;
    }

    /**
     * Set cetone
     *
     * @param string $cetone
     *
     * @return Urine
     */
    public function setCetone($cetone)
    {
        $this->cetone = $cetone;
    
        return $this;
    }

    /**
     * Get cetone
     *
     * @return string
     */
    public function getCetone()
    {
        return $this->cetone;
    }

    /**
     * Set volume
     *
     * @param string $volume
     *
     * @return Urine
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
    
        return $this;
    }

    /**
     * Get volume
     *
     * @return string
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return Urine
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
     * @return Urine
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
     * @return Urine
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
