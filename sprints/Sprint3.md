# Sprint 3

## User Stories

| Id    | Description | Priorité | Difficulté |
| :---: | :---------- | :------: | :--------: |
| #4  | En tant que développeur, je souhaite ajouter des collaborateurs (autres développeurs possédant des droits similaires aux miens) afin qu'ils puissent accéder à mon projet | Moyenne | 2 |
| #6  | En tant que développeur, je souhaite supprimer un projet de la liste de ceux dans lesquels je suis impliqué ; plus précisément, si d'autres développeurs sont présents sur le projet, j'en serai retiré des collaborateurs, et si j'en suis l'unique collaborateur, le projet sera définitivement supprimé. | Haute | 3 |

## Tâches

| Id    | Description | User Stories | Temps (en jh) | Développeur | Statut |
| :---: | :---------- | :----------: | :-----------: | :---------: | :----: |
| #1    | Création du fichier *AddUser.php* permettant l'ajout d'un développeur sur un projet | 4 | 0.1 |  | DONE |
| #2    | Implémentation du fichier *AddUser.php* présentant un formulaire qui requiert un champ *Nom* et qui effectue une requête d'insertion dans la table *ProjectUsers* | 4 | 0.5 |  | DONE |
| #3    | Edition du fichier *Projects.php* permettant la suppression d'un projet en tenant compte des différents développeurs affiliés ; i.e : si plusieurs développeurs sont présents sur le projet, l'utilisateur courant sera retiré des collaborateurs, sinon le projet sera définitivement supprimé. | 6 | 0.5 |  | TODO |
| #4   | Test : Rédaction du scénario d'ajout d'une *User Story* à la base de données, les éléments entrés dans les champs de la page *AddUserStory.php* doivent être ajoutés dans la table *UserStory* avec les bonnes valeurs | 7 | 0.1 | | TODO |
| #5   | Test : Implémentation du test d'ajout d'une User Story à la base de données | 7 | 0.3 | | TODO |
| #6   | Test : Rédaction du scénario de la modification d'une User Story via la page *EditUserStory.php*. Les éléments entrés dans le formulaire doivent être correctement modifiés dans la base de données | 9 | 0.1 | | DONE |
| #7   | Test : Implémentation du test de la modification d'une User Story | 9 | 0.3 | | DONE |
