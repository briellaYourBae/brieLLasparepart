@echo off
echo Setting up SQLite database...
php artisan migrate:fresh --seed
echo Done! Database created at database/db_briellasparepart.sqlite
pause
