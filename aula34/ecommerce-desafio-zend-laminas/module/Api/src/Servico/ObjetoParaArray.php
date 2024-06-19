<?php

namespace Api\Servico;

class ObjetoParaArray{
    public static function convertObjetoParaArray($objeto){
        $reflectionClass = new \ReflectionObject($objeto);
        $array = [];
        
        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($objeto);
        }
        
        return $array;
    }
}