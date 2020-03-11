<?php //src/Controller/EmissionsController.php

namespace App\Controller;

class EmissionsController extends AppController {

  public function index() {

    $all = $this->Emissions->find();

    //on transmet les données à la vue
    $this->set(compact('all'));
  }
  public function view($id){

    $one = $this->Emissions->find()->contain(['Stations'])->where(['Emissions.id'=> $id]);

      //si aucun élément trouvé
      if ($one->isEmpty()) {
        $this->Flash->error('Emission introuvable');
        return $this->redirect(['action' => 'index']);
      }
    //on transmet les données à la vue
    $this->set('emission', $one->first());
  }
  public function add() {
    //si on a reçu un formulaire
    if ($this->request->is('post')) {
      // on crée une entité vide pour un station
      $new = $this->Emissions->newEntity();
      //on récupère le contenu pour le mettre dans l'entité
      $new = $this->Emissions->patchEntity($new, $this->request->getData());
      //si on arrive à sauvegarder
      if ($this->Emissions->save($new)){
        //confirmation
        $this->Flash->success('Emissions créé');
        //redirection vers la fiche de l'station crée
      }else
        //sinon erreur
        $this->Flash->error('Création impossible');

      return $this->redirect([
        'controller' => 'Stations',
        'action' => 'view',
       ]);

    }//fin test form
    return $this->redirect([
      'controller' => 'Stations',
      'action' => 'index'
    ]);
  }
  public function delete($id) {
    // on autorise seulement 2 méthode de navigation (pr éviter les suivis de lien intempestif)
    $this->request->allowMethod(['post','delete']);
    //on récupère l'élément que l'on souhaite supr
    $supp = $this->Emissions->get($id);
    //si la supr ok
    if ($this->Emissions->delete($supp)) {
      //msg confirmation
      $this->Flash->success('Ok');
    }else {
      //msg echec
      $this->Flash->error('Nope');
    }
    //redirection index
    return $this->redirect(['action' => 'index']);
  }
}
