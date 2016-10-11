<?php

    class Employee
    {
        var $name;
        function __set($propName, $propValue)
        {
            $this->$propName = $propValue;
        }
    }

	$employee = new Employee ();
    $employee->name = "Mario";
    $employee->title = "Executive Chef";
    echo "Name: ".$employee->name;
    echo "<br />";
    echo "Title: ".$employee->title;

?>