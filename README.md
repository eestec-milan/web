# Installation
## Prerequisites
To run the application you need installed:
- [Docker](https://docs.docker.com/get-docker/)
- [Composer](https://getcomposer.org/)
- [Node JS](https://nodejs.org/it/download/)
- [PHP](https://www.apachefriends.org/it/download.html)

## First setup
1. Pull the project from Github
2. In the project folder run `npm install`
3. In the project folder run `composer update`

## Dev using Docker
Docker container is used to test the application. To run it, open a terminal in the project directory and run `docker-compose up`.
In the first run, it will require few minutes, then it will be faster. You don't need to recreate the container every time you do a change, it will be automatically updated.
