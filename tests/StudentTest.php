<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Student.php";

    $DB = new PDO('pgsql:host=localhost;dbname=registrar_test');


    class StudentTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Student::deleteAll();
        // }
        //

        function test_getName()
        {
            //Arrange
            $name = "Jimmy";
            $date = "3-14-2010";
            $new_student = new Student($name, $date);

            //Act
            $result = $new_student->getName();

            //Assert
            $this->assertEquals("Jimmy", $result);
        }
    }



?>
