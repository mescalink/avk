<?php

namespace Avk\Components;

use Bex\Bbc\Basis;
if(!defined('B_PROLOG_INCLUDED')||B_PROLOG_INCLUDED!==true)die();

// Подключаем модуль, т. к. в нём находится класс для базового компонента
if (!\Bitrix\Main\Loader::includeModule('bex.bbc')) return false;

class CDullComponent extends Basis
{

    protected function executeMain()
    {
        $this->arResult['VALUE_STR'] = "Some string value";

        $application = \Bitrix\Main\Application::getInstance();
        $context=$application->getContext();
        $server=$context->getServer();

        $this->arResult["SERVER"]=array(
            "ROOT"=>$server->getDocumentRoot(),
            "BITRIX"=>$server->getPersonalRoot(),
            "HOST"=>$server->getHttpHost(),
            "SERVER"=>$server->getServerName(),
            "PORT"=>$server->getPhpSelf(),
            "URI"=>$server->getRequestUri(),
            "SCRIPT"=>$server->getScriptName()
        );

        foreach ($this->arParams as $key=>$value){
            $this->arResult["PARAMS"][$key]=$value;
        }
    }

    protected function executeProlog()
    {
        // код который не кешируется
    }
}