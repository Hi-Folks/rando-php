<?php

namespace HiFolks\RandoPhp;

use HiFolks\RandoPhp\Exceptions\ModelNotFoundException;
use HiFolks\RandoPhp\Models\Boolean;
use HiFolks\RandoPhp\Models\Char;
use HiFolks\RandoPhp\Models\Integer;
use HiFolks\RandoPhp\Models\DateTime;
use HiFolks\RandoPhp\Models\Byte;
use HiFolks\RandoPhp\Models\FloatModel;
use HiFolks\RandoPhp\Models\Sequence;
use HiFolks\RandoPhp\Models\LatLong;

class Randomize
{

    /**
     * Registered models with format: 'methodToLoadModel' => ClassName
     */
    private static $models = [
        'boolean' => Boolean::class,
        'integer' => Integer::class,
        'float' => FloatModel::class,
        'byte' => Byte::class,
        'sequence' => Sequence::class,
        'datetime' => DateTime::class,
        'char' => Char::class,
        'latlong' => LatLong::class,
    ];

    /**
     * Return the model registered in $models property
     *
     * @param $name
     * @param $arguments
     * @return mixed
     * @throws ModelNotFoundException
     */
    public static function __callStatic($name, $arguments)
    {
        if(in_array($name, array_keys(self::$models))) {

            if(count($arguments))
                return new self::$models[$name]($arguments);

            return new self::$models[$name];

        }

        throw new ModelNotFoundException('Model not found');
    }
}
