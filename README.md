# photoFit
**Install env**

    # install doccker
    + open project with cmd
    + run for linux(or wsl2): sed -i -e 's/^WWWUSER=.*$/WWWUSER='$(id -u)'/' -e 's/^WWWGROUP=.*$/WWWGROUP='$(id -g)'/' ./.env
    + run for windows       : (skip command)
    + run: docker-compose build
    + run: docker-compose up -d
    + run: docker-compose run --rm php composer install
    + run: docker-compose run --rm php npm install
    + run: docker-compose run --rm php bash
    + run2: cp .env.example .env
    + run2: php artisan migrate:fresh --seed
    + run2: php artisan key:generate
    + open browser url : http://localhost

# extra

## php command execute

    + run: docker-compose run --rm -T php php artisan xxxxx

## queue worker execute

    # other terminal open to:

    + run: docker-compose run --rm -T php php artisan queue:work