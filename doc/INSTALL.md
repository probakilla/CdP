# CdP Installation

## Logiciels requis

- docker
- docker-compose

## Installation via git

Premièrement, cloner le dépôt :

```bash
git clone https://githubcom/probakilla/CdP.git
cd CdP
```

Pour lancer le serveur apache ainsi que la base de données mariadb :

```bash
docker-compose build
docker-compose up -d
```

Le site internet est maintenant accessible via navigateur à l'adresse :

```bash
<http://localhost:8080/>
```

## Installation via docker

Lancer l'image avec la commande :

```bash
docker pull probakilla/cdp:v0.1.0
```