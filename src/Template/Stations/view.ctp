<?php //src/Template/Stations/view.ctp
var_dump($station);
?>


<h1><?= $station->name.' - '.$station->frequence ?></h1>

<p>Fiche crée le : <?= $station->created->i18nformat('dd/MM/yyyy HH:mm:ss') ?></p>
<p>Dernière modification : <?= $station->modified->i18nformat('dd/MM/yyyy HH:mm:ss') ?></p>

<h2>Ses emissions</h2>

<?php
if (empty($station->emissons)) {
  echo "<p>Il n'y a aucun emission actuellement. Vous pouvez en ajouter un.</p>";
}else {
  echo "<ul>";
  foreach ($station->emissions as $unEmission) {
    echo "<li>".$this->Html->link(
      $unEmission->title,[
        'controller' => 'Emissions',
        'action' => 'view',
        $unEmission->id
      ])."</li>";
  }echo "</ul>";
}

echo $this->Form->create($emissionVide , ['url' =>'/Emissions/add']);
  echo $this->Form->hidden('radio_id', ['value' => $station->id]);
  echo $this->Form->control('name', ['label' => 'Nom']);
  echo $this->Form->control('day', ['label' => 'Jour d\'emissions']);
  echo $this->Form->control('hour', ['label' => 'Heur d\'emissions']);

  echo $this->Form->button('Ajouter');
echo $this->Form->end();
?>

<p>
  <?= $this->Html->link('Retour à la liste des stations', ['action' => 'index']) ?>
</p>
