<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
//   public function _initDoctrine()
//    {
//        //require the Doctrine.php file
//        require_once 'Doctrine.php';
//
//        //Get a Zend Autoloader instance
//        $loader = Zend_Loader_Autoloader::getInstance();
//
//        //Autoload all the Doctrine files
//        $loader->pushAutoloader(array('Doctrine', 'autoload'));
//
//        //Get the Doctrine settings from application.ini
//        $doctrineConfig = $this->getOption('doctrine');
////      var_dump($doctrineConfig);
//        //Get a Doctrine Manager instance so we can set some settings
//        $manager = Doctrine_Manager::getInstance();
//
//        //set models to be autoloaded and not included (Doctrine_Core::MODEL_LOADING_AGGRESSIVE)
//        $manager->setAttribute(
//                Doctrine::ATTR_MODEL_LOADING, Doctrine::MODEL_LOADING_AGGRESSIVE);
//
//        //enable ModelTable classes to be loaded automatically
//        $manager->setAttribute(
//                Doctrine_Core::ATTR_AUTOLOAD_TABLE_CLASSES, true
//        );
//
//        //enable validation on save()
//        $manager->setAttribute(
//                Doctrine_Core::ATTR_VALIDATE, Doctrine_Core::VALIDATE_ALL
//        );
//
//        //enable sql callbacks to make SoftDelete and other behaviours work transparently
//        $manager->setAttribute(
//                Doctrine_Core::ATTR_USE_DQL_CALLBACKS, true
//        );
//
//        //not entirely sure what this does :)
//        $manager->setAttribute(
//                Doctrine_Core::ATTR_AUTO_ACCESSOR_OVERRIDE, true
//        );
//
//        //enable automatic queries resource freeing
//        $manager->setAttribute(
//                Doctrine_Core::ATTR_AUTO_FREE_QUERY_OBJECTS, true
//        );
//
//
//
//       // connect to database
//        $manager->openConnection($doctrineConfig['dsn'], 'db');
//       /*Doctrine::generateModelsFromDb(
//                        'application/models/Db', array('db'), 
//                    array(
//                            'pearStyle' => true,
//                            'generateTableClasses' => true,
//                            'baseClassesDirectory' => '',
//                            'classPrefix' => 'Model_Db_',
//                            'classPrefixFiles' => false,
//                            'baseClassPrefix' => 'Base_'
//                        )
//            );
//        
//        Doctrine_Core::generateModelsFromDb(
//                '../control_escolar/application/models/Doctrine', array('control_escolar'), 
//                array('generateTableClasses' => true)
//        );
//        //Carga las clases de Doctrine en models/Doctrine
//        
//        spl_autoload_register(array('Doctrine_Core', 'modelsAutoload'));
//        
//        Doctrine_Core::loadModels('../application/models/Db');
//        
//
//        //set to utf8
//        $manager->connection()->setCharset('utf8');
//
//        //Conexion a MSSQL
//        //
//         //@deprecated estos datos se van a accesar desde mysql. Clientes. 
//         //
//        $dsn = 'mssql:dbname=control_escolar;host=localhost';
//        $user = 'root';
//        $password = '';
//        //nombramos a esta conexion como 'gamssql'
//        $conn = $manager->openConnection(array($dsn, $user, $password), 'gamssql');
//        var_dump($conn);*/
//        return $manager;
//    }

    protected function _initAutoload()
    {
        // Add autoloader empty namespace
        $autoLoader = Zend_Loader_Autoloader::getInstance();
        $resourceLoader = new Zend_Loader_Autoloader_Resource(array(
                    'basePath' => APPLICATION_PATH,
                    'namespace' => '',
                    'resourceTypes' => array(
                        'model' => array(
                            'path' => 'models/',
                            'namespace' => 'Model_'
                        ),
                        'dbmssql' => array(
                            'path' => APPLICATION_PATH . 'models/DbMssql/',
                            'namespace' => 'DbMssql_'
                        ),
                        'doctrine' => array(
                            'path' => APPLICATION_PATH . 'models/Db/',
                            'namespace' => 'Db_'
                        ),
                        'doctrine_base' => array(
                            'path' => APPLICATION_PATH . 'models/Db/Base/',
                            'namespace' => 'Base_'
                        ),
                        'genericos' => array(
                            'path' => 'models/Genericos/',
                            'namespace' => 'Genericos_'
                        )
                    ),
                ));
        // Return it so that it can be stored by the bootstrap
       // return $autoLoader;
    }
    
    public function _initActionHelper()
    {
         Zend_Controller_Action_HelperBroker::addPath(
                        APPLICATION_PATH .'/controllers/helpers');

         
    }

}

