<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// Update admin user
DB::table('users')->where('id', 1)->update([
    'name' => 'Admin BrieLLaSparepart',
    'email' => 'admin@briellasparepart.com',
    'password' => Hash::make('admin123'),
    'role' => 'superadmin',
]);

echo "✅ Admin user updated successfully!\n";
echo "Email: admin@briellasparepart.com\n";
echo "Password: admin123\n";
