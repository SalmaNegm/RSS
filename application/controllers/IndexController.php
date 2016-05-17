<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->form=new Application_Form_Rss();
        $this->model=new Application_Model_Rss();
    }

    public function indexAction()
    {
    	$arr_paths=$this->model->listAll();
    	$data=array();
    	foreach ($arr_paths as $path) {
    		$data[]= new Zend_Feed_Rss($path['path']);
    	}
        // $channel = new Zend_Feed_Rss('http://feeds.reuters.com/reuters/environment');
        $this->view->RSSs=$data;
    }

    public function listAction()
    {
    	if($this->getRequest()->isPost())
    	{
    		if($this->form->isValid($this->getRequest()->getParams()))
    		{
    			$data=$this->form->getValues();
    			$data['path']=trim($data['path']);
    			if($this->model->addPath($data))
				{
                    $this->redirect('index/list');
                }
    		}
    	}
    	$this->view->form=$this->form;
    	$this->view->paths=$this->model->listAll();
    }

    public function deleteAction()
    {
    	 $id=$this->getRequest()->getParam('id');
    	if($this->model->deletePath($id))
		{
            $this->redirect('index/list');
        }
    }

}

