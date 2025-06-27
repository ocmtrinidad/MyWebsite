<?php

// classes
class User
{
  // private means data cannot be accessed outside the class. Use getters and setters to access.
  private $name;
  private $email;

  // __construct() is a built in function that allows user to store data in class.
  // Params are what you send when instantiating new User().
  public function __construct($name, $email)
  {
    // $this is the class itself.
    $this->name = $name;
    $this->email = $email;
  } // No semi-colon

  public function login()
  {
    echo $this->name . " logged in.";
  }

  // Getters
  public function getName()
  {
    return $this->name;
  }

  // Setters
  public function setName($name)
  {
    // Checks if $name is a string of atleast 2 characters.
    if (is_string($name) && strlen($name) > 1) {
      $this->name = $name;
      return "Name has been updated to $name.";
    } else {
      return "Not a valid name.";
    };
  }
};

$userOne = new User("userOne", "userOne@email.com");
echo $userOne->getName();
echo $userOne->setName("Thor");
