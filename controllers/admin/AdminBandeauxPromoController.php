<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 06/02/16
 * Time: 18:38
 */
include_once _PS_ROOT_DIR_."/modules/bandeaupromo/classes/Bandeau.php";

class AdminBandeauxPromoController extends ModuleAdminController {
    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'miwbandeauxpromo';
        $this->identifier = 'id_bandeau';
        $this->className = 'Bandeau';

        $this->addRowAction('add');
        $this->addRowAction('edit');
        $this->addRowAction('delete');

        $this -> lang = true;

        $this->bulk_actions = array('delete' => array('text' => $this->l('Delete selected'), 'icon' => 'icon-trash', 'confirm' => $this->l('Delete selected items?')));
        $this->fields_list = array(
            'date_start' => array(
                'title' => $this->l('Date de début'),
//                'orderby' => true
            ),
            'date_end' => array(
                'title' => $this->l('Date de fin'),
//                'orderby' => true
            ),
            'text' => array(
                'title' => $this->l('Texte du bandeau'),
                'orderby' => false,
//                'lang' => true
            ),
            'active' => array(
                'title' => $this->l('Status'),
                'active' => 'status',
                'filter_key' => '!active',
                'align' => 'text-center',
                'type' => 'bool',
                'class' => 'fixed-width-sm',
                'orderby' => false
            )
        );

        parent::__construct();
    }

    public function postProcess() {
        return parent::postProcess();
    }

    public function display() {
        parent::display();
    }

    public function renderForm()
    {
        $this->fields_form = array(
            'legend' => array(
                'title' => $this->l('Edition d\'un bandeau', false)
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'name' => 'text',
                    'label' => $this->l('Texte'),
                    'required' => true,
                    'lang' => true
                ),
                array(
                    'type' => 'text',
                    'name' => 'link',
                    'label' => $this->l('Lien (si necessaire)'),
                    'required' => false
                ),
                array(
                    'type' => 'text',
                    'name' => 'duration',
                    'label' => $this->l('Durée (0 pour une durée infinie)'),
                    'required' => false
                ),
                array(
                    'type' => 'date',
                    'name' => 'date_start',
                    'label' => $this->l('Date début affichage'),
                    'required' => false
                ),
                array(
                    'type' => 'date',
                    'name' => 'date_end',
                    'label' => $this->l('Date fin affichage'),
                    'required' => false
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Message actif'),
                    'name' => 'active',
                    'is_bool' => true,
                    'desc' => $this->l('Activer le message en haut de site'),
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => true,
                            'label' => $this->l('Actif')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => false,
                            'label' => $this->l('Inactif')
                        )
                    ),
                ),
            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'name' => 'submitAddbandeauxpromo',
                    'title' => $this->l('Save'),
                    'class' => 'btn btn-default pull-right',
                    'icon' => 'process-icon-save'
                )
            )
        );

        return parent::renderForm();
    }
}