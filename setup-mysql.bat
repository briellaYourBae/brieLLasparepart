@echo off
echo Creating MySQL database...
mysql -u root -e "CREATE DATABASE IF NOT EXISTS briellasparepart CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
echo Running migrations...
php artisan migrate:fresh --seed
echo Done!
pause
