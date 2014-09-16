<?php

namespace Mm\JamstorageBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Validator\Constraints as Assert;

class JamJarAdmin extends Admin
{
    protected $translationDomain = 'SonataPageBundle'; // default is 'messages'

    /**
     * Fields to be shown on create/edit forms
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('jamType', 'entity', array('class' => 'Mm\JamstorageBundle\Entity\JamType'))
            ->add('year', 'entity', array('class' => 'Mm\JamstorageBundle\Entity\Year'))
            ->add('comment', 'text', array('label' => 'Comment', 'required' => false))
            ->add('amount', 'integer', array('label' => 'Amount', 'mapped' => false, 'data' => 1,
                'constraints' => array(new Assert\GreaterThan(array('value' => 0)))
            ));
    }

    /**
     * Fields to be shown on filter forms
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('jamType')
            ->add('year')
            ->add('comment')
        ;
    }

    /**
     * Fields to be shown on lists
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('jamType')
            ->add('year')
            ->add('comment')
        ;
    }

    /**
     * @inheritdoc
     */
    public function postPersist($object)
    {
        $amount = $this->getForm()->get('amount')->getData();
        $container = $this->getConfigurationPool()->getContainer();
        if($amount > 1) {
            /**
             * @var  \Mm\JamstorageBundle\Service\JamJarService jjservice
             */
            $jjservice = $container->get('jamjarservice');
            $jjservice->createEntities($object, $amount-1);
        }
    }



}
 