<?php

namespace Objects\AttendenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employee
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Objects\AttendenceBundle\Entity\EmployeeRepository")
 */
class Employee
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
     * @ORM\OneToOne(targetEntity="Objects\UserBundle\Entity\User",inversedBy="employee")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Department",inversedBy="employees")
     * @ORM\JoinColumn(name="dep_id",referencedColumnName="id")
     */
    private $department;

    /**
     * @ORM\ManyToOne(targetEntity="Position",inversedBy="employees")
     * @ORM\JoinColumn(name="pos_id",referencedColumnName="id")
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=255)
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text")
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var integer
     *
     * @ORM\Column(name="hour_rate", type="integer")
     */
    private $hourRate;

    /**
     * @var integer
     *
     * @ORM\Column(name="casual_vac", type="float")
     */
    private $casualVac;

    /**
     * @var integer
     *
     * @ORM\Column(name="unexpected_vac", type="integer")
     */
    private $unexpectedVac;


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
     * Set telephone
     *
     * @param string $telephone
     * @return Employee
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Employee
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Employee
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Employee
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set hourRate
     *
     * @param integer $hourRate
     * @return Employee
     */
    public function setHourRate($hourRate)
    {
        $this->hourRate = $hourRate;

        return $this;
    }

    /**
     * Get hourRate
     *
     * @return integer
     */
    public function getHourRate()
    {
        return $this->hourRate;
    }

    /**
     * Set casualVac
     *
     * @param integer $casualVac
     * @return Employee
     */
    public function setCasualVac($casualVac)
    {
        $this->casualVac = $casualVac;

        return $this;
    }

    /**
     * Get casualVac
     *
     * @return integer
     */
    public function getCasualVac()
    {
        return $this->casualVac;
    }

    /**
     * Set unexpectedVac
     *
     * @param integer $unexpectedVac
     * @return Employee
     */
    public function setUnexpectedVac($unexpectedVac)
    {
        $this->unexpectedVac = $unexpectedVac;

        return $this;
    }

    /**
     * Get unexpectedVac
     *
     * @return integer
     */
    public function getUnexpectedVac()
    {
        return $this->unexpectedVac;
    }

    /**
     * Set user
     *
     * @param \Objects\AttendenceBundle\Entity\User $user
     * @return Employee
     */
    public function setUser(\Objects\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Objects\AttendenceBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set department
     *
     * @param \Objects\AttendenceBundle\Entity\Department $department
     * @return Employee
     */
    public function setDepartment(\Objects\AttendenceBundle\Entity\Department $department = null)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return \Objects\AttendenceBundle\Entity\Department
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set position
     *
     * @param \Objects\AttendenceBundle\Entity\Position $position
     * @return Employee
     */
    public function setPosition(\Objects\AttendenceBundle\Entity\Position $position = null)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return \Objects\AttendenceBundle\Entity\Position
     */
    public function getPosition()
    {
        return $this->position;
    }

    public function __toString() {
        return (String) $this->user;
    }
}
