<?php
    switch($category) {
    case "news":
        echo "<p>What's happening around the world</p>";
        break;
    case "weather":
        echo "<p>Your weekly forecast</p>";
        break;
    case "sports":
        echo "<p>Latest sports highlights</p>";
        break;
    default:
        echo "<p>Welcome to my Web site</p>";
}
?>