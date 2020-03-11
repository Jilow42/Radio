<?php //src/Template/Stations/app.ctp ?>

<h1>Ajouter un nouvel station</h1>

<?= $this->Form->create($new) ?>
  <?= $this->Form->control('name', ['label' => 'Nom'])?>
  <?= $this->Form->control('frequence', ['label' => 'Fréquence '])?>
  <?= $this->Form->button('Ajouter')?>
<?= $this->Form->end() ?>
