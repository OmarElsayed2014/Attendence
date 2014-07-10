<?php

namespace Objects\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class AttendenceAdmin extends Admin {

    /**
     * this variable holds the route name prefix for this actions
     * @var string
     */
    protected $baseRouteName = 'attendence_admin';

    /**
     * this variable holds the url route prefix for this actions
     * @var string
     */
    protected $baseRoutePattern = 'attendence';

    /**
     * this function configure the list action fields
     * @author Mahmoud
     * @param ListMapper $listMapper
     */
    public function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('id')
                ->add('user')
                ->add('checkin')
                ->add('checkout')
                ->add('locationCheckin')
                ->add('locationCheckout')
                ->add('notes')
                ->add('_action', 'actions', array(
                    'actions' => array(
                        'show' => array(),
                        'edit' => array(),
                        'delete' => array(),
                    )
        ));
    }

    /**
     * this function configure the show action fields
     * @author Mahmoud
     * @param ShowMapper $showMapper
     */
    public function configureShowField(ShowMapper $showMapper) {
        $showMapper
                ->add('id')
                ->add('user')
                ->add('checkin')
                ->add('checkout')
                ->add('locationCheckin')
                ->add('locationCheckout')
                ->add('plus')
                ->add('minus')
                ->add('noOfHrs')
                ->add('notes');
    }

    /**
     * this function configure the list action filters fields
     *
     * @author Mahmoud
     * @param DatagridMapper $datagridMapper
     */
    public function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('id')
                ->add('user')
                ->add('checkin')
                ->add('checkout')
                ->add('locationCheckin')
                ->add('locationCheckout')
                ->add('plus')
                ->add('minus')
                ->add('noOfHrs')
                ->add('notes');
    }

    /**
     * this function configure the new, edit form fields
     * @author Mahmoud
     * @param FormMapper $formMapper
     */
    public function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('user')
                ->add('checkin', null, array('data'=>new \DateTime()))
                ->add('checkout', null, array('data'=>new \DateTime()))
                ->add('locationCheckin')
                ->add('locationCheckout')
                ->add('notes')
                ->setHelps(array(
                    'name' => 'Enter name of Vacation',
        ));
    }

    /**
     * @param \Objects\AttendenceBundle\Entity\Attendence $attend
     */
    public function prePersist($attend) {
        $container = $this->getConfigurationPool()->getContainer();
        $maxCheckinTime = $container->getParameter('max_checkin');

        $checkIn = $attend->getCheckin();
        $checkOut = $attend->getCheckout();

        $checkInCalculated = new \DateTime($attend->getCheckin()->format("h:i"));

        $maxCheckin = new \DateTime($maxCheckinTime);

        if ($checkIn) {
            $hourDiff = $checkInCalculated->diff($maxCheckin);
            $minDiff = ($hourDiff->h * 60) + $hourDiff->i;

            $minus = ($checkInCalculated > $maxCheckin) ? $minDiff : 0;
            $attend->setMinus($minus);
        }

        if ($checkOut) {
            //$userMinCheckout = $checkIn + '8:00';
            #$plus = ($checkOut > $userMinCheckout)?$checkOut - $userMinCheckout:0;
            $plus = 0;

            $noOfHrs = $checkOut->diff($checkIn);
            $noOfHrs = ($noOfHrs->h * 60) + $noOfHrs->i;

            $attend->setPlus($plus);
            $attend->setNoOfHrs($noOfHrs);
            $attend->setTotal($noOfHrs + $plus - $minus);
        }
    }

}

?>
