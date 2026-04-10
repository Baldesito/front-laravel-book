# 📚 Sistema Biblioteca Digitale

Sistema web per la gestione di una biblioteca digitale con funzionalità complete di catalogazione, prenotazioni, pannello di amministrazione e **notifiche email transazionali**.

🔗 **[Live Demo: Visita il progetto online](http://baldesito.alwaysdata.net/)**

![Laravel](https://img.shields.io/badge/Laravel-11.x-red.svg)
![PHP](https://img.shields.io/badge/PHP-8.3+-blue.svg)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange.svg)
![Deployment](https://img.shields.io/badge/Deployed_on-AlwaysData-purple.svg)

## 🚀 Quick Start (Sviluppo Locale)

```bash
# Clone repository
git clone [url-repository]
cd biblioteca-digitale

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Setup database (Richiede SQLite o MySQL locale)
php artisan migrate --seed
php artisan storage:link

# Start development server
php artisan serve
✨ Funzionalità
📖 Catalogo Libri - Gestione completa con metadati e copertine (UI responsive a griglia).

📋 Sistema Prenotazioni - Prenotazione online con logica di disponibilità delle singole copie.

📧 Email Transazionali - Invio automatico di conferme di prenotazione via email (SMTP) con layout Markdown personalizzato.

👥 Multi-utente & Ruoli - Accessi differenziati per Amministratori e Lettori.

📊 Dashboard Admin - Pannello di controllo per metriche, inventario e prestiti.

🔍 Ricerca Avanzata - Filtri combinati per categoria, autore e titolo.

📁 Architettura & Struttura
Il progetto segue rigorosamente il pattern MVC (Model-View-Controller).

Plaintext
├── app/
│   ├── Http/Controllers/     # Gestione logica di business e routing
│   ├── Mail/                 # Classi Mailable per notifiche via email
│   ├── Models/               # Relazioni Eloquent e logica DB
│   └── Middleware/           # Protezione rotte e controllo ruoli
├── resources/
│   ├── views/                # Template Blade (UI pubblica e Admin)
│   └── views/emails/         # Template email in Markdown
├── database/
│   ├── migrations/           # Struttura tabelle relazionali
│   └── seeders/              # Popolamento dati fittizi con Faker
└── docs/                     # Documentazione tecnica
👤 Credenziali di Test (Live Demo)
Puoi testare l'applicazione live registrando un nuovo account, oppure utilizzando i seguenti profili predefiniti:

Amministratore (Accesso Dashboard)
Email: admin@biblioteca.com

Password: password

🛠️ Stack Tecnologico Dettagliato
Back-end: Laravel 11, PHP 8.3

Database: MySQL (Architettura relazionale, Foreign Keys, Migrations, Seeders)

Front-end: HTML5, Blade Templates, Bootstrap 5 (Griglia Responsive)

Asset Compilation: Vite

Cloud & Deploy: Gestione server Linux, connessione SSH, setup SMTP in produzione.

📞 Supporto & Documentazione
Per esplorare l'architettura del database o il manuale d'uso, consulta la documentazione completa in docs/README.md.

Sviluppato con ❤️ usando Laravel
