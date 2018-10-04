<?php

class DominoCookiesController extends DCBaseController {

    function indexAction( $data ) {

        global $site;

        $util = new DCUtil();
        $trans = new DCLibModulesDominoTranslate();

        $translate = $trans->showTranslate( array( 'cookies_policy_message', 'cookies_policy_button' ) );

        $sql = $util->getDb( array(
            'type' => 'select',
            'result' => 'fetch_one',
            'selectFields' => 'all',
            'from' => array(
                'db' => $site['db'],
                'table' => 'DCDominoCookies'
            ),
            'where' => array(
                array(
                    'field' => 'id',
                    'value' => '1'
                ),
                array(
                    'type' => 'and',
                    'field' => 'lang',
                    'value' => $site['lang']
                )
            )

        ) );

        return array(
            'text' => $sql ? $sql['content'] : $translate['cookies_policy_message'],
            'accept' => $sql ? $sql['name'] : $translate['cookies_policy_button'],
            "display" => isset( $_COOKIE["DominoCookies"] ) ? false : true
        );

    }

    function acceptAction( $data ) {

        setcookie("DominoCookies", true, time() + (10 * 365 * 24 * 60 * 60));

    }

}
