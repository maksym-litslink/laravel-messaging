# execute `docker compose up -d`
# execute `docker compose exec web php /app/artisan migrate:fresh --seed`
# execute `docker-compose exec db sh -c 'echo "USE laravel; SELECT email FROM users;" | mysql -u user --password=secret'` and pick any email
# navigate to http://localhost:8080 and login using email from previous point and password "password"

