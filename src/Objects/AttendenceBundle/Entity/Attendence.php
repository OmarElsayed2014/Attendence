<?php

namespace Objects\AttendenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attendence
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Objects\AttendenceBundle\Entity\AttendenceRepository")
 */
class Attendence
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
     * @ORM\ManyToOne(targetEntity="Objects\UserBundle\Entity\User",inversedBy="attendences")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="checkin", type="datetime")
     */
    private $checkin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="checkout", type="datetime")
     */
    private $checkout;

    /**
     * @var string
     *
     * @ORM\Column(name="location_checkin", type="string", length=255)
     */
    private $locationCheckin;

    /**
     * @var string
     *
     * @ORM\Column(name="location_checkout", type="string", length=255)
     */
    private $locationCheckout;

    /**
     * @var integer
     *
     * @ORM\Column(name="plus", type="integer")
     */
    private $plus;

    /**
     * @var integer
     *
     * @ORM\Column(name="minus", type="integer")
     */
    private $minus;

    /**
     * @var integer
     *
     * @ORM\Column(name="no_of_hrs", type="integer")
     */
    private $noOfHrs;

    /**
     * @var integer
     *
     * @ORM\Column(name="total", type="integer")
     */
    private $total;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text")
     */
    private $notes;


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
     * Set checkin
     *
     * @param \DateTime $checkin
     * @return Attendence
     */
    public function setCheckin($checkin)
    {
        $this->checkin = $checkin;

        return $this;
    }

    /**
     * Get checkin
     *
     * @return \DateTime
     */
    public function getCheckin()
    {
        return $this->checkin;
    }

    /**
     * Set checkout
     *
     * @param \DateTime $checkout
     * @return Attendence
     */
    public function setCheckout($checkout)
    {
        $this->checkout = $checkout;

        return $this;
    }

    /**
     * Get checkout
     *
     * @return \DateTime
     */
    public function getCheckout()
    {
        return $this->checkout;
    }

    /**
     * Set locationCheckin
     *
     * @param string $locationCheckin
     * @return Attendence
     */
    public function setLocationCheckin($locationCheckin)
    {
        $this->locationCheckin = $locationCheckin;

        return $this;
    }

    /**
     * Get locationCheckin
     *
     * @return string
     */
    public function getLocationCheckin()
    {
        return $this->locationCheckin;
    }

    /**
     * Set locationCheckout
     *
     * @param string $locationCheckout
     * @return Attendence
     */
    public function setLocationCheckout($locationCheckout)
    {
        $this->locationCheckout = $locationCheckout;

        return $this;
    }

    /**
     * Get locationCheckout
     *
     * @return string
     */
    public function getLocationCheckout()
    {
        return $this->locationCheckout;
    }

    /**
     * Set plus
     *
     * @param integer $plus
     * @return Attendence
     */
    public function setPlus($plus)
    {
        $this->plus = $plus;

        return $this;
    }

    /**
     * Get plus
     *
     * @return integer
     */
    public function getPlus()
    {
        return $this->plus;
    }

    /**
     * Set minus
     *
     * @param integer $minus
     * @return Attendence
     */
    public function setMinus($minus)
    {
        $this->minus = $minus;

        return $this;
    }

    /**
     * Get minus
     *
     * @return integer
     */
    public function getMinus()
    {
        return $this->minus;
    }

    /**
     * Set noOfHrs
     *
     * @param integer $noOfHrs
     * @return Attendence
     */
    public function setNoOfHrs($noOfHrs)
    {
        $this->noOfHrs = $noOfHrs;

        return $this;
    }

    /**
     * Get noOfHrs
     *
     * @return integer
     */
    public function getNoOfHrs()
    {
        return $this->noOfHrs;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return Attendence
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set user
     *
     * @param \Objects\AttendenceBundle\Entity\User $user
     * @return Attendence
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

    public function __toString() {
        return (String) $this->user;
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return Attendence
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return integer 
     */
    public function getTotal()
    {
        return $this->total;
    }
}
