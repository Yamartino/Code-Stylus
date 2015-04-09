<?php namespace Style\Markdown;

class CodeParser {

  public function H1ToList($html){
    $html = preg_replace_callback('/<h1>(.+)<\/h1>/', function($val){
      $save = $this->getHash($val[1]);
      $this->setArray($save, $val[1]);
      return "<a name='$save'></a>$val[0]";
    }, $html);
    return [
      'content' => $html,
      'index'   => GuideIndex::getArray()
    ];
  }

  private function getHash($val){
    return substr(md5($val), 25);
  }

  private function setArray($id, $title){
    GuideIndex::setArray(compact('id', 'title'));
  }
}
