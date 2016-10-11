<?php

    class Visitors
    {
        public function greetVisitor()
        {
            echo "Hello<br />";
        }

        function sayGoodbye()
        {
            echo "Goodbye<br />";
        }
    }

	Visitors::greetVisitor();
    $visitor = new Visitors();
    $visitor->sayGoodbye();
	
?>