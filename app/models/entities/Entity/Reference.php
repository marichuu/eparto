<?php

namespace Entity;


/**
 * Reference
 *
 * @Table(name="reference")
 * @Entity
 */
 
class Reference
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
     * @Column(name="motif", type="string", length=255)
     */
    private $motif;
    
     /**
     * @var string
     *
     * @Column(name="structure", type="string", length=255)
     */
    private $structure;
    
    
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set motif
     *
     * @param string $motif
     *
     * @return Reference
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;
    
        return $this;
    }

    /**
     * Get motif
     *
     * @return string
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set structure
     *
     * @param string $structure
     *
     * @return Reference
     */
    public function setStructure($structure)
    {
        $this->structure = $structure;
    
        return $this;
    }

    /**
     * Get structure
     *
     * @return string
     */
    public function getStructure()
    {
        return $this->structure;
    }

    /**
     * Set femme
     *
     * @param \Entity\Femme $femme
     *
     * @return Reference
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
