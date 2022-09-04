<?php

class SquareAreaLib
{
    public function getSquareArea(int $diagonal)
    {
        $area = ($diagonal**2)/2;
        return $area;
    }
}
class CircleAreaLib
{
    public function getCircleArea(int $diagonal)
    {
        $area = (M_PI * $diagonal**2)/4;
        return $area;
    }
}

interface ISquare
{
    function squareArea(int $sideSquare);
}

interface ICircle
{
    function circleArea(int $circumference);
}


class SquareArea implements ISquare {
    protected $squareAreaExternal;

    /**
     * SquareArea constructor
     */
    public function __construct()
    {
        $this->squareAreaExternal = new SquareAreaLib();
    }


    public function squareArea(int $sideSquare)
    {
        $diagonal = $sideSquare*(2**0.5);

        $this->squareAreaExternal->getSquareArea($diagonal);
    }

}

class CircleArea implements ICircle {
    protected $circleAreaExternal;

    /**
     * CircleArea constructor.
     */
    public function __construct()
    {
        $this->circleAreaExternal = new CircleAreaLib();
    }


    public function circleArea(int $circumference)
    {
        $diagonal = $circumference/M_PI;

        $this->circleAreaExternal->getCircleArea($diagonal);
    }

}

