<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use nestedclass\Class2;
use nestedclass\nestedinnestedclass\Class3;

$loader = new FilesystemLoader(__DIR__ . '/../src/templates');
$view = new Environment($loader);
$log = new Logger('logger1');
$log->pushHandler(new StreamHandler(__DIR__ . '/../src/index.log'));

$class1= new Class1();
$class2 = new Class2();
$class3 = new Class3();
echo $view->render('index.twig', ['class1' => $class1->use_class1(), 'class2' => $class2->use_class2(), 'class3' => $class3->use_class3()]);
$log->info('script worked');
