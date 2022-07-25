<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
  class Subscription {
    public $tier;
    public $description;
    public $price;

    // Setters
    function setTier($tier){
      $this->tier = $tier;
    }

    function setDescription($description){
      $this->description = $description;
    }

    function setPrice($price){
      $this->price = $price;
    }

    // Getters
    function getTier(){
      return $this->tier;
    }

    function getDescription(){
      return $this->description;
    }

    function getPrice(){
      return $this->price;
    }
  }
  //Setting the names, descriptions, and prices
  $red = new Subscription();
  $red->setTier('Red');
  $red->setDescription(
    '<p>Access to the Main Gym</p>
    <p>Fitness Test with our personal trainer</p>
    <p>Gym shirt and shorts</p>'
  );
  $red->setPrice('$5.99');

  $white = new Subscription();
  $white->setTier('White');
  $white->setDescription(
    '<p>Everything from Red Tier</p>
    <p>Access to the Crossfit Gym</p>
    <p>Unlimited Fitness classes</p>'
  );
  $white->setPrice('$7.99');

  $blue = new Subscription();
  $blue->setTier('Blue');
  $blue->setDescription(
    '<p>Everything from White Tier</p>
    <p>Access to the Beach Gym</p>
    <p>Bottemless protien shakes</p>'
  );
  $blue->setPrice('$15.99');

  // Arrays for the names, descriptions, and prices
  $tierArr = array(
    $red->getTier(),
    $white->getTier(),
    $blue->getTier()
  );

  $descriptionArr = array(
    $red->getDescription(),
    $white->getDescription(),
    $blue->getDescription()
  );

  $priceArr = array(
    $red->getPrice(),
    $white-> getPrice(),
    $blue->getPrice()
  );
?>
