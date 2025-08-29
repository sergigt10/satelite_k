<?php

    function translatePHP($value, $type) 
    {
        switch ( app()->getLocale() ) {
            case 'es':
                if ($type === 'nom') {
                    if( $value->nom_esp === 'Álbum') {
                        return 'Disco';
                    } else {
                        return $value->nom_esp;
                    }
                }
                break;
            default:
                if ($type === 'nom') {
                    if( $value->nom_cat === 'Àlbum') {
                        return 'Disc';
                    } else {
                        return $value->nom_cat;
                    }
                }
        }
    }