<?php //src/Controller/StationsController.php

namespace App\Controller;

class StationsController extends AppController {

  public function index() {

    $all = $this->Stations->find();

    //on transmet les données à la vue
    $this->set(compact('all'));
  }

  public function view($id){

    $one = $this->Stations->find()->contain(['Emissions'])->where(['id'=> $id]);

      //si aucun élément trouvé
      if ($one->isEmpty()) {
        $this->Flash->error('Station introuvable');
        return $this->redirect(['action' => 'index']);
      }
    //on transmet les données à la vue
    $this->set('station', $one->first());


    $emissionVide = $this->Stations->Emissions->newEntity();
    $this->set(compact('emissionVide'));
  }
  public function add() {
    // on crée une entité vide pour un station
    $new = $this->Stations->newEntity();

    //si on a reçu un formulaire
    if ($this->request->is('post')) {
      //on récupère le contenu pour le mettre dans l'entité
      $new = $this->Stations->patchEntity($new, $this->request->getData());
      //si on arrive à sauvegarder
      if ($res = $this->Stations->save($new))
        //confirmation
        $this->Flash->success('Station créé');
        //redirection vers la fiche de l'station crée
        return $this->redirect([
          'controller' => 'Stations',
          'action' => 'view',
          $res->id
        ]);
      //sinon erreur
      $this->Flash->error('Création impossible');
    }//fin test form

    //on transmet les données à la vue
    $this->set(compact('new'));
  }

}
