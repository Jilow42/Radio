<?php //src/Template/Emissions/index.ctp?>

<h1>Emissions de la base</h1>
<p>
  Il y a : <?= $all->count();?> emission<?php if($all->count() > 1 ) echo "s"; ?> sur la base.
</p>

<ul>
  <?php foreach ($all as $unEmission) {?>
    <li>
      <?= $this->Html->link($unEmission->name, [
        'controller' => 'Emissions',
        'action' => 'view',
        $unEmission->id
        ]) ?>
    </li>
  <?php } ?>
</ul>
