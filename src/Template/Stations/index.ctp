<?php //src/Template/Stations/index.ctp ?>

<h1>Stations de la base</h1>
<p>
  Il y a : <?= $all->count();?> station<?php if($all->count() > 1 ) echo "s"; ?> sur la base.
</p>

<ul>
  <?php foreach ($all as $unStation) {?>
    <li>
      <?= $this->Html->link($unStation->name.' - '.$unStation->frequence, [
        'controller' => 'Stations',
        'action' => 'view',
        $unStation->id
        ]) ?>
    </li>
  <?php } ?>
</ul>
