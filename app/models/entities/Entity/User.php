<?php
namespace Entity;


/**
 * user
 *
 * @Table(name="user")
 * @Entity
 */
class User
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
     * @Column(name="email", type="string", length=100, precision=0, scale=0, nullable=false, unique=true)
     */
    private $email;
    
    /**
     * @var string
     *
     * @Column(name="password", type="string", length=200, precision=0, scale=0, nullable=false, unique=false)
     */
    private $password;

    /**
     * @var boolean
     *
     * @Column(name="valid", type="boolean")
     */
    private $valid;

    /**
     * @var string
     *
     * @Column(name="recovery_key", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $recovery_key;

    /**
     * @var \DateTime
     *
     * @Column(name="recovery_key_date", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $recovery_key_date;

    /**
     * @var boolean
     *
     * @Column(name="banir", type="boolean")
     */
    private $banir;

    /**
     * @var boolean
     *
     * @Column(name="firstconnexion", type="boolean")
     */
    private $firstconnexion;

    /**
     * @var boolean
     *
     * @Column(name="is_superadmin", type="boolean")
     */
    private $is_superadmin;

     /**
     * @var string
     *
     * @Column(name="firstName", type="string", length=20, precision=0, scale=0, nullable=true, unique=false)
     */
    private $firstName;
	
	/**
     * @var string
     *
     * @Column(name="lastName", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $lastName;


    /**
     * @var string
     *
     * @Column(name="phone", type="string", length=20, precision=0, scale=0, nullable=false, unique=false)
     */
    private $phone;
    
    /**
     * @var integer
     *
     * @Column(name="attempt_number", type="integer", nullable=true)
     */
    private $attemptNumber;
    
    
    /**
     * @var \DateTime
     *
     * @Column(name="last_login", type="datetime", nullable=true)
     */
    private $lastLogin;
    
    
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
     * @var boolean
     *
     * @Column(name="status", type="boolean")
     */
    private $status;
    
    function __construct()
    {
        $this->firstconnexion = 1;
        $this->is_superadmin = 0;
        $this->banir = 0;
        $this->valid = 1;
        $this->attemptNumer = 0;
        $this->accessSubStructure = 0;
    } 
    
    public function  __toString() {        
        return $this->getFirstName().' '.$this->getLastName();
    }

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
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set valid
     *
     * @param boolean $valid
     * @return User
     */
    public function setValid($valid)
    {
        $this->valid = $valid;
    
        return $this;
    }

    /**
     * Get valid
     *
     * @return boolean 
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Set recovery_key
     *
     * @param string $recoveryKey
     * @return User
     */
    public function setRecoveryKey($recoveryKey)
    {
        $this->recovery_key = $recoveryKey;
    
        return $this;
    }

    /**
     * Get recovery_key
     *
     * @return string 
     */
    public function getRecoveryKey()
    {
        return $this->recovery_key;
    }

    /**
     * Set recovery_key_date
     *
     * @param \DateTime $recoveryKeyDate
     * @return User
     */
    public function setRecoveryKeyDate($recoveryKeyDate)
    {
        $this->recovery_key_date = $recoveryKeyDate;
    
        return $this;
    }

    /**
     * Get recovery_key_date
     *
     * @return \DateTime 
     */
    public function getRecoveryKeyDate()
    {
        return $this->recovery_key_date;
    }

    /**
     * Set banir
     *
     * @param boolean $banir
     * @return User
     */
    public function setBanir($banir)
    {
        $this->banir = $banir;
    
        return $this;
    }

    /**
     * Get banir
     *
     * @return boolean 
     */
    public function getBanir()
    {
        return $this->banir;
    }

    /**
     * Set firstconnexion
     *
     * @param boolean $firstconnexion
     * @return User
     */
    public function setFirstconnexion($firstconnexion)
    {
        $this->firstconnexion = $firstconnexion;
    
        return $this;
    }

    /**
     * Get firstconnexion
     *
     * @return boolean 
     */
    public function getFirstconnexion()
    {
        return $this->firstconnexion;
    }

    /**
     * Set is_superadmin
     *
     * @param boolean $isSuperadmin
     * @return User
     */
    public function setIsSuperadmin($isSuperadmin)
    {
        $this->is_superadmin = $isSuperadmin;
    
        return $this;
    }

    /**
     * Get is_superadmin
     *
     * @return boolean 
     */
    public function getIsSuperadmin()
    {
        return $this->is_superadmin;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set prenoms
     *
     * @param string $prenoms
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get prenoms
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

   
    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set lastLogin
     *
     * @param \DateTime $beginDate
     * @return User
     */
    public function setLastLogin($lastLogin) {
        $this->lastLogin = $lastLogin; 
        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime 
     */
    public function getLastLogin() {
        return $this->lastLogin;
    }

    /**
     * Set attemptNumer
     *
     * @param integer $attemptNumer
     * @return User
     */
    public function setAttemptNumber($attemptNumber)
    {
        $this->attemptNumber = $attemptNumber;
    
        return $this;
    }

    /**
     * Get attemptNumber
     *
     * @return integer 
     */
    public function getAttemptNumber()
    {
        return $this->attemptNumber;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return User
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set structure
     *
     * @param \Entity\Structure $structure
     * @return User
     */
    public function setStructure(\Entity\Structure $structure)
    {
        $this->structure = $structure;
    
        return $this;
    }

    /**
     * Get structure
     *
     * @return \Entity\Structure 
     */
    public function getStructure()
    {
        return $this->structure;
    }
}
