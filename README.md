## App in laravel per la gestione di una biblioteca

Sistema di gestione di biblioteca con utenti standard (con registrazione) e utenti admin per la gestione del catalogo con:
- Form di login/registrazione per utenti standard
- View per gli utenti dov'è possibile visualizzare i libri a catalogo; selezionandone uno, vengono visualizzati i dettagli del libro, oltre alla miglior copia per condizione disponibile alla prenotazione (se possibile)
- View di recap delle prenotazioni in corso a proprio nome, con possibilita' di concluderle restituendo il libro
- Dashboard per gli admin, dove è possibile: 
    1) avere una panoramica di libri, copie, prestiti in corso e utenti
    2) modificare direttamente dalla lista libri e copie
    3) aggiungere generi, libri e copie


Stack utilizzato:
- Laravel 12
- Blade 
- Tailwind CSS
- Mysql

Note:
- Gli utenti admin come da spec possono essere creati solo "a mano" sul db

Seeding: 
```
php artisan db:seed --class=DatabaseSeeder
```
Crea un utente admin (username: admin, pw: adminadmin), un utente standard (username: test, pw: testtest), 5 generi, 10 libri, 20 copie.
