<?php

// Create new Corporate_Drone object
$drone1 = new Corporate_Drone();
// Set the $drone1 employeeid member
$drone1->setEmployeeID("12345");
// Clone the $drone1 object
$drone2 = clone $drone1;
// Set the $drone2 employeeid member
$drone2->setEmployeeID("67890");
// Output the $drone1 and $drone2 employeeid members
printf("drone1 employeeID: %d <br />", $drone1->getEmployeeID());
printf("drone2 employeeID: %d <br />", $drone2->getEmployeeID());
printf("drone2 tie color: %s <br />", $drone2->getTieColor());

?>