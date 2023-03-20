# Installation
## Prerequisites
To run the application you need installed:
- [Docker](https://docs.docker.com/get-docker/)
- [Composer](https://getcomposer.org/)
- [Node JS](https://nodejs.org/it/download/)
- [PHP](https://www.apachefriends.org/it/download.html)

## Setup
1. Pull the project from Github
2. In the project folder run `npm install`
3. In the project folder run `composer update`

# Run the application
Since we moved to Tailwind CSS, to run the application you should do:
1. `docker-compose up`
2. On another shell, `npm run dev` (for Tailwind CSS realtime changes)

To do this process automatically, depending on your IDE you could:
## PHPStorm
1. `Run > Edit Configurations`.
2. `Add new configurations` (`+` symbol in the top-left corner).
3. Select `npm`, set as `Command` `run` and `Scripts` `dev`, apply.
4. Again `Add new configurations` (`+` symbol in the top-left corner).
5. Select `Docker > Doker-compose`, set as compose file `./docker-compose.yml; `, apply.
6. Again `Add new configurations` (`+` symbol in the top-left corner).
7. Select `Compound` and add the two configuration for `npm` and `docker-compose`.
8. By selecting the compound configuration and pressing the start button the application will run on `localhost`.

## VSCode
I haven't a configuration for it, if someone wants to contribute just add it here.
