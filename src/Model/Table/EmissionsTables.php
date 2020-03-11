<?php //src/Model/Table/EmissionsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class EmissionsTable extends Table{

  public function initialize(array $config)  {

    $this->addBehavior('Timestamp');

    $this->belongsTo('Emissions', ['foreignKey' => 'radio_id','joinType' => 'left']);
  }
  public function validationDefault(Validator $v) {
    $v->notEmpty('name')
      ->maxLength('name', 150)
      ->notEmpty('day')->notEmpty('hour');
    return $v;
  }
}
