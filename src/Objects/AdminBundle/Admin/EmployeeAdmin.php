<?php

namespace Objects\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class EmployeeAdmin extends Admin {

    /**
     * this variable holds the route name prefix for this actions
     * @var string
     */
    protected $baseRouteName = 'employee_admin';

    /**
     * this variable holds the url route prefix for this actions
     * @var string
     */
    protected $baseRoutePattern = 'employee';

    /**
     * this function configure the list action fields
     * @author Mahmoud
     * @param ListMapper $listMapper
     */
    public function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('id')
                ->add('user')
                ->add('department')
                ->add('position')
                ->add('telephone')
                ->add('mobile')
                ->add('address')
                ->add('photo')
                ->add('hourRate')
                ->add('casualVac')
                ->add('unexpectedVac')
                ->add('Attendence', null, array('template' => 'ObjectsAdminBundle:General:list_attendence.html.twig'))
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
                ->add('department')
                ->add('position')
                ->add('telephone')
                ->add('mobile')
                ->add('address')
                ->add('photo')
                ->add('hourRate')
                ->add('casualVac')
                ->add('unexpectedVac');
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
                ->add('department')
                ->add('position')
                ->add('telephone')
                ->add('mobile')
                ->add('address')
                ->add('photo')
                ->add('hourRate')
                ->add('casualVac')
                ->add('unexpectedVac');
    }

    /**
     * this function configure the new, edit form fields
     * @author Mahmoud
     * @param FormMapper $formMapper
     */
    public function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('user')
                ->add('department')
                ->add('position')
                ->add('telephone')
                ->add('mobile')
                ->add('address')
                ->add('photo')
                ->add('hourRate')
                ->add('casualVac')
                ->add('unexpectedVac')
                ->setHelps(array(
                    'name' => 'Enter name of Vacation',
                ));
    }


}

?>
