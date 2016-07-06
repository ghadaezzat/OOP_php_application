
<?php
class Shares extends Controller{
  protected function Index(){
    $viewmodel=new ShareModel();
   $this->returnView($viewmodel->Index(),true);
  }
    protected function add(){
    $viewmodel=new ShareModel();
    //true as we want the main layout template
   $this->returnView($viewmodel->add(),true);
  }
}
