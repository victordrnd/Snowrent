# site de réservation de chalet PPE Victor et Leo

### Contraintes:

- Utilisation de Bootstrap
- site en PHP
- Autour d'une base de donnée Mysql


### Le projet

Le site concerne la réservation de chalet ainsi que le mise à disposition de chalet pour la location, en quelque sorte une plateforme de mise en relation.

### Documentation
  - **Classe Chalet**
```
  $chalet = new Chalet;
```

| Fonction                                                               | Type de retour | Description                                                |
|------------------------------------------------------------------------|----------------|------------------------------------------------------------|
| proposer($nom, $surface, $adresse, $zip, $ville, $catcode, $proprioid) | boolean        | Ajoute le chalet dans la base de donnée                    |
| upload($image, $id)                                                    | string         | Upload l'image du chalet sur le serveur                    |
| details($chaletid)                                                     | array          | Récupère les informations d'un chalet identifié par son id |
| meschalets($proprioid)                                                 | array          | Récupère la liste des chalets d'une personne               |


## To Do list

 -
