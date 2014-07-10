<?php

namespace Objects\AttendenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Permission
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Objects\AttendenceBundle\Entity\PermissionRepository")
 */
class Permission
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
     * @ORM\ManyToOne(targetEntity="Objects\UserBundle\Entity\User",inversedBy="permissions")
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
     * @var integer
     *
     * @ORM\Column(name="no_of_hrs", type="integer")
     */
    private $noOfHrs;


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
     * @return Permission
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
     * @return Permission
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
     * Set noOfHrs
     *
     * @param integer $noOfHrs
     * @return Permission
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
     * Set user
     *
     * @param \Objects\Attendence\Entity\User $user
     * @return Permission
     */
    public function setUser(\Objects\Attendence\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Objects\Attendence\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function __toString() {
        return (String) $this->user;
    }
}
