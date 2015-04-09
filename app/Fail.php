<?php namespace Style;

class Fail {

  protected $view = 'errors.fail';

  public function noPermission(){
    return view($this->view)->with('fail', $this->permission('view'));
  }

  public function noPermissionEdit(){
    return view($this->view)->with('fail', $this->permission('edit'));
  }

  private function permission($verb){
    return "You do not have permission to $verb this style guide";
  }

  public function gitHubAuthError(){
    return view($this->view)->with('fail', 'Unable to Authenticate with GitHub');
  }

}