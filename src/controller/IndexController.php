<?php
namespace Application\controller;

/**
 * Controller que exibe a tela principal do sistema
 * 
 * @author Tayron Miranda <dev@tayron.com.br>
 */
class IndexController extends AppController 
{   
    /**
     * IndexController::index
     * 
     * Exibe a tela inicial do sistema
     * 
     * @return void
     */
    public function index()
    {      
        $this->setParameters(array('titulo' => 'Hello World'));
        $this->render('index');     
    }    
}
