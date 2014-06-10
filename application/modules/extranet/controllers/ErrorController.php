<?php
class Extranet_ErrorController extends Core_Controller
{
    public function errorAction()
    {
        $errors = $this->_getParam('error_handler');
        
        switch ($errors->type) {
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ROUTE:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
        
                // 404 error -- controller or action not found
                $this->getResponse()->setHttpResponseCode(404);
                $this->view->code = '404';
                break;
            default:
                // application error
                $this->getResponse()->setHttpResponseCode(500);
                $this->view->code = '500';
                break;
        }
        $params              =      $this->_request->GetParams();
        unset($params['error_handler']);
        
        $txt                .=       "\n".'----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------'."\n";
        $txt                .=       $_SERVER['REMOTE_ADDR'].' / '.  gethostbyaddr($_SERVER['REMOTE_ADDR']).' / '.date("Y-m-d H:i:s"); 
        $txt                .=       "\n"."\n".print_r($params,1);
        $txt                .=       "\n".$errors->exception->getMessage();
        $txt                .=       "\n"."\n".$errors->exception->getTraceAsString();
        $txt                .=       "\n".'----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------'."\n";
      
        echo $txt;        
    }
    public function getLog()
    {
        $bootstrap = $this->getInvokeArg('bootstrap');
        if (!$bootstrap->hasPluginResource('Log')) {
            return false;
        }
        $log = $bootstrap->getResource('Log');
        return $log;
    }

}
