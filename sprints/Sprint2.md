# Sprint 2

## User Stories

| Id    | Description | Priorité | Difficulté |
| :---: | :---------: | :------: | :--------: |
| #1  | En tant que visiteur, je souhaite m'enregistrer en tant que développeur via un formulaire (nom d'utilisateur et mot de passe) afin de gérer mes projets | Moyenne | 3 |
| #2  | En tant que visiteur, je souhaite m'authentifier en tant que développeur via un formulaire (nom d'utilisateur et mot de passe) | Moyenne | 2 |
| #4  | En tant que développeur, je souhaite ajouter des collaborateurs (autres développeurs possédant des droits similaires aux miens) afin qu'ils puissent accéder à mon projet | Moyenne | 2 |
| #5  | En tant que développeur, je souhaite avoir accès à la liste des projets que j'ai créé et dont je suis collaborateur | Haute | 2 |
| #6  | En tant que développeur, je souhaite supprimer un projet de la liste de ceux dans lesquels je suis impliqué ; plus précisément, si d'autres développeurs sont présents sur le projet, j'en serai retiré des collaborateurs, et si j'en suis l'unique collaborateur, le projet sera définitivement supprimé. | Haute | 2 |
| #7  | En tant que développeur, je souhaite ajouter une User Story (Id, Description, Priorité (optionnelle, peut être renseignée plus tard), Difficulté) à mon backlog afin de décrire un besoin | Haute | 3 |
| #8  | En tant que développeur, je souhaite consulter le backlog du projet afin de potentiellement en modifier les User Stories | Haute | 2 |
| #9  | En tant que développeur, je souhaite modifier le contenu d'une User Story via un formulaire (Id, Description, Priorité (optionnelle), Difficulté) où les champs auront la valeur de l'User Story actuelle | Haute | 3 |
| #10  | En tant que développeur, je souhaite supprimer une User Story du backlog | Haute | 2 |
| #11 | En tant que développeur, je souhaite créer des sprints (période de temps fixée et numérotée pendant laquelle on tâche de réaliser les User Stories) afin de pouvoir y associer des tâches pour planifier le projet | Basse | 3 |
| #12 | En tant que développeur, je souhaite visualiser la liste des sprints afin de visualiser l'organisation temporelle du travail à fournir | Basse | 2 |
| #13 | En tant que développeur, je souhaite créer une tâche (Id tâche, Id UserStory, description, statut (TODO, DOING, DONE), temps nécessaire, dépendances, Id développeur (optionnel)) au sein d'un sprint afin de décrire le travail à effectuer | Basse | 3 |

## Tâches

| Id    | Description | User Stories | Temps (en jh) | Développeur | Statut |
| :---: | :---------: | :----------: | :-----------: | :---------: | :----: |
| #18   | Test : Rédaction du scénario pour vérifier que l'affichage de la liste des projets est correct, tout les projets présents dans la base de données, dans la table *Project* doivent être correctement affichés sur la page *Projects.php* | 5 | | | TODO |
| #19   | Test : Implémentation de la vérification de l'affichage de la liste des projets | 5 | | | TODO |
| #20   | Test : Rédaction du scénario de vérification de l'affichage du backlog d'un projet, les données présentent dans la table *UserStory* associées au projet voulu doivent apparaître correctement sur la page *Backlog.php* | 6 | | | TODO |
| #21   | Test : Implémentation de la vérification de l'affichage du backlog d'un projet | 6 | | | TODO |
| #22   | Test : Rédaction du scénario d'ajout d'une *User Story* à la base de données, les éléments entrés dans les champs de la page *AddUserStory.php* doivent être ajoutés dans la table *UserStory* avec les bonnes valeurs | 7 | | | TODO |
| #23   | Test : Implémentation du test d'ajout d'une User Story à la base de données | 7 | | | TODO |
| #24   | Test : Rédaction du scénario de la modification d'une User Story via la page *EditUserStory.php*. Les éléments entrés dans le formulaire doivent être correctement modifiés dans la base de données | 9 | | | TODO |
| #25   | Test : Implémentation du test de la modification d'une User Story | 9 | | | TODO |
| #26   | Test : Rédaction du scénario de la suppression d'une User Story du backlog. L'User Story doit être correctement enlevée de la base de données | 10 | | | TODO |
| #27   | Test : Implémentation du test de la suppression d'une User Story du backlog | 10 | | | TODO |