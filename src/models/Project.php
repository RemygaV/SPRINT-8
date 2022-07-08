<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="Projects")
 */
class Project
{

    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /** 
     * @ORM\Column(type="string", unique=true)
     */
    public $projectName;
    /**
     * @ORM\OneToMany(targetEntity="models\Employee", mappedBy="project")
     */
    private $employees;

    public function __construct() {
        $this->employees = new ArrayCollection();

    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->projectName;
    }

    public function setName($projectName)
    {
        $this->projectName = $projectName;
    }
    
    public function getEmployees()
    {
        return $this->employees;
    }
}
