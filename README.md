# Make It Stick

Beginpunt van de app Make It Stick: een adaptieve memotrainer waarin studenten quizvragen beantwoorden en weekly challenges maken, en docenten vragen, categorieën en challenges beheren.

Dit is de backend en het docentenportaal (Laravel). De studenten-app (React Native + Expo) komt later.

## Wat zit erin

- Database-migrations op basis van het ERD
- Models met relaties
- Seeders met testdata (gebruikers, categorieën, 3 vragen, een challenge en badges)

| Tabel | Wat |
|---|---|
| users | studenten en docenten (`rol`), met `score` |
| categorieen | bijv. C#, OOP, SQL |
| vragen | meerkeuzevraag a t/m d met goed antwoord en uitleg |
| categorie_vraag | koppeltabel: vraag kan bij meerdere categorieën horen |
| antwoorden | antwoord van een student op een vraag |
| challenges | weekly challenge met deadline |
| inzendingen | wat een student inlevert, met cijfer en feedback |
| badges / badge_user | badges en wie ze heeft verdiend |

## Starten

Nodig: PHP 8.3 of hoger, Composer 2, MySQL 8.4

```bash
git clone <deze repo>
cd make-it-stick
composer install
cp .env.example .env
php artisan key:generate
```

Maak in MySQL een database `make_it_stick` aan en zet je wachtwoord in `.env`. Daarna:

```bash
php artisan migrate --seed
php artisan serve
```

Snel testen zonder MySQL kan ook: zet in `.env` `DB_CONNECTION=sqlite` en haal de andere `DB_`-regels weg.

## Testaccounts

Wachtwoord voor alle accounts: `password`

| E-mail | Rol |
|---|---|
| docent@makeitstick.test | docent |
| sanne@makeitstick.test | student |
| student@makeitstick.test | student |

## Takenbord

De taken staan op het GitHub-projectbord van deze repo. Zie ook `TAKENBORD.md`.
