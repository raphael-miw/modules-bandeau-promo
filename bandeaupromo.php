<?php
/*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
    exit;

class BandeauPromo extends Module
{
    public function __construct()
    {
        $this->name = 'bandeaupromo';
        $this->tab = 'front_office_features';
        $this->version = '1.3.0';
        $this->author = 'Raphael';
        $this->need_instance = 0;

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('BandeauPromo');
        $this->description = $this->l('Ajoute un bandeau promotionnel eu haut de votre site.');
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        if (!parent::install())
            return false;

        // Hook the module at the end on the header, only if it has been hooked
        return $this->registerHook('displayHeader')
            && $this->registerHook('displayBandeauPromo');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookDisplayHeader($params) {
        $this->context->controller->addCSS($this->_path.'/views/css/front.css');
    }

    public function hookDisplayBandeauPromo($params)
    {
        $this -> smarty -> assign(array(
            "bandeau_texte" => "Promo sur toute la boutique !"
        ));
        return $this -> display(__FILE__,"bandeau.tpl");
    }
}
