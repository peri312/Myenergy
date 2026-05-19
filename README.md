# MyEnergy

MyEnergy è una piattaforma web per la gestione energetica che permette agli utenti di monitorare informazioni, interagire con aziende e utilizzare funzionalità di supporto attraverso dashboard dedicate.

Il progetto implementa un sistema multi-ruolo con:

- Cliente
- Azienda
- Amministratore

Ogni ruolo dispone di funzionalità differenti.

---

# Obiettivo del progetto

L'obiettivo è realizzare un MVP (Minimum Viable Product) che dimostri la comunicazione completa tra:

Frontend → API → Database

e permetta una gestione semplice delle informazioni tramite interfaccia web.

---

# Funzionalità implementate

## Autenticazione

- Registrazione utenti
- Login
- Gestione sessione
- Differenziazione ruoli

## Dashboard

Dashboard dedicate per:

- Cliente
- Azienda
- Amministratore

## Supporto

- Creazione ticket
- Gestione richieste

## Recensioni

- Inserimento recensioni
- Visualizzazione feedback

---

# Tecnologie utilizzate

Frontend:

- HTML
- CSS
- JavaScript

Backend:

- PHP

Database:

- MySQL

Versionamento:

- Git / GitHub

Hosting:

- AlterVista

---

# Struttura progetto

MyEnergy/

│

├── api/

│ ├── login.php

│ ├── register.php

│ ├── reviews.php

│ └── tickets.php

│

├── pages/

│ ├── dashboard_cliente

│ ├── dashboard_azienda

│ └── dashboard_admin

│

├── css/

├── js/

├── database.sql

└── README.md

---

# Installazione

1. Clonare il repository

git clone [link repository]

2. Aprire phpMyAdmin

3. Creare database:

myenergy

4. Importare:

database.sql

5. Configurare la connessione nel file:

config.php

esempio:

$conn = new mysqli(
"localhost",
"username",
"password",
"myenergy"
);

6. Avviare server locale

xampp oppure altervista

---

# API principali

POST /register

Permette registrazione utenti

POST /login

Permette autenticazione

POST /add_ticket

Inserisce ticket

POST /add_review

Inserisce recensioni

GET /reviews

Recupera recensioni

---

# Possibili miglioramenti futuri

- password_hash()
- prepared statements
- JWT
- notifiche
- grafici consumi
- analytics avanzata

---

# Team

[Nomi componenti gruppo]
