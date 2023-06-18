<p align="center"><a href="https://lector.davidbaekeland.be" target="_blank"><img src="https://lector.davidbaekeland.be/storage/logo.svg" width="200 alt="Lector Logo"></a></p>

## Lector

Lector is een online leerplatform dat ontwikkeled is om het online schoolproces van studenten zo gemakkelijk mogelijk maakt:
- Leerplatform
- Agenda
- Communicatie


## Installatie
1. Open een terminal en clone de Git respository. Dit kan met de volgende  commando:
````
git clone https://github.com/DavidBaekeland/Lector.git
````

2. Installeer de dependencies:
````bash
composer install
npm install
````

 3.  Maak een nieuwe .env bestand aan vanuit .env.development:
````bash
cp .env .env.development
````

4. Verander de database en Pusher credentials in het .env bestand.


5. Verander de volgende waarde in php.ini.

````
post_max_size = 256M
upload_max_filesize = 256M
max_file_uploads = 20
memory_limit = 256M
````

## Start project
1. Open twee terminal’s en voer de volgende commando’s uit (1 per terminal):
````bash
npm run dev
php artisan serve
````

 2. Open een browser en surf naar:
**[http://127.0.0.1:8000](http://127.0.0.1:8000)**


## Hosting
1. Verwijder de dependencies en .env bestand.


2. Gebruik een FTP tool (WinSCP, Filezila, ...) om de bestanden over te zetten naar de gewenste shared hosting server.


3. Maak een nieuwe .env bestand aan vanuit .env.production:

````bash
cp .env .env.production
````

4. Verander de database en Pusher credentials in het .env bestand.


5. Maak vervolgens via SSH verbinding met de server om de migrations en seeders uit te voeren

````bash
php artisan migrate --seed
````

6.   Tot slot verander de volgende waarden in php.ini bestand:

````
post_max_size = 256M
upload_max_filesize = 256M
max_file_uploads = 20
memory_limit = 256M
````
