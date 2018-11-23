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
│   │   ├── AddUserStory.php
│   │   ├── Backlog.php
│   │   ├── CreateProject.php
│   │   ├── Database.php
│   │   ├── EditUserStory.php
│   │   ├── Error.php
│   │   ├── HomePage.php
│   │   ├── LogIn.php
│   │   ├── Projects.php
│   │   ├── Register.php
│   │   ├── UserMenu.php
│   │   └── View.php
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
