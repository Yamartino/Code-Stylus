<?php namespace Style;

class GuideIndex {
  private static $array;

  public static function setArray($input){
    self::$array[] = $input;
  }

  public static function getArray(){
    return self::$array;
  }
}