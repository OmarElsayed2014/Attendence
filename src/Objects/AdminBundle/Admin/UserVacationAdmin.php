<?php

namespace Objects\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class UserVacationAdmin extends Admin {

    /**
     * this variable holds the route name prefix for this actions
     * @var string
     */
    protected $baseRouteName = 'user_vacation_admin';

    /**
     * this variable holds the url route prefix for this actions
     * @var string
     */
    protected $baseRoutePattern = 'user_vacation';

    /**
     * this function configure the list action fields
     * @author Mahmoud
     * @param ListMapper $listMapper
     */
    public function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('id')
                ->add('user')
                ->add('vacation')
                ->add('startDate')
                ->add('endDate')
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
                ->add('vacation')
                ->add('startDate')
                ->add('endDate')
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
                ->add('vacation')
                ->add('startDate')
                ->add('endDate')
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
                ->add('vacation')
                ->add('startDate')
                ->add('endDate')
                ->add('notes')
                ->setHelps(array(
                    'name' => 'Enter name of Vacation',
                ));
    }

    /**
     * @param \Objects\AttendenceBundle\Entity\UserVacation $userVacation
     */
    public function prePersist($userVacation) {
        // Get Vacation informations
        $user_id = $userVacation->getUser()->getId();
        $vacationName = $userVacation->getVacation()->getName();
        $startDate = $userVacation->getStartDate();
        $endDate = $userVacation->getEndDate();

        // Initialize private vacation
        $casualDays = 0;
        $unexpectedDays = 0;

        // Get number of vacation days
        $daysDiff = $endDate->diff($startDate);

        // Get minus weekend days from vacation days
        $vacationDaysNumber = $this->explodeWeekendDays($startDate, $daysDiff->d);

        if( $vacationName == "Casual") {
            $casualDays = $vacationDaysNumber;
        }
        else if( $vacationName == "Unexpected") {
            $unexpectedDays = $vacationDaysNumber;
        }

        // Get doctrine service
        $doctrine = $this->getConfigurationPool()->getContainer()->get("doctrine");

        // Minus weekend days from vacation days
        $doctrine->getRepository('ObjectsAttendenceBundle:Employee')
            ->minusUserVacation($user_id, $casualDays, $unexpectedDays);

        $userVacation->setTotal($vacationDaysNumber);
    }

    /*
     * Calculate the weekend days from configuration file
     * and minus vacation days from weekend days to get
     * absolute vacation days
     */
    public function explodeWeekendDays($start, $diff) {
        $exactVacationDays = $diff;
        $firstDay = $start->format("N");

        // Get configuartion variables
        $container = $this->getConfigurationPool()->getContainer();
        $weekVacations = $container->getParameter('week_vecations');
        $weekVacationsArray  = array_map('intval', str_split($weekVacations));

        $day = $firstDay;

        // Iterate for vacation days to minus weekend days
        for($index = 0;$index<=$diff;$index++) {

            foreach ( $weekVacationsArray as $weekendDay ) {
                if($day == $weekendDay) {
                    $exactVacationDays--;
                }
            }
            // Add one day to exist date
            $newDate = $start->modify('+1 day');

            // Get day index from date
            $day = $newDate->format("N");
        }

        return $exactVacationDays;
    }
}

?>
