# Specs.md

### DoD : Definition of DONE

Une tâche est considérée comme terminée si :
- Elle est bien définie dans le sprint backlog (id, description, user stories associées, temps nécessaire, développeur(s) et statut actuel)
- Les fichiers correspondants sont définis et implémentés

Une User Story est considérée comme terminée si :
- Elle est bien définie dans le backlog (id, description, priorité et difficulté)
- Les tâches associées sont terminées
- Les scénarios associés sont réalisables
- Le build du projet se termine sans erreur

NB : La documentation et les tests sont exclus de la DoD

### Arborescence

```bash
├── doc
│   └── INSTALL.md
├── docker
│   └── php-apache
│       └── Dockerfile
├── docker-compose.yml
├── README.md
├── requirements.txt
├── sonar-project.properties
├── Specs.md
├── sprints
│   ├── Sprint1.md
│   └── Sprint2.md
├── src
│   ├── css
│   │   └── HomePageStyle.css
│   ├── index.html
│   ├── php
|   |   ├── models
|   │   │   ├── Database.php
|   │   │   ├── Error.php
|   │   │   └── View.php
│   │   ├── AddUserStory.php
│   │   ├── Backlog.php
│   │   ├── CreateProject.php
│   │   ├── EditUserStory.php
│   │   ├── HomePage.php
│   │   ├── LogIn.php
│   │   ├── Projects.php
│   │   ├── Register.php
│   │   └── UserMenu.php
│   └── sql
│       └── init.sql
└── test
    ├── consts.py
    ├── testBacklog.py
    ├── testDelete.py
    ├── testListProject.py
    ├── tests.md
    └── webDriversOptions.py
```

## Base de données

Table Project
>| Name                         |
>| :--------------------------: |
>| Nom du projet (clé primaire) |

Table UserStory
>| ProjectName                               | Id                         | Description | Priority | Difficulty |
>| :---------------------------------------: | :------------------------: | :---------: | :------: | :--------: |
>| Nom du projet (clé primaire et étrangère avec Project[Name]) | Identifiant (clé primaire) | Description de la user story              | Priorité                   | Difficulté  |

Table User
>| Name                                | Password                |
>| :---------------------------------: | :---------------------: |
>| Nom de l'utilisateur (clé primaire) | Mot de passe (encrypté) |

Table ProjectUsers
>| ProjectName | UserName |
>| :---------: | :------: |
>| Nom du projet (clé primaire et étrangère avec Project[Name]) | Nom de l'utilisateur associé au projet (clé primaire et étrangère avec User[Name])