<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Student.php";

    $app = new Silex\Application();
    $app['debug'] = true;

    $DB = new PDO('pgsql:host=localhost;dbname=registrar');

    $app->register(new Silex\Provider\TwigServiceProvider(), array (
    'twig.path' => __DIR__."/../views"
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.twig');
    });

    $app->post("/add_student", function() use ($app) {
        $student_name = $_POST['student_name'];
        $student_date = $_POST['date'];
        $student = new Student($student_name, $student_date);
        $student->save();
        return $app['twig']->render('index.twig');
    });

    $app->post("/students", function() use ($app) {
        $students = Student::getAll();
        return $app['twig']->render('students.twig', array('students' => $students));
    });

    $app->post("/delete_students", function() use ($app) {
        $students = Student::deleteAll();
        return $app['twig']->render('students.twig', array('students' => Student::getAll()));
    });

    return $app;





?>
