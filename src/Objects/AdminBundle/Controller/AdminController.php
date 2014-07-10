<?php

namespace Objects\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Yaml\Yaml;

/**
 * Admin controller.
 */
class AdminController extends Controller {

    private function clearProductionCache() {
        exec(PHP_BINDIR . '/php-cli ' . __DIR__ . '/../../../../app/console cache:clear -e prod');
        exec(PHP_BINDIR . '/php-cli ' . __DIR__ . '/../../../../app/console cache:warmup --no-debug -e prod');
    }

    public function siteConfigurationsAction() {
        $configFilePath = __DIR__ . '/../../AdminBundle/Resources/config/services.yml';
        $parsedData = Yaml::parse(file_get_contents($configFilePath));
        if (!isset($parsedData['parameters']) || !$parsedData['parameters']) {
            $parameters = null;
            $formView = null;
        } else {
            $formBuilder = $this->createFormBuilder($parsedData['parameters']);
            $parameters = array_keys($parsedData['parameters']);
            foreach ($parameters as $parameter) {
                if (preg_match('/email$/i', $parameter) === 1) {
                    $formBuilder->add($parameter, 'email', array('constraints' => array(new Constraints\NotBlank(), new Constraints\Email())));
                } elseif (preg_match('/url$/i', $parameter) === 1) {
                    $formBuilder->add($parameter, 'url', array('constraints' => array(new Constraints\NotBlank(), new Constraints\Url())));
                } else {
                    $formBuilder->add($parameter, 'text', array('constraints' => new Constraints\NotBlank()));
                }
            }
            $form = $formBuilder->getForm();
            $request = $this->getRequest();
            if ($request->getMethod() == 'POST') {
                $form->handleRequest($request);
                if ($form->isValid()) {
                    file_put_contents($configFilePath, Yaml::dump(array('parameters' => $form->getData()), 3));
                    $request->getSession()->getFlashBag()->add('success', 'Saved Successfully');
                    $this->clearProductionCache();
                }
            }
            $formView = $form->createView();
        }
        return $this->render('ObjectsAdminBundle:Admin:siteConfigurations.html.twig', array(
                    'parameters' => $parameters,
                    'form' => $formView
        ));
    }

    public function siteEmailsAction() {
        $contactUsFilePath = __DIR__ . '/../../../../app/Resources/views/Emails/contact_us.txt';
        $initialData = array();
        $initialData['contactUsText'] = file_get_contents($contactUsFilePath);
        $form = $this->createFormBuilder($initialData)
                ->add('contactUsText', 'textarea', array('constraints' => new Constraints\NotBlank(), 'required' => false, 'attr' => array('class' => 'ckeditor')))
                ->getForm();
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $data = $form->getData();
                file_put_contents($contactUsFilePath, $data['contactUsText']);
                $request->getSession()->getFlashBag()->add('success', 'Saved Successfully');
                $this->clearProductionCache();
            }
        }
        return $this->render('ObjectsAdminBundle:Admin:siteEmails.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    public function loginAction() {
        $request = $this->getRequest();
        $session = $request->getSession();
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                    SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
        return $this->render('ObjectsAdminBundle:General:login.html.twig', array(
                    'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                    'error' => $error
        ));
    }

    /*
     * get User Attendence with specified period
     */
    public function showEmployeeAttendenceAction($user_id) {
        $request = $this->getRequest();

        // Initilaize result variables
        $attendenceDays = null;
        $workingHours = null;
        $workingDays = null;
        $vacationDays = null;

        // Create search form
        $form = $this->createFormBuilder()
            ->add('startDate', 'date',array('data'=>new \DateTime(date("Y-m-01"))))
            ->add('endDate', 'date',array('data'=>new \DateTime()))
            ->add('Display', 'submit')
            ->getForm();

        // Initialize start and end date to view this month attendence
        $startDate = new \DateTime(date("Y-m-01"));
        $endDate = new \DateTime();

        if($request->isMethod("POST")) {
            // Fill Requested data to Form
            $form->handleRequest($request);

            if($form->isValid()) {
                $formData = $form->getData();
                $startDate = $formData['startDate'];
                $endDate = $formData['endDate'];
            }
        }

        // Get User Attendence within specified Period
        $attendenceDays = $this->getDoctrine()
            ->getRepository('ObjectsAttendenceBundle:Attendence')
            ->getAttendence($user_id, $startDate, $endDate);

        // Get Username
        $username = $this->getDoctrine()
            ->getRepository('ObjectsUserBundle:User')
            ->find($user_id)->getFirstName();

        // Get User Vacation Days
        $vacationDays = $this->getDoctrine()
            ->getRepository('ObjectsAttendenceBundle:UserVacation')
            ->getUserVacationNumber($user_id, $startDate, $endDate);
        $vacationDays = $vacationDays?round($vacationDays[0][1]):0;

        // Get working hours per period
        $workingHours = $this->getDoctrine()
            ->getRepository('ObjectsAttendenceBundle:Attendence')
            ->getAttendenceHours($user_id, $startDate, $endDate);
        $workingHours = $workingHours?round($workingHours[0][1]):0;

        // Get working days per specified period
        $workingDays = count($attendenceDays);
        
        return $this->render('ObjectsAdminBundle:Report:show_attendence.html.twig', array(
                    'form' => $form->createView(),
                    'attendenceDays' => $attendenceDays,
                    'workingHours' => $workingHours,
                    'workingDays' => $workingDays,
                    'vacationDays' => $vacationDays,
                    'username' => $username
        ));
    }

    public function customUserVacationAction() {
        $request = $this->getRequest();

        $doctrine = $this->getDoctrine();

        $employeeRepository = $doctrine->getRepository("ObjectsAttendenceBundle:Employee");
        $userRepositry = $doctrine->getRepository("ObjectsUserBundle:User");

        $employees = $employeeRepository->findAll();

        $employeesArray = array();
        foreach ($employees as $employee) {
            $employeesArray[$employee->getUser()->getId()] = $employee->getUser()->getFirstName();
        }

        $form = $this->createFormBuilder()
                ->add('vacation',
                      'entity',
                      array('class' => 'ObjectsAttendenceBundle:Vacation',
                            'property' => 'name',
                            'required' => true,
                            'empty_value' => false,
                            'multiple' => false))
                ->add('startDate', 'date',array('data'=>new \DateTime(date("Y-m-01"))))
                ->add('endDate', 'date',array('data'=>new \DateTime()))
                ->add('employees','choice',
                      array('choices' => $employeesArray,
                            'required' => true,
                            'empty_value' => false,
                            'multiple' => true,
                             'attr' => array('onchange' => 'checkSelectAll(this)')
                            ))
                ->add('Selectall', 'checkbox',
                        array('attr' => array('onchange' => 'selectAll(this)'),
                            'required' => false)
                            )
                ->add('notes', 'textarea')
                ->add('Add', 'submit')
                ->getForm();

        if($request->isMethod("POST")) {
            // Fill Requested data to Form
            $form->handleRequest($request);

            if($form->isValid()) {
                $formData = $form->getData();
                $vacation = $formData['vacation'];
                $startDate = $formData['startDate'];
                $endDate = $formData['endDate'];
                $users = $formData['employees'];
                $notes = $formData['notes'];
                $allUserSelected = $formData['Selectall'];

                $doctrineManager = $doctrine->getManager();

                if($allUserSelected) {
                    $this->fillUserVacation(null, $vacation, $startDate, $endDate, $notes, $doctrineManager);
                }
                else {
                    foreach ($users as $user ) {
                        $this->fillUserVacation($userRepositry->find($user), $vacation, $startDate, $endDate, $notes, $doctrineManager);
                    }
                }
                $doctrineManager->flush();
                $request->getSession()->getFlashBag()->add('success', 'User Vacation saved Successfully');

                return $this->redirect($this->generateUrl("admin_home"));

            }
        }

        return $this->render('ObjectsAdminBundle:Report:add_custom_user_vacation.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    private function fillUserVacation($user, $vacation, $startDate, $endDate, $notes, $doctrineManager) {
        $userVacation = new \Objects\AttendenceBundle\Entity\UserVacation();

        $userVacation->setUser($user);
        $userVacation->setNotes($notes);
        $userVacation->setStartDate($startDate);
        $userVacation->setEndDate($endDate);
        $userVacation->setVacation($vacation);

        $vacationName = $vacation->getName();

        // Initialize private vacation
        $casualDays = 0;
        $unexpectedDays = 0;

        // Get number of vacation days
        $daysDiff = $endDate->diff($startDate);

        $vacationDaysNumber = $daysDiff->d;

        $userId = (isset($user))? $user->getId() : null;

        if( $vacationName == "Casual" || $vacationName == "Unexpected") {
            // Get minus weekend days from vacation days
            $vacationDaysNumber = $this->explodeWeekendDays($startDate, $daysDiff->d);

            if( $vacationName == "Casual") {
                $casualDays = $vacationDaysNumber;
            }
            else if( $vacationName == "Unexpected") {
                $unexpectedDays = $vacationDaysNumber;
            }

            // Get doctrine service
            $doctrine = $this->getDoctrine();

            // Minus weekend days from vacation days
            $doctrine->getRepository('ObjectsAttendenceBundle:Employee')
                ->minusUserVacation($userId, $casualDays, $unexpectedDays);
        }

        $userVacation->setTotal($vacationDaysNumber);

        $doctrineManager->persist($userVacation);
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
        $container = $this->container;
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
