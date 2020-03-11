<?php //src/Model/Table/Emission.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Emission extends Entity{
  //permet de dire qu'on peut modifier toutes les colonnes sauf l'id
  protected $_accessible = [
    '*' => true,
    'id' => false
  ];
}
