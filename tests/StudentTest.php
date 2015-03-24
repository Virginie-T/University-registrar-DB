<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Student.php";

    $DB = new PDO('pgsql:host=localhost;dbname=registrar_test');


    class StudentTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Student::deleteAll();
        }


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

        function test_setName()
        {
            //Arrange
            $name = "Timmy";
            $date = "2-13-2011";
            $new_student = new Student($name, $date);
            $new_name = "Jimmy";

            //Act
            $new_student->setName($new_name);
            $result = $new_student->getName();

            //Assert
            $this->assertEquals("Jimmy", $result);

        }

        function test_getDate()
        {
            //arrange
            $name = "Jimmy";
            $date = "3-14-2010";
            $new_student = new Student($name, $date);

            //act
            $result = $new_student->getDate();

            //assert
            $this->assertEquals("3-14-2010", $result);

        }

        function test_setDate()
        {
            //arrange
            $name = "Conor";
            $date = "3-14-2010";
            $new_student = new Student($name, $date);

            //act
            $new_student->setDate("14-3-2010");
            $result = $new_student->getDate();

            //assert
            $this->assertEquals("14-3-2010", $result);
        }

        function test_getId()
        {
            $name = "Jimmy";
            $date = "3-14-2010";
            $id = 4;
            $new_student = new Student($name, $date, $id);

            $result = $new_student->getId();

            $this->assertEquals($result, 4);
        }

        function test_setId()
        {
            $name = "Gimmy";
            $date = "3-14-2010";
            $id = 2;
            $new_student = new Student($name, $date, $id);

            $new_student->setId(4);
            $result = $new_student->getId();

            $this->assertEquals(4, $result);
        }

        function test_save()
        {
            //arrange
            $name = "Jimmy";
            $date = "30-3-2011";
            $new_student = new Student($name, $date);
            $new_student->save();

            //act
            $result = Student::getAll();

            $this->assertEquals($new_student, $result[0]);
        }

        function test_deleteAll()
        {
            $new_student = new Student("Timmy", "30-42-32");
            $new_student->save();
            $new_student2 = new Student("Jimmy", "434-43-21");
            $new_student2->save();

            Student::deleteAll();

            $result = Student::getAll();

            $this->assertEquals([], $result);

        }


    }



?>
