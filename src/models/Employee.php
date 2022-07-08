<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Emloyees")
 */
class Employee
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="models\Project")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $project;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setProject($project)
    {
        $this->project = $project;
    }

    public function getProject()
    {
        return $this->project;
    }
}
