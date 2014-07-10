<?php

namespace Objects\AttendenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vacation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Objects\AttendenceBundle\Entity\VacationRepository")
 */
class Vacation
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
     * @ORM\ManyToOne(targetEntity="VacationCat",inversedBy="vacations")
     * @ORM\JoinColumn(name="vacation_cat_id",referencedColumnName="id")
     */
    private $vacationCat;

    /**
     * @ORM\oneToMany(targetEntity="UserVacation",mappedBy="vacation")
     */
    private $userVacations;

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
     * @return Vacation
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
        $this->userVacations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set vacationCat
     *
     * @param \Objects\AttendenceBundle\Entity\VacationCat $vacationCat
     * @return Vacation
     */
    public function setVacationCat(\Objects\AttendenceBundle\Entity\VacationCat $vacationCat = null)
    {
        $this->vacationCat = $vacationCat;

        return $this;
    }

    /**
     * Get vacationCat
     *
     * @return \Objects\AttendenceBundle\Entity\VacationCat
     */
    public function getVacationCat()
    {
        return $this->vacationCat;
    }

    /**
     * Add userVacations
     *
     * @param \Objects\AttendenceBundle\Entity\UserVacation $userVacations
     * @return Vacation
     */
    public function addUserVacation(\Objects\AttendenceBundle\Entity\UserVacation $userVacations)
    {
        $this->userVacations[] = $userVacations;

        return $this;
    }

    /**
     * Remove userVacations
     *
     * @param \Objects\AttendenceBundle\Entity\UserVacation $userVacations
     */
    public function removeUserVacation(\Objects\AttendenceBundle\Entity\UserVacation $userVacations)
    {
        $this->userVacations->removeElement($userVacations);
    }

    /**
     * Get userVacations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserVacations()
    {
        return $this->userVacations;
    }

    public function __toString() {
        return (String) $this->name;
    }
}
