<?php
function retrieveUserProfile()
{
$user[] = "Jason";
$user[] = "jason@example.com";
$user[] = "English";
return $user;
}
list($name, $email, $language) = retrieveUserProfile();
echo "Name: $name, email: $email, language: $language";
?>