<?php
class Home extends Controller{
    protected function Index(){

    $viewmodel=new HomeModel();
    $this->returnView($viewModel->Index(),true);
    }
}
