<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

    require_once "src/Course.php";

    $DB = new PDO('pgsql:host=localhost;dbname=registrar_test');

    class CoursesTest extends PHPUnit_Framework_TestCase
    {

        function test_getName()
        {
            //arrange
            $name = "Basket weaving";
            $level = 100;
            $new_course = new Course($name, $level);

            $result = $new_course->getName();

            $this->assertEquals("Basket weaving", $result);
        }

        function test_setName()
        {
            $name="Communication";
            $level = 453;
            $new_course = new Course($name, $level);
            $new_name = "Pizza";

            $new_course->setName($new_name);
            $result = $new_course->getName();

            $this->assertEquals($result, "Pizza");
        }

        function test_getLevel()
        {
            //arrange
            $name = "Jimmy";
            $level = 300;
            $new_course = new Course($name, $level);

            //act
            $result = $new_course->getLevel();

            //assert
            $this->assertEquals(300, $result);

        }

        function test_setLevel()
        {
            //arrange
            $name = "Conor";
            $level = 100;
            $new_course = new Course($name, $level);

            //act
            $new_course->setLevel(200);
            $result = $new_course->getLevel();

            //assert
            $this->assertEquals(200, $result);
        }

        function test_getId()
        {
            $name = "Jimmy";
            $level = 400;
            $id = 4;
            $new_course = new Course($name, $level, $id);

            $result = $new_course->getId();

            $this->assertEquals($result, 4);
        }

        function test_setId()
        {
            $name = "Gimmy";
            $level = 3029;
            $id = 2;
            $new_course = new Course($name, $level, $id);

            $new_course->setId(4);
            $result = $new_course->getId();

            $this->assertEquals(4, $result);
        }

        function test_save()
        {
            //arrange
            $name = "Jimmy";
            $level = 432;
            $new_course = new Course($name, $level);
            $new_course->save();

            //act
            $result = Course::getAll();

            $this->assertEquals($new_course, $result[0]);
        }

        function test_deleteAll()
        {
            $new_course = new Course("Timmy", 432);
            $new_course->save();
            $new_course2 = new Course("Jimmy", 432);
            $new_course2->save();

            Course::deleteAll();

            $result = Course::getAll();

            $this->assertEquals([], $result);
        }





    }

?>
