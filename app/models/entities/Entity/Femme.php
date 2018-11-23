<?php
use \Doctrine\Common\Collections\Collection;
namespace Entity;

/**
 * Femme
 *
 * @Table(name="femme")
 * @Entity
 */
class Femme {

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
     * @Column(name="nom", type="string", length=255, precision=0, scale=0, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @Column(name="prenom", type="string", length=255, precision=0, scale=0, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @Column(name="age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @var string
     *
     * @Column(name="nom_mari", type="string", length=255, nullable=true)
     */
    private $mari;

    /**
     * @var string
     *
     * @Column(name="village", type="string", length=255, nullable=true)
     */
    private $village;

    /**
     * @var string
     *
     * @Column(name="nb_grossesse", type="integer", nullable=true)
     */
    private $nbGrossesse;

    /**
     * @var string
     *
     * @Column(name="nb_parite", type="integer", nullable=true)
     */
    private $nbParite;

    /**
     * @var string
     *
     * @Column(name="nb_enfant_vivant", type="integer", nullable=true)
     */
    private $nbEnfantVivant;

    /**
     * @var string
     *
     * @Column(name="nb_avortement", type="integer", nullable=true)
     */
    private $nbAvortement;

    /**
     * @var string
     *
     * @Column(name="nb_iig", type="integer", nullable=true)
     */
    private $nbIig;

    /**
     * @var boolean
     *
     * @Column(name="status", type="boolean")
     */
    private $status;

    /**
     * @var \Entity\Structure
     *
     * @ManyToOne(targetEntity="Structure")
     * @JoinColumns({
     *   @JoinColumn(name="structure_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $structure;
    
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
     * @var string
     *
     * @Column(name="motif_venue_maternite", type="string", length=255, nullable=true)
     */
    private $motif;

    /**
     * @var \DateTime
     *
     * @Column(name="date_entree", type="datetime", nullable=true)
     */
    private $dateEntree;

    /**
     * @var \DateTime
     *
     * @Column(name="date_debut_travail", type="datetime", nullable=true)
     */
    private $dateDebutTravail;

    /**
     * @var \DateTime
     *
     * @Column(name="heure_rupture_membrane", type="datetime", nullable=true)
     */
    private $heureRuptureMembrane;

     /**
     * @var integer
     *
     * @Column(name="pde", type="integer", nullable=true)
     */
    private $pde;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Femme
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Femme
     */
    public function setPrenom($prenom) {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom() {
        return $this->prenom;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Femme
     */
    public function setAge($age) {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge() {
        return $this->age;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Femme
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set structure
     *
     * @param \Entity\Structure $structure
     * @return Femme
     */
    public function setStructure(\Entity\Structure $structure) {
        $this->structure = $structure;

        return $this;
    }

    /**
     * Get structure
     *
     * @return \Entity\Structure 
     */
    public function getStructure() {
        return $this->structure;
    }

    /**
     * Set mari
     *
     * @param string $mari
     * @return Femme
     */
    public function setMari($mari) {
        $this->mari = $mari;

        return $this;
    }

    /**
     * Get mari
     *
     * @return string 
     */
    public function getMari() {
        return $this->mari;
    }

    /**
     * Set village
     *
     * @param string $village
     * @return Femme
     */
    public function setVillage($village) {
        $this->village = $village;

        return $this;
    }

    /**
     * Get village
     *
     * @return string 
     */
    public function getVillage() {
        return $this->village;
    }

    /**
     * Set nbGrossesse
     *
     * @param integer $nbGrossesse
     * @return Femme
     */
    public function setNbGrossesse($nbGrossesse) {
        $this->nbGrossesse = $nbGrossesse;

        return $this;
    }

    /**
     * Get nbGrossesse
     *
     * @return integer 
     */
    public function getNbGrossesse() {
        return $this->nbGrossesse;
    }

    /**
     * Set nbParite
     *
     * @param integer $nbParite
     * @return Femme
     */
    public function setNbParite($nbParite) {
        $this->nbParite = $nbParite;

        return $this;
    }

    /**
     * Get nbParite
     *
     * @return integer 
     */
    public function getNbParite() {
        return $this->nbParite;
    }

    /**
     * Set nbEnfantVivant
     *
     * @param integer $nbEnfantVivant
     * @return Femme
     */
    public function setNbEnfantVivant($nbEnfantVivant) {
        $this->nbEnfantVivant = $nbEnfantVivant;

        return $this;
    }

    /**
     * Get nbEnfantVivant
     *
     * @return integer 
     */
    public function getNbEnfantVivant() {
        return $this->nbEnfantVivant;
    }

    /**
     * Set nbAvortement
     *
     * @param integer $nbAvortement
     * @return Femme
     */
    public function setNbAvortement($nbAvortement) {
        $this->nbAvortement = $nbAvortement;

        return $this;
    }

    /**
     * Get nbAvortement
     *
     * @return integer 
     */
    public function getNbAvortement() {
        return $this->nbAvortement;
    }

    /**
     * Set nbIig
     *
     * @param integer $nbIig
     * @return Femme
     */
    public function setNbIig($nbIig) {
        $this->nbIig = $nbIig;

        return $this;
    }

    /**
     * Get nbIig
     *
     * @return integer 
     */
    public function getNbIig() {
        return $this->nbIig;
    }

    /**
     * Set motif
     *
     * @param string $motif
     *
     * @return Femme
     */
    public function setMotif($motif) {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string
     */
    public function getMotif() {
        return $this->motif;
    }

    /**
     * Set dateEntree
     *
     * @param \DateTime $dateEntree
     *
     * @return Femme
     */
    public function setDateEntree($dateEntree) {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    /**
     * Get dateEntree
     *
     * @return \DateTime
     */
    public function getDateEntree() {
        return $this->dateEntree;
    }

    /**
     * Set dateDebutTravail
     *
     * @param \DateTime $dateDebutTravail
     *
     * @return Femme
     */
    public function setDateDebutTravail($dateDebutTravail) {
        $this->dateDebutTravail = $dateDebutTravail;

        return $this;
    }

    /**
     * Get dateDebutTravail
     *
     * @return \DateTime
     */
    public function getDateDebutTravail() {
        return $this->dateDebutTravail;
    }

    /**
     * Set heureRuptureMembrane
     *
     * @param \DateTime $heureRuptureMembrane
     *
     * @return Femme
     */
    public function setHeureRuptureMembrane($heureRuptureMembrane) {
        $this->heureRuptureMembrane = $heureRuptureMembrane;

        return $this;
    }

    /**
     * Get heureRuptureMembrane
     *
     * @return \DateTime
     */
    public function getHeureRuptureMembrane() {
        return $this->heureRuptureMembrane;
    }


    /**
     * Set user
     *
     * @param \Entity\User $user
     *
     * @return Femme
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
<<<<<<< HEAD
    }

    /**
     * Set pde
     *
     * @param integer $pde
     *
     * @return Femme
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
=======
>>>>>>> a24072ecf6142a4f7106af9514cbad65d1ae351f
    }
}
