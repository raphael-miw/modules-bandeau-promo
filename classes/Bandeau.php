<?php

/**
 * Created by PhpStorm.
 * User: raph
 * Date: 06/02/16
 * Time: 11:00
 */
class Bandeau extends ObjectModel
{
    public $id_bandeau;
    public $date_start;
    public $date_end;
    public $text;
    public $link;
    public $active;
    public $duration;

    public static $definition = array(
        'table' => 'miwbandeauxpromo',
        'primary' => 'id_bandeau',
        'multilang' => true,
        'fields' => array(
            'id_bandeau' => array('type' => self::TYPE_INT),
            'date_start' => array('type' => self::TYPE_DATE),
            'date_end' => array('type' => self::TYPE_DATE),
            'text' => array(
                'type' => self::TYPE_STRING,
                'required' => true,
                'size' => 256,
                'lang' => true
            ),
            'duration' => array('type' => self::TYPE_INT),
            'link' => array('type' => self::TYPE_STRING, 'validate' => 'isLinkRewrite'),
            'active' => array('type' => self::TYPE_BOOL),
        )
    );
}