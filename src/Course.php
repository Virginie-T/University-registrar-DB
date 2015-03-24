<?php

    class Course
    {
        private $name;
        private $level;
        private $id;

        function __construct($name, $level, $id = null)
        {
            $this->name = $name;
            $this->level = $level;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getLevel()
        {
            return $this->level;
        }

        function setLevel($new_level)
        {
            $this->level = (string) $new_level;
        }

        function getId()
        {
            return $this->id;
        }

        function setId ($new_id)
        {
            $this->id = (int) $new_id;
        }

        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO courses (name_course, level_course) VALUES ('{$this->getName()}', {$this->getLevel()}) RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM courses *;");
        }

        static function getAll()
        {
            $returned_courses = $GLOBALS['DB']->query("SELECT * FROM courses;");
            $courses = array();
            foreach($returned_courses as $course) {
                $name = $course['name_course'];
                $level = $course['level_course'];
                $id = $course['id'];
                $new_course = new Course($name, $level, $id);
                array_push($courses, $new_course);
            }
            return $courses;
        }




    }

?>
