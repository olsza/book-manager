# Aplikacja BOOK mANAGER

Prosty system do zarządzania książkami w bibliotece.

**Cel:** Rekrutacja

## Specyfikacja:
1. **Aplikacja:**
    - Użyj Laravela jako frameworka oraz MySQL jako bazy danych.
2. **Interfejs użytkownika:**
    - Prosty interfejs, który pozwoli użytkownikowi na dodawanie, edycję, usuwanie oraz przeglądanie książek.
3. **Model książki:**
	Książka powinna zawierać następujące informacje:
	- Tytuł
	- Autor
	- Rok wydania
	- Krótki opis
	- Ilość dostępnych egzemplarzy
4. **Walidacja:**
	- Upewnij się, że wszystkie pola są odpowiednio walidowane przed zapisaniem do bazy danych.
5. **Wyszukiwanie:**
	- Użytkownik powinien być w stanie wyszukać książkę po tytule lub autorze.
6. **Paginacja:**
    - Jeśli w bazie jest więcej niż 10 książek, użyj paginacji do wyświetlania wyników.
7. **Relacje:**
    - Dodaj funkcjonalność, która pozwoli na przypisanie książki do kategorii (np. literatura, historia, nauka). Użytkownik powinien być w stanie przeglądać książki według kategorii.

## Instrukcje:
#### Pierwsze uruchomienie:

1. Zrób klon na swój lokalny komputer
```shell
git clone https://github.com/olsza/book-manager.git
```

2. Wejdź do utworzonego katalogu z projektem
```shell
cd book-manager
```

3. Skopiuj plik z ustawieniami pod SAIL (Sail to Obrazy Docker dostosowany pod Laravel) - zalecam używania, ma się pewność,że wszystkie wymagania będą spełnione.
```shell
cp .env.sail .env
```

4. Instalujemy SAIL przez Component z parametrem aby omijał sprawdzanie wymagań, gdyż na komputerze lokalnym, mogą się różnić wersje bibliotek PHP i będą pojawiać się błędy... później to z aktualizujemy poprzez SAIL
```shell
composer require laravel/sail --dev --ignore-platform-reqs
```

5. Generujemu unikalny kluch dla Laravel
```shell
php artisan k:g
```

6. Uruchamiamy w tle SAIL
```shell
./vendor/bin/sail up -d
```

7. Tworzymy Bazę
```shell
./vendor/bin/sail artisan migrate --step
```

8. Wgrywamy do Bazy przykładowe Dane
```shell
./vendor/bin/sail artisan db:seed DatabaseSeeder
```

9. Instalujemy biblioteki NPM dla Frontu
```shell
./vendor/bin/sail npm install
```

10. Uruchamiamy VITE, aby stworzył pliki pod front
```shell
./vendor/bin/sail npm run build
```

Po zakończeniu, wyłączamy SAIL przez komendę
```shell
./vendor/bin/sail down
```

#### Uruchamiane na następnych uruchomieniach:

```shell
./vendor/bin/sail up -d
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

Po zakończeniu, wyłączamy VITE naciskając Ctrl+C oraz wyłączamy SAIL przez komendę
```shell
./vendor/bin/sail down
```

## Przeglądarka:

Po uruchomieniu SAIL, możemy zobaczyć efekt w przeglądarce wchodzą na http://localhost

Możemy przeglądać przykładowe książki wygenerowane przez Seeder-y (bez logowania)

Po rejestracji i zalogowaniu, będzie można edytować i dodawać

Jest gotowy jeden użytkownik, podają dane:

e-mail: **test@test.test**

hasło: **PASSword!23**

### API

Dostępne jest REST API, które np. za pomocą PostMan czy Insomnia, a także Curl można zarządzać Książkami i Kategoriami do książek, adresy to:

Dla książek:
http://localhost/api/books

Przykład usunięcia książki:
```shell
curl -X DELETE http://localhost/api/books/9
```
Przykład dodania książki:
```shell
curl -d '{"title":"New book", "author":"Olsza","short_description":"This is test book","number_available":666,"publication_year":"2023","category_id":3}' -H 'Content-Type: application/json' http://localhost/api/books
```


Dla Kategorii:
http://localhost/api/categories

Przykład dodania kategorii:
```shell
curl -d '{"name":"Test category"}' -H 'Content-Type: application/json' http://localhost/api/categories
```
Przykład zmiany nazwy kategorii:
```shell
curl -d '{"name":"NEW category"}' -H 'Content-Type: application/json' -X PUT  http://localhost/api/categories/6
```

---
*Pozdrawiam*
**Olsza**
