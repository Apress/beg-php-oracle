<?php
class Corporate_Drone {
private $employeeid;
private $tiecolor;
// Define a setter and getter for $employeeid
function setEmployeeID($employeeid) {
$this->employeeid = $employeeid;
}
function getEmployeeID() {
return $this->employeeid;
}

// Define a setter and getter for $tiecolor
function setTieColor($tiecolor) {
$this->tiecolor = $tiecolor;
}
function getTieColor() {
return $this->tiecolor;
}
}
// Create new Corporate_Drone object
$drone1 = new Corporate_Drone();
// Set the $drone1 employeeid member
$drone1->setEmployeeID("12345");
// Set the $drone1 tiecolor member
$drone1->setTieColor("red");
// Clone the $drone1 object
$drone2 = clone $drone1;
// Set the $drone2 employeeid member
$drone2->setEmployeeID("67890");
// Output the $drone1 and $drone2 employeeid members
printf("drone1 employeeID: %d <br />", $drone1->getEmployeeID());
printf("drone1 tie color: %s <br />", $drone1->getTieColor());
printf("drone2 employeeID: %d <br />", $drone2->getEmployeeID());
printf("drone2 tie color: %s <br />", $drone2->getTieColor());
?>