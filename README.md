1. execute `docker compose up -d`
2. execute `docker compose exec web php /app/artisan migrate:fresh --seed`
3. execute `docker-compose exec db sh -c 'echo "USE laravel; SELECT email FROM users;" | mysql -u user --password=secret'` and pick any email
4. navigate to http://localhost:8080 and login using email from previous point and password "password"

