<?php //src/Template/Emissions/view.ctp ?>

<h1><?= $emission->name ?></h1>

<p>Station : <?= $this->Html->link($emission->station->name, [
  'controller' => 'Stations',
  'action' => 'view',
  $emission->station_id
  ]) ?></p>

  <p> Jour de l'emission :
    <?= $emission->day->i18nFormat('dd/MM/yyyy')?>
  </p>

<p> Heur de l'emission :
  <?= $emission->hour->i18nFormat('HH:mm:ss')?>
</p>

<p>Fiche crée le : <?= $emission->created->i18nformat('dd/MM/yyyy HH:mm:ss') ?></p>
<p>Dernière modification : <?= $emission->modified->i18nformat('dd/MM/yyyy HH:mm:ss') ?></p>

<p>
  <?= $this->Html->link('Retour à la liste des emissions', [
    'controller' => 'Emissions',
    'action' => 'index'
    ]) ?>
</p>

<?= $this->Form->postLink(
  'Supprimer',
  ['action' => 'delete', $emission->id],
  ['confirm' => 'Êtes-vous sur de voulir supprimer cette emission ?']
);?>
