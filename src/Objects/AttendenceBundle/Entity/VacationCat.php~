<?php

namespace Objects\AttendenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VacationCat
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Objects\AttendenceBundle\Entity\VacationCatRepository")
 */
class VacationCat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\oneToMany(targetEntity="Vacation",mappedBy="vacationCat")
     */
    private $vacations;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


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
     * Set name
     *
     * @param string $name
     * @return VacationCat
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->vacations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add vacations
     *
     * @param \Objects\AttendenceBundle\Entity\Vacation $vacations
     * @return VacationCat
     */
    public function addVacation(\Objects\AttendenceBundle\Entity\Vacation $vacations)
    {
        $this->vacations[] = $vacations;

        return $this;
    }

    /**
     * Remove vacations
     *
     * @param \Objects\AttendenceBundle\Entity\Vacation $vacations
     */
    public function removeVacation(\Objects\AttendenceBundle\Entity\Vacation $vacations)
    {
        $this->vacations->removeElement($vacations);
    }

    /**
     * Get vacations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVacations()
    {
        return $this->vacations;
    }

    public function __toString() {
        return (String) $this->name;
    }
}
