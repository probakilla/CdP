# Sprint 2

## User Stories

| Id    | Description | Priorité | Difficulté |
| :---: | :---------- | :------: | :--------: |
| #1  | En tant que visiteur, je souhaite m'enregistrer en tant que développeur via un formulaire (nom d'utilisateur et mot de passe) afin de gérer mes projets | Moyenne | 3 |
| #2  | En tant que visiteur, je souhaite m'authentifier en tant que développeur via un formulaire (nom d'utilisateur et mot de passe) | Moyenne | 2 |
| #4  | En tant que développeur, je souhaite ajouter des collaborateurs (autres développeurs possédant des droits similaires aux miens) afin qu'ils puissent accéder à mon projet | Moyenne | 2 |
| #5  | En tant que développeur, je souhaite avoir accès à la liste des projets que j'ai créé et dont je suis collaborateur | Haute | 2 |
| #6  | En tant que développeur, je souhaite supprimer un projet de la liste de ceux dans lesquels je suis impliqué ; plus précisément, si d'autres développeurs sont présents sur le projet, j'en serai retiré des collaborateurs, et si j'en suis l'unique collaborateur, le projet sera définitivement supprimé. | Haute | 2 |
| #7  | En tant que développeur, je souhaite ajouter une User Story (Id, Description, Priorité (optionnelle, peut être renseignée plus tard), Difficulté) à mon backlog afin de décrire un besoin | Haute | 3 |
| #8  | En tant que développeur, je souhaite consulter le backlog du projet afin de potentiellement en modifier les User Stories | Haute | 2 |
| #9  | En tant que développeur, je souhaite modifier le contenu d'une User Story via un formulaire (Id, Description, Priorité (optionnelle), Difficulté) où les champs auront la valeur de l'User Story actuelle | Haute | 3 |
| #10  | En tant que développeur, je souhaite supprimer une User Story du backlog | Haute | 2 |

## Tâches

| Id    | Description | User Stories | Temps (en jh) | Développeur | Statut |
| :---: | :---------- | :----------: | :-----------: | :---------: | :----: |
| #1   | Test : Rédaction du scénario pour vérifier que l'affichage de la liste des projets est correct, tout les projets présents dans la base de données, dans la table *Project* doivent être correctement affichés sur la page *Projects.php* | 5 | 0.1 | Chemoune | DONE |
| #2   | Test : Implémentation de la vérification de l'affichage de la liste des projets | 5 | 0.2 | Chemoune | DONE |
| #3   | Test : Rédaction du scénario de vérification de l'affichage du backlog d'un projet, les données présentent dans la table *UserStory* associées au projet voulu doivent apparaître correctement sur la page *Backlog.php* | 6 | 0.1 | Chemoune | DONE |
| #4   | Test : Implémentation de la vérification de l'affichage du backlog d'un projet | 6 | 0.2 | Chemoune | DONE |
| #5   | Test : Rédaction du scénario d'ajout d'une *User Story* à la base de données, les éléments entrés dans les champs de la page *AddUserStory.php* doivent être ajoutés dans la table *UserStory* avec les bonnes valeurs | 7 | 0.1 | Chemoune | DOING |
| #6   | Test : Implémentation du test d'ajout d'une User Story à la base de données | 7 | 0.3 | Chemoune | DOING |
| #7   | Test : Rédaction du scénario de la modification d'une User Story via la page *EditUserStory.php*. Les éléments entrés dans le formulaire doivent être correctement modifiés dans la base de données | 9 | 0.1 | Chemoune | DOING |
| #8   | Test : Implémentation du test de la modification d'une User Story | 9 | 0.3 | Chemoune | DOING |
| #9   | Test : Rédaction du scénario de la suppression d'une User Story du backlog. L'User Story doit être correctement enlevée de la base de données | 10 | 0.1 | Pilleux | DONE |
| #10  | Test : Implémentation du test de la suppression d'une User Story du backlog | 10 | 0.2 | Pilleux | DONE |
| #11  | Ajout d'un fichier *Database.php* pour la gestion des transactions avec la base de données. Le fichier doit contenir une classe php *Database* implémentant les méthodes d'accès à la base (CRUD) *insert*, *select*, *update*, *delete* | tous | 1.5 | Pilleux | DONE |
| #12  | Refactoring du code existant pour utiliser la classe *Database* lors des interactions avec la base de données | tous | 0.1 | Pilleux | DONE |
| #13  | Refactoring du code existant pour retirer la duplication de code. Créaction d'un fichier *Utils.php* contenant une classe php *CdPError* contenant des méthodes statiques pour factoriser du code. Les méthodes implémentées seront *redirectTo(\$location)*, qui redirige *fail(\$message, \$location)* qui affiche un message d'ereur puis redirige, *testInput(\$input)* qui test l'input de l'utilisateur dans un champ de formulaire, *checkURIParams(\$listParams)* qui verrifie si l'URL de la page courante contient la liste des paramètres | tous | 0.5 | Pilleux | DONE |
| #14    | Edition du fichier *init.sql* pour intégrer les tables *User*(**VARCHAR:Name**, VARCHAR:Password) et *ProjectUsers*(**VARCHAR:ProjectName, VARCHAR:UserName**) | 1, 2, 4, 5 | 0.3 | SJC | DONE |
| #15    | Création du fichier *Register.php* permettant l'enregistrement en tant que développeur | 1 | 0.1 | SJC | DONE |
| #16    | Implémentation du fichier *Register.php* présentant un formulaire qui requiert un champ *Nom* et un champ *Mot de passe* et qui effectue une requête d'insertion dans la table *User* | 1 | 0.5 | SJC | DONE |
| #17    | Création du fichier *LogIn.php* permettant la connexion en tant que développeur | 2 | 0.1 | SJC | TODO |
| #18    | Implémentation du fichier *LogIn.php* présentant un formulaire qui requiert un champ *Nom* et un champ *Mot de passe* et qui effectue une requête de lecture vers la table *User* | 2 | 0.5 | SJC | TODO |
| #19    | Création du fichier *AddUser.php* permettant l'ajout d'un ou plusieurs collaborateurs sur un projet | 4 | 0.1 | SJC | TODO |
| #20    | Implémentation du fichier *AddUser.php* présentant un formulaire qui requiert un champ *Nom* et qui effectue une requête d'insertion vers la table *ProjectUsers* | 4 | 0.5 | SJC | TODO |
| #21    | Création d'un fichier *View.php* avec une classe *View* contenant des méthodes statiques utilisées pour modifier l'affichage d'une page avec des méthodes *addRedirectButton(\$location)* et *currentPriority(\$currentPriority)* | tous | 0.1 | Pilleux | DONE |
| #22 | Documenter les méthodes des classes *CdPError*, *View* et *Database* | tous | 0.1 | Pilleux | DONE |
| #23 | Ajouter le lancement des tests à l'intégration continue | tous | 0.1 | Pilleux | DONE |
