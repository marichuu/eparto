<?php

namespace DoctrineProxies\__CG__\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Accouchement extends \Entity\Accouchement implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'id', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'createdDate', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'nomAccoucheur', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'user', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'femme', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'nbreEnfant', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'expulsion', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'mode', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'traitement');
        }

        return array('__isInitialized__', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'id', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'createdDate', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'nomAccoucheur', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'user', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'femme', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'nbreEnfant', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'expulsion', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'mode', '' . "\0" . 'Entity\\Accouchement' . "\0" . 'traitement');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Accouchement $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedDate($createdDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedDate', array($createdDate));

        return parent::setCreatedDate($createdDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedDate', array());

        return parent::getCreatedDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomAccoucheur($nomAccoucheur)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomAccoucheur', array($nomAccoucheur));

        return parent::setNomAccoucheur($nomAccoucheur);
    }

    /**
     * {@inheritDoc}
     */
    public function getNomAccoucheur()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomAccoucheur', array());

        return parent::getNomAccoucheur();
    }

    /**
     * {@inheritDoc}
     */
    public function setNbreEnfant($nbreEnfant)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNbreEnfant', array($nbreEnfant));

        return parent::setNbreEnfant($nbreEnfant);
    }

    /**
     * {@inheritDoc}
     */
    public function getNbreEnfant()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNbreEnfant', array());

        return parent::getNbreEnfant();
    }

    /**
     * {@inheritDoc}
     */
    public function setExpulsion($expulsion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setExpulsion', array($expulsion));

        return parent::setExpulsion($expulsion);
    }

    /**
     * {@inheritDoc}
     */
    public function getExpulsion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getExpulsion', array());

        return parent::getExpulsion();
    }

    /**
     * {@inheritDoc}
     */
    public function setMode($mode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMode', array($mode));

        return parent::setMode($mode);
    }

    /**
     * {@inheritDoc}
     */
    public function getMode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMode', array());

        return parent::getMode();
    }

    /**
     * {@inheritDoc}
     */
    public function setTraitement($traitement)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTraitement', array($traitement));

        return parent::setTraitement($traitement);
    }

    /**
     * {@inheritDoc}
     */
    public function getTraitement()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTraitement', array());

        return parent::getTraitement();
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(\Entity\User $user)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUser', array($user));

        return parent::setUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getUser()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUser', array());

        return parent::getUser();
    }

    /**
     * {@inheritDoc}
     */
    public function setFemme(\Entity\Femme $femme)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFemme', array($femme));

        return parent::setFemme($femme);
    }

    /**
     * {@inheritDoc}
     */
    public function getFemme()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFemme', array());

        return parent::getFemme();
    }

}
