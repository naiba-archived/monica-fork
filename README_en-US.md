# Monica Fork

![Build Status](https://github.com/naiba/monica-fork/workflows/docker/badge.svg) <a href="README.md">
    <img height="20px" src="https://img.shields.io/badge/CN-flag.svg?color=555555&style=flat&logo=data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMjAwIDgwMCIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPg0KPHBhdGggZmlsbD0iI2RlMjkxMCIgZD0ibTAsMGgxMjAwdjgwMGgtMTIwMHoiLz4NCjxwYXRoIGZpbGw9IiNmZmRlMDAiIGQ9Im0tMTYuNTc5Niw5OS42MDA3bDIuMzY4Ni04LjEwMzItNi45NTMtNC43ODgzIDguNDM4Ni0uMjUxNCAyLjQwNTMtOC4wOTI0IDIuODQ2Nyw3Ljk0NzkgOC40Mzk2LS4yMTMxLTYuNjc5Miw1LjE2MzQgMi44MTA2LDcuOTYwNy02Ljk3NDctNC43NTY3LTYuNzAyNSw1LjEzMzF6IiB0cmFuc2Zvcm09Im1hdHJpeCg5LjkzMzUyIC4yNzc0NyAtLjI3NzQ3IDkuOTMzNTIgMzI0LjI5MjUgLTY5NS4yNDE1KSIvPg0KPHBhdGggZmlsbD0iI2ZmZGUwMCIgaWQ9InN0YXIiIGQ9Im0zNjUuODU1MiwzMzIuNjg5NWwyOC4zMDY4LDExLjM3NTcgMTkuNjcyMi0yMy4zMTcxLTIuMDcxNiwzMC40MzY3IDI4LjI1NDksMTEuNTA0LTI5LjU4NzIsNy40MzUyLTIuMjA5NywzMC40MjY5LTE2LjIxNDItMjUuODQxNS0yOS42MjA2LDcuMzAwOSAxOS41NjYyLTIzLjQwNjEtMTYuMDk2OC0yNS45MTQ4eiIvPg0KPGcgZmlsbD0iI2ZmZGUwMCI+DQo8cGF0aCBkPSJtNTE5LjA3NzksMTc5LjMxMjlsLTMwLjA1MzQtNS4yNDE4LTE0LjM5NDUsMjYuODk3Ni00LjMwMTctMzAuMjAyMy0zMC4wMjkzLTUuMzc4MSAyNy4zOTQ4LTEzLjQyNDItNC4xNjQ3LTMwLjIyMTUgMjEuMjMyNiwyMS45MDU3IDI3LjQ1NTQtMTMuMjk5OC0xNC4yNzIzLDI2Ljk2MjcgMjEuMTMzMSwyMi4wMDE3eiIvPg0KPHBhdGggZD0ibTQ1NS4yNTkyLDMxNS45Nzk1bDkuMzczNC0yOS4wMzE0LTI0LjYzMjUtMTcuOTk3OCAzMC41MDctLjA1NjYgOS41MDUtMjguOTg4NiA5LjQ4MSwyOC45OTY0IDMwLjUwNywuMDgxOC0yNC42NDc0LDE3Ljk3NzQgOS4zNDkzLDI5LjAzOTItMjQuNzE0LTE3Ljg4NTgtMjQuNzI4OCwxNy44NjUzeiIvPg0KPC9nPg0KPHVzZSB4bGluazpocmVmPSIjc3RhciIgdHJhbnNmb3JtPSJtYXRyaXgoLjk5ODYzIC4wNTIzNCAtLjA1MjM0IC45OTg2MyAxOS40MDAwNSAtMzAwLjUzNjgxKSIvPg0KPC9zdmc+DQo=">
</a>

**Feel free to add the features you need, we have no CI, no style-lint, and no paying users to worry about**

The difference between this fork and upstream:
1. Support the reminder of lunar calendar (lunar calendar) dates (very important, many people celebrate birthdays and anniversaries in the lunar calendar)
2. Added permission verification for access to storage (eliminating the risk of exhaustive photos and documents)

## Installation guide

1. Please pre-install Docker, `docker-compose`
    ```
    mkdir monica && cd monica
    wget https://raw.githubusercontent.com/naiba/monica-fork/master/docker-compose.yml
    wget -O .env https://raw.githubusercontent.com/naiba/monica-fork/master/.env.example
    mkdir -p storage/framework/sessions
    mkdir -p storage/framework/cache
    mkdir -p storage/framework/views
    docker-compose up -d
    ```
2. Modify the configuration items in `.env`
3. Initialize the database
    ```
    docker-compose exec mariadb mysql -uroot -pmysqrootpass -e "CREATE DATABASE monica CHARACTER SET utf8 COLLATE utf8_general_ci;"
    ```
4. Initialize the system
    ```
    docker-compose exec monica php /monica/artisan key:generate
    docker-compose exec monica php /monica/artisan migrate
    ```
4. Visit `ip:8080`, you can use reverse proxy to wrap it

## Screenshot

### Home

![Homepage screenshot](docs/home.jpg)

### Contact

![Contact screenshot](docs/people.jpg)

\# **Do you want to add more calendars (Buddhist, Islamic, Japanese)?**
1. Add a translation in `resource/lang/en/people.php`, search for `reminders_calendar_lunar`. For example: add `reminders_calendar_buddhist` after `reminders_calendar_lunar`.
2. Realize the corresponding Gregorian date conversion operation in `convertToSolarCalendarDate` and `addTimeAccordingToFrequencyType` in `app/Helpers/DateHelper.php`.

This project forks from [Monica](https://github.com/monicahq/monica) in December 2020
