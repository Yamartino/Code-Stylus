<?php namespace Style;

use Illuminate\Support\Str;

class CodeParser {

  public function H1ToList($html){
    $html = preg_replace_callback('/<h1>(.+)<\/h1>/', function($val){
      $save = Str::random(6);
      GuideIndex::setArray(['id'=>$save, 'title'=>$val[1]]);
      return "<a name='$save'></a>$val[0]";
    }, $html);
    return [
      'content' => $html,
      'index'   => GuideIndex::getArray()
    ];
  }
}