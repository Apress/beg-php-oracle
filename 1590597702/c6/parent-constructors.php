<?php

    class Employee
    {
        protected $name;
        protected $title;
        function __construct()
        {
            echo "<p>Staff constructor called!</p>";
        }
    }

    class Manager extends Employee
    {
        function __construct()
        {
            parent::__construct();
            echo "<p>Manager constructor called!</p>";
        }
    }

	$employee = new Manager();

	?>