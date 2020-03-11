<?php //src/Model/Table/StationsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class StationsTable extends Table{

  public function initialize(array $config)  {

    $this->addBehavior('Timestamp');

    $this->hasMany('Emissions', ['foreignKey' => 'radio _id']);
  }

  public function validationDefault(Validator $v) {
    $v->notEmpty('name')
      ->maxLength('name', 50)->notEmpty('frequence');
    return $v;
  }
}
