<?php

namespace HiFolks\RandoPhp;

use HiFolks\RandoPhp\Exceptions\ModelNotFoundException;
use HiFolks\RandoPhp\Models\Boolean;
use HiFolks\RandoPhp\Models\Char;
use HiFolks\RandoPhp\Models\Chars;
use HiFolks\RandoPhp\Models\Integer as IntModel;
use HiFolks\RandoPhp\Models\DateTime;
use HiFolks\RandoPhp\Models\Byte;
use HiFolks\RandoPhp\Models\FloatModel;
use HiFolks\RandoPhp\Models\Sequence;
use HiFolks\RandoPhp\Models\LatLong;

/**
 * Class Randomize
 *
 * @package HiFolks\RandoPhp
 * @method  static Boolean boolean()
 *
 * @method  static FloatModel float()
 * @method  static Byte byte()
 * @method  static Sequence sequence()
 * @method  static DateTime datetime()
 * @method  static Char char()
 * @method  static LatLong latlong()
 */
class Randomize
{
    /**
     * Registered models with format: 'methodToLoadModel' => ClassName
     * @var mixed[] $models
     */
    private static array $models = [
        'boolean' => Boolean::class,
        //'integer' => IntModel::class,
        'float' => FloatModel::class,
        'byte' => Byte::class,
        'sequence' => Sequence::class,
        'datetime' => DateTime::class,
        'char' => Char::class,
        'latlong' => LatLong::class
    ];


    /**
     * @param int $min
     * @param int $max
     */
    public static function integer(
        $min = IntModel::DEFAULT_MIN,
        $max = IntModel::DEFAULT_MAX
    ): \HiFolks\RandoPhp\Models\Integer {
        return new IntModel($min, $max);
    }


    /**
     * @param int $count
     */
    public static function chars($count = 10): \HiFolks\RandoPhp\Models\Chars
    {
        return new Chars($count);
    }


    /**
     * Return the model registered in $models property
     *
     * @return mixed
     * @throws ModelNotFoundException
     */
    public static function __callStatic(string $name, mixed $arguments)
    {
        if (in_array($name, array_keys(self::$models))) {
            /*
            if (count($arguments)) {
                return new self::$models[$name]($arguments);
            }
            */

            return new self::$models[$name]();
        }

        throw new ModelNotFoundException('Model not found');
    }
}
