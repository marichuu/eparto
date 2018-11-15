<?php

namespace Entity;

/**
 * Nouveau_ne
 *
 * @Table(name="nouveau_ne")
 * @Entity
 */
class Nouveau_ne {

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
     * @Column(name="date_nais", type="datetime", nullable=true)
     */
    private $date_nais;
    
    /**
     * @var \Entity\Accouchement
     *
     * @ManyToOne(targetEntity="Accouchement")
     * @JoinColumns({
     *   @JoinColumn(name="accouchement_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $accouchement;
    
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
     * Set dateNais
     *
     * @param \DateTime $dateNais
     *
     * @return Nouveau_ne
     */
    public function setDateNais($dateNais)
    {
        $this->date_nais = $dateNais;
    
        return $this;
    }

    /**
     * Get dateNais
     *
     * @return \DateTime
     */
    public function getDateNais()
    {
        return $this->date_nais;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return Nouveau_ne
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
     * Set accouchement
     *
     * @param \Entity\Accouchement $accouchement
     *
     * @return Nouveau_ne
     */
    public function setAccouchement(\Entity\Accouchement $accouchement)
    {
        $this->accouchement = $accouchement;
    
        return $this;
    }

    /**
     * Get accouchement
     *
     * @return \Entity\Accouchement
     */
    public function getAccouchement()
    {
        return $this->accouchement;
    }

    /**
     * Set user
     *
     * @param \Entity\User $user
     *
     * @return Nouveau_ne
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
