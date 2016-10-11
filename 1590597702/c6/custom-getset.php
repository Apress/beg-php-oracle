<?php
    class Employee
    {
        private $name;
        
		// Getter
        public function getName() {
            return $this->name;
        }

		// Setter
        public function setName($name) {
            $this->name = $name;
        }
    }
?>