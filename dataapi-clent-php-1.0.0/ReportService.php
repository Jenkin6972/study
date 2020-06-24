<?php
/**
*   class ReportService, provide query and getstatus methods of report service
*   @author Baidu Holmes
*/
require_once('DataApiConnection.class.php');

class ReportService
{
    public function query($ucid, $st, $parameterJSON)
    {
        print("----------------------query----------------------\r\n");
        $apiConnection = new DataApiConnection();
        $apiConnection->init(API_URL, $ucid);

        $apiConnectionData = array(
            'header' => array(
                'username' => USERNAME,
                'password' => $st,
                'token' => TOKEN,
                'account_type' => ACCOUNT_TYPE,
                ),
            'body' => array(
                'serviceName' => 'report',
                'methodName' => 'query',
                'parameterJSON' => $parameterJSON,
                ),
            );
        $apiConnection->POST($apiConnectionData);
        return array('retHead' => $apiConnection->retHead, 'retBody' => $apiConnection->retBody);
        
    }

    public function getstatus($ucid, $st, $parameterJSON)
    {
        print("----------------------getstatus----------------------\r\n");
        $apiConnection = new DataApiConnection();
        $apiConnection->init(API_URL, $ucid); 

        $apiConnectionData = array(
            'header' => array(
                'username' => USERNAME,
                'password' => $st, 
                'token' => TOKEN,
                'account_type' => ACCOUNT_TYPE,
                ),      
            'body' => array(
                'serviceName' => 'report',
                'methodName' => 'getstatus',
                'parameterJSON' => $parameterJSON,
                ),      
            );      
        $apiConnection->POST($apiConnectionData);
        return array('retHead' => $apiConnection->retHead, 'retBody' => $apiConnection->retBody);
    }
}
