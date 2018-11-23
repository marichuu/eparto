<?php

namespace Entity;

/**
 * Apgar
 *
 * @Table(name="apgar")
 * @Entity
 */
class Apgar {

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
     * @Column(name="total", type="string", nullable=true)
     */
    private $total;

    /**
     * @var String
     *
     * @Column(name="pouls_bc", type="string", nullable=true)
     */
    private $poulsBc;

    /**
     * @var String
     *
     * @Column(name="respiration", type="string", nullable=true)
     */
    private $respiration;

    /**
     * @var String
     *
     * @Column(name="tonus", type="string", nullable=true)
     */
    private $tonus;

    /**
     * @var String
     *
     * @Column(name="reflexes", type="string", nullable=true)
     */
    private $reflexes;

    /**
     * @var String
     *
     * @Column(name="coloration_peau", type="string", nullable=true)
     */
    private $colorationPeau;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return Apgar
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
     * Set poulsBc
     *
     * @param string $poulsBc
     *
     * @return Apgar
     */
    public function setPoulsBc($poulsBc) {
        $this->poulsBc = $poulsBc;

        return $this;
    }

    /**
     * Get poulsBc
     *
     * @return string
     */
    public function getPoulsBc() {
        return $this->poulsBc;
    }

    /**
     * Set respiration
     *
     * @param string $respiration
     *
     * @return Apgar
     */
    public function setRespiration($respiration) {
        $this->respiration = $respiration;

        return $this;
    }

    /**
     * Get respiration
     *
     * @return string
     */
    public function getRespiration() {
        return $this->respiration;
    }

    /**
     * Set tonus
     *
     * @param string $tonus
     *
     * @return Apgar
     */
    public function setTonus($tonus) {
        $this->tonus = $tonus;

        return $this;
    }

    /**
     * Get tonus
     *
     * @return string
     */
    public function getTonus() {
        return $this->tonus;
    }

    /**
     * Set reflexes
     *
     * @param string $reflexes
     *
     * @return Apgar
     */
    public function setReflexes($reflexes) {
        $this->reflexes = $reflexes;

        return $this;
    }

    /**
     * Get reflexes
     *
     * @return string
     */
    public function getReflexes() {
        return $this->reflexes;
    }

    /**
     * Set colorationPeau
     *
     * @param string $colorationPeau
     *
     * @return Apgar
     */
    public function setColorationPeau($colorationPeau) {
        $this->colorationPeau = $colorationPeau;

        return $this;
    }

    /**
     * Get colorationPeau
     *
     * @return string
     */
    public function getColorationPeau() {
        return $this->colorationPeau;
    }

    /**
     * Set user
     *
     * @param \Entity\User $user
     *
     * @return Apgar
     */
    public function setUser(\Entity\User $user) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Entity\User
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set nouveauNe
     *
     * @param \Entity\Nouveau_ne $nouveauNe
     *
     * @return Apgar
     */
    public function setNouveauNe(\Entity\Nouveau_ne $nouveauNe) {
        $this->nouveauNe = $nouveauNe;

        return $this;
    }

    /**
     * Get nouveauNe
     *
     * @return \Entity\Nouveau_ne
     */
    public function getNouveauNe() {
        return $this->nouveauNe;
    }


    /**
     * Set total
     *
     * @param string $total
     *
     * @return Apgar
     */
    public function setTotal($total)
    {
        $this->total = $total;
    
        return $this;
    }

    /**
     * Get total
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }
}
