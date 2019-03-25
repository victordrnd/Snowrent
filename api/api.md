

### Class: Chalet

> Classe qui permet de modifier et d'obtenir des informations depuis la table Chalet

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>delete(</strong><em>string</em> <strong>$chaletid</strong>)</strong> : <em>boolean $response</em><br /><em>Supprime un chalet</em> |
| public | <strong>details(</strong><em>string</em> <strong>$chaletid</strong>)</strong> : <em>array $chaletinfo</em><br /><em>Permet d'obtenir des informations sur un chalet en particulier</em> |
| public | <strong>edit(</strong><em>string</em> <strong>$chaletid</strong>, <em>string</em> <strong>$chaletnom</strong>, <em>string</em> <strong>$chaletville</strong>, <em>string</em> <strong>$chaletadresse</strong>, <em>string</em> <strong>$chaletzip</strong>, <em>string</em> <strong>$chaletdescription</strong>)</strong> : <em>void</em><br /><em>Edite un chalet en particulier</em> |
| public | <strong>getProprietaire(</strong><em>mixed</em> <strong>$chaletid</strong>)</strong> : <em>array $proprioinfo</em><br /><em>Retourne les informations sur le propriétaire d'un chalet</em> |
| public | <strong>meschalets(</strong><em>string</em> <strong>$proprioid</strong>)</strong> : <em>array $list</em><br /><em>Retourne tout les chalets d'un propriétaire</em> |
| public | <strong>proposer(</strong><em>string</em> <strong>$nom</strong>, <em>int</em> <strong>$surface</strong>, <em>string</em> <strong>$adresse</strong>, <em>int</em> <strong>$zip</strong>, <em>string</em> <strong>$ville</strong>, <em>string</em> <strong>$catcode</strong>, <em>string</em> <strong>$proprioid</strong>)</strong> : <em>void</em><br /><em>Permet l'ajout d'un chalet à la base de donnée</em> |
| public | <strong>secureDetails(</strong><em>string</em> <strong>$chaletid</strong>, <em>string</em> <strong>$proprioid</strong>)</strong> : <em>array $chaletinfo</em><br /><em>Permet d'obtenir des informations sur un chalet en particulier et vérifie s'il appartient bien à un propriétaire</em> |
| public | <strong>selectAll()</strong> : <em>array $list</em><br /><em>Retourne tout les chalets de la table</em> |
| public | <strong>setDescription(</strong><em>string</em> <strong>$chaletid</strong>, <em>string</em> <strong>$description</strong>)</strong> : <em>void</em><br /><em>Change la description d'un chalet</em> |
| public | <strong>upload(</strong><em>\resource</em> <strong>$image</strong>, <em>string</em> <strong>$id</strong>)</strong> : <em>void</em><br /><em>Change l'image d'un chalet spécifique</em> |


### Class: Database

> Classe qui permet de se connecter à la base de donnée

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public static | <strong>connect()</strong> : <em>void</em> |
| public static | <strong>disconnect()</strong> : <em>void</em><br /><em>Permet de détruire l'objet self::$pdo</em> |




### Class: Crud

> Classe qui permet la lecture et l'écriture dans la base de donnée

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>delete(</strong><em>string</em> <strong>$table</strong>, <em>string</em> <strong>$where=null</strong>)</strong> : <em>void</em><br /><em>Permet de supprimer des données dans la base de données</em> |
| public | <strong>insert(</strong><em>string</em> <strong>$table</strong>, <em>string</em> <strong>$value</strong>, <em>array</em> <strong>$row=null</strong>)</strong> : <em>void</em><br /><em>Permet d'insérer des données dans la base de données</em> |
| public | <strong>query(</strong><em>string</em> <strong>$requete</strong>)</strong> : <em>array</em><br /><em>Permet d'exécuter la requête</em> |
| public | <strong>select(</strong><em>string</em> <strong>$table</strong>, <em>string</em> <strong>$row=`'*'`</strong>, <em>string</em> <strong>$where=null</strong>, <em>string</em> <strong>$order=null</strong>, <em>string</em> <strong>$groupby=null</strong>)</strong> : <em>array</em><br /><em>Permet de sélectionner des données dans la base de données</em> |
| public | <strong>update(</strong><em>string</em> <strong>$table</strong>, <em>array</em> <strong>$rows</strong>, <em>string</em> <strong>$where</strong>)</strong> : <em>void</em><br /><em>Permet de modifier des données dans la base de données</em> |

*This class extends \Database*

### Class: Mail

> Classe qui permet l'envoi de mails

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>inscription(</strong><em>string</em> <strong>$id</strong>, <em>string</em> <strong>$mail</strong>, <em>string</em> <strong>$nom</strong>)</strong> : <em>void</em><br /><em>Permet d'envoyer un mail à un nouvel inscrit</em> |

*This class extends \PHPMailer\PHPMailer\PHPMailer*
