# 📚 Sistema Biblioteca Digitale

Sistema web per la gestione di una biblioteca digitale con funzionalità complete di catalogazione, prenotazioni e amministrazione.

![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)
![PHP](https://img.shields.io/badge/PHP-8.1+-blue.svg)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange.svg)

## 🚀 Quick Start

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

# Setup database
php artisan migrate --seed
php artisan storage:link

# Start development server
php artisan serve
```

## ✨ Funzionalità

- 📖 **Catalogo Libri** - Gestione completa con metadati e immagini
- 📋 **Sistema Prenotazioni** - Prenotazione online con gestione stato
- 👥 **Multi-utente** - Ruoli amministratore e utenti normali
- 🔍 **Ricerca Avanzata** - Filtri per categoria, autore, titolo
- 📱 **Responsive Design** - Interfaccia moderna su tutti i dispositivi
- 🔒 **Sicurezza** - Autenticazione e autorizzazione complete

## 📁 Struttura Progetto

```
├── app/
│   ├── Http/Controllers/     # Controllers MVC
│   ├── Models/              # Modelli Eloquent
│   └── Middleware/          # Middleware personalizzati
├── resources/views/         # Template Blade
├── database/
│   ├── migrations/          # Migrazioni database
│   └── seeders/            # Dati iniziali
├── docs/                   # Documentazione completa
└── README.md              # Questo file
```

## 👤 Utenti Predefiniti

### Amministratore
- **Email**: admin@biblioteca.com
- **Password**: password

### Utente Test
- **Email**: user@test.com  
- **Password**: password

## 📖 Documentazione

La documentazione completa è disponibile in [`docs/README.md`](docs/README.md) e include:

- 🔧 Guida installazione dettagliata
- 🗄️ Schema database completo
- 📚 Guide d'uso per admin e utenti
- 🛠️ Troubleshooting e FAQ
- 🔌 API Reference

## 🛠️ Stack Tecnologico Dettagliato

- **Back-end:** Laravel 10.x, PHP 8.x
- **Database:** MySQL / MariaDB (Architettura relazionale, Migrations, Seeders)
- **Front-end:** HTML5, Blade Templates, Bootstrap 5 (UI Framework)
- **Asset Compilation:** Vite (Configurato per gestione ottimizzata di JS/CSS)
- **Architettura:** Pattern MVC (Model-View-Controller)
- **Autenticazione:** Laravel UI / Auth system (Ruoli differenziati)

## 📞 Supporto

Per problemi o domande:
1. Consulta la [documentazione completa](docs/README.md)
2. Verifica la sezione troubleshooting
3. Controlla i logs in `storage/logs/laravel.log`

## 📄 Licenza

Questo progetto è sviluppato per scopi educativi e di apprendimento.

---

**Sviluppato con ❤️ usando Laravel**
