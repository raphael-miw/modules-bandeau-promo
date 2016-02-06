<?php

/**
 * Created by PhpStorm.
 * User: raph
 * Date: 23/01/16
 * Time: 13:12
 */
class FrontController extends FrontControllerCore
{
    public function initContent()
    {
        parent::initContent();

        $this->context->smarty->assign(array(
            'HOOK_BANDEAU_PROMO'       => Hook::exec('displayBandeauPromo')
        ));
    }
}