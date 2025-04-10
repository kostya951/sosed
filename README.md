1. clone repo
2. go to `src` subdirectory
3. run `npm install`
4. run `composer install`
5. go to `docker` subdirectory
6. run `docker-compose up -d --build`
7. go to `src` subdirectory
8. run `php artisan --env=local migrate --seed` - to apply migration and seeding db with fake data
9. run `php artisan --env=testing migrate` - to apply migration for testing database for performing tests
10. run `php artisan test` - to perform tests
11. go to `localhost` and see web app 
