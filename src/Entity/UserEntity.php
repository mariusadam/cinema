<?php

namespace Entity;

use Symfony\Component\Security\Core\User\UserInterface;

class UserEntity extends AbstractEntity implements UserInterface
{

    /**
     * User email
     * @var string
     */
    protected $email;

    /**
     * User password
     * @var string
     */
    protected $password;

    /**
     * User status
     * @var boolean
     */
    protected $active;

    /**
     * User role
     * @var string
     */
    protected $role;

    /**
     * @param array $properties
     */
    public function __construct(array $properties=[])
    {
        parent::__construct($properties);

        if (is_null($this->active) === true) {
            $this->active = true;
        }

        if (is_null($this->role) === true) {
            $this->role = -1;
        }
    }

    /**
     * get User email
     * 
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * set User email
     * 
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * verify User password
     * 
     * @return bool
     */
    public function verifyPassword($password)
    {
        return password_verify($password, $this->password);
    }

    /**
     * set User password
     * 
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * get User status
     * 
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * set User status
     * 
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * check if User is admin
     * 
     * @return bool
     */
    public function isAdmin()
    {
        // if we return the role itself, we'll have to remember which value represents which level of permissions every time we call this
        return $this->role == 1;
    }

    /**
     * set User role
     * 
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }
    
    /**
     * get User role
     * 
     * @return string $role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
        
    }
    
    /**
     * {@inheritDoc}
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * Username is in this case the email
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->email;
    }
    
    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return null;
    }
    
    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        if ($this->isAdmin()) {
            return array('ROLE_USER', 'ROLE_ADMIN');
        }
        return array("ROLE_USER");
    }
    
}
