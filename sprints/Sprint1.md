# Sprint1.md

## User Stories

| Id  | Description | Priorité | Difficulté |
| :-: | :---------- | :------: | :--------: |
| #3  | En tant que développeur, je souhaite créer un projet via un formulaire (nom de projet et collaborateurs (autres développeurs) optionnellement) | Haute | 3 |
| #5  | En tant que développeur, je souhaite avoir accès à la liste des projets que j'ai créé et dont je suis collaborateur | Haute | 2 |
| #6  | En tant que développeur, je souhaite supprimer un projet de la liste de ceux dans lesquels je suis impliqué ; plus précisément, si d'autres développeurs sont présents sur le projet,            j'en serai retiré des collaborateurs, et si j'en suis l'unique collaborateur, le projet sera définitivement supprimé. | Haute | 2 |
| #7  | En tant que développeur, je souhaite ajouter une User Story (Id, Description, Priorité (optionnelle, peut être renseignée plus tard), Difficulté) à mon backlog afin de décrire un               besoin | Haute | 3 |
| #8  | En tant que développeur, je souhaite consulter le backlog du projet afin de potentiellement en modifier les User Stories | Haute | 2 |
| #9  | En tant que développeur, je souhaite modifier le contenu d'une User Story via un formulaire (Id, Description, Priorité (optionnelle), Difficulté) où les champs auront la valeur de              l'User Story actuelle | Haute | 3 |
| #10  | En tant que développeur, je souhaite supprimer une User Story du backlog | Haute | 2 |

## Tâches

| Id    | Description | User Stories | Temps (en jh) | Développeur  | Statut |
| :---: | :---------- | :----------: | :-----------: | :----------: | :----: |
| #1    | Mise en place du projet sous docker avec docker-compose   | 0 | 1 | Pilleux | DONE |
| #2    | Création du fichier *init.sql* qui génère la base de données et les tables nécessaires et élaboration de l'interface de la base de données | 0 | 0.5 | Saint-Jean | DONE |
| #3    | Implémentation du fichier *init.sql* qui génère une base de données contenant deux tables *Project*(**VARCHAR:Name**) et *UserStory*(**VARCHAR:ProjectName, INT:Id**, VARCHAR:Description, ENUM:Priority, INT:Difficulty) | 0 | 0.5 | Saint-Jean | DONE |
| #4    | Création du fichier *HomePage.php* qui sert de page d'accueil à l'application | 3 | 0.1 | Chemoune | DONE |
| #5    | Implémentation du fichier *HomePage.php* ;  deux boutons *Créer un projet* et *Liste des projets* redirigent respectivement vers la page de création de projet et vers la liste des projets existants | #3 | 0.3 | Chemoune | DONE |
| #6    | Création du fichier *CreateProject.php* permettant la création d'un projet | 3 | 0.1 | Chemoune | DONE |
| #7    | Implémentation du fichier *CreateProject.php* présentant un formulaire qui requiert un champ nom pour la création d'un projet et qui effectue une requête d'insertion dans la table *Project* | 3 | 0.3 | Chemoune | DONE |
| #8    | Création du fichier *Projects.php* qui affiche la liste des projets existants | 5 | 0.1 | Chemoune | DONE |
| #9    | Implémentation du fichier *Projects.php* qui effectue une requête pour afficher la liste des projets contenus dans la table *Project* ; des boutons *Backlog* redirigent vers les backlogs respectifs et des boutons *Supprimer* permettent de supprimer le projet associé | 5 | 0.3 | Chemoune | DONE |
| #10    | Création du fichier *Backlog.php* qui affiche le backlog du projet sélectionné ; des boutons permettent l'ajout, la modification et la suppression d'User Stories ainsi que le retour à la page d'accueil | 8 | 0.1 | Pilleux | DONE |
| #11   | Implémentation du fichier *Backlog.php* qui effectue une requête vers la table *UserStory* pour afficher les User Stories du projet courant ; un bouton *Ajouter une User Story* redirige vers la page d'ajout d'une User Story pour le projet associé ; en face de chaque User Story, un bouton *Modifier* redirige vers la page de modification de l'User Story                 respective et un bouton *Supprimer* en permet la suppression | 9 | 0.5 | Pilleux | DONE |
| #12   | Création du fichier *AddUserStory.php* qui permet d'ajouter une User Story au projet sélectionné ou de revenir au backlog | 5 | 0.1 | Saint-Jean | DONE |
| #13   | Implémentation du fichier *AddUserStory.php* présentant un formulaire d'ajout d'une User Story au projet selectionné et effectuant une requête d'insertion dans la table *UserStory* ; un bouton *Annuler* redirige vers la page du backlog | 7 | 0.5 | Saint-Jean | DONE |
| #14   | Création du fichier *EditUserStory.php* permettant la modification de l'User Story sélectionnée ou le retour au backlog | 9 | 0.1 | Pilleux | DOING |
| #15   | Implémentation du fichier *EditUserStory.php* présentant un formulaire permettant de modifier l'User Story sélectionnée et effectuant une requête de mise à jour vers la table *UserStory* ; un bouton *Cancel* redirigera vers le backlog | 9 | 0.5 | Pilleux | DOING |
| #16   | Test : Rédaction du scénario de créaction d'un projet, le projet doit être correctement ajouté à la base de données | 3 | | | TODO |
| #17   | Test : Implémentation du test de la création d'un projet | 3 | | | TODO |
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
