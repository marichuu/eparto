<?php

namespace Entity;


/**
 * Col
 *
 * @Table(name="col")
 * @Entity
 */
 
class Col
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
     * @Column(name="col", type="string", length=255)
     */
    private $col;
    
    
    /**
     * @var string
     *
     * @Column(name="descente_tete", type="string", length=255)
     */
    private $descenteTete;
    
    
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
     * Set col
     *
     * @param string $col
     *
     * @return Col
     */
    public function setCol($col)
    {
        $this->col = $col;
    
        return $this;
    }

    /**
     * Get col
     *
     * @return string
     */
    public function getCol()
    {
        return $this->col;
    }

    /**
     * Set descenteTete
     *
     * @param string $descenteTete
     *
     * @return Col
     */
    public function setDescenteTete($descenteTete)
    {
        $this->descenteTete = $descenteTete;
    
        return $this;
    }

    /**
     * Get descenteTete
     *
     * @return string
     */
    public function getDescenteTete()
    {
        return $this->descenteTete;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return Col
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
     * @return Col
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
     * @return Col
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
