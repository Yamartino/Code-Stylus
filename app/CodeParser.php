<?php namespace Style;

class CodeParser {

  public function H1ToList($html){
    $html = preg_replace_callback('/<h1>(.+)<\/h1>/', function($val){
      $save = substr(md5($val[1]), 25);
      GuideIndex::setArray(['id'=>$save, 'title'=>$val[1]]);
      return "<a name='$save'></a>$val[0]";
    }, $html);
    return [
      'content' => $html,
      'index'   => GuideIndex::getArray()
    ];
  }
}