<?php
// Test all endpoints - FIXED VERSION
$baseUrl = 'http://localhost:8000';

echo "=== Testing Laravel Contact System ===\n\n";

// Test 1: Homepage
echo "1. Testing Homepage:\n";
$ch = curl_init($baseUrl . '/');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_NOBODY => true,
]);
curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo $httpCode == 200 ? "   ✅ Working\n" : "   ❌ Failed (HTTP $httpCode)\n";
curl_close($ch);

// Test 2: Dashboard
echo "\n2. Testing Dashboard:\n";
$ch = curl_init($baseUrl . '/admin/dashboard');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_NOBODY => true,
]);
curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo $httpCode == 200 ? "   ✅ Working\n" : "   ❌ Failed (HTTP $httpCode)\n";
curl_close($ch);

// Test 3: Contacts List (with better error handling)
echo "\n3. Testing Contacts List:\n";
$ch = curl_init($baseUrl . '/admin/contacts');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
]);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($httpCode == 200) {
    echo "   ✅ Working\n";
} else {
    echo "   ❌ Failed (HTTP $httpCode)\n";
    // Check if it's a view error
    if (strpos($response, 'View') !== false || strpos($response, 'blade') !== false) {
        echo "   Likely a view file error. Check resources/views/admin/contacts/index.blade.php\n";
    }
}
curl_close($ch);

// Test 4: API GET
echo "\n4. Testing API GET:\n";
$ch = curl_init($baseUrl . '/api/contacts');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => ['Accept: application/json'],
]);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$data = json_decode($response, true);

if ($httpCode == 200 && isset($data['success'])) {
    echo "   ✅ Working\n";
    echo "   Contacts found: " . count($data['data'] ?? []) . "\n";
} else {
    echo "   ❌ Failed (HTTP $httpCode)\n";
    echo "   Response: " . substr($response, 0, 200) . "...\n";
}
curl_close($ch);

// Test 5: API POST (without CSRF)
echo "\n5. Testing API POST (Create Contact):\n";
$apiData = [
    'fullname' => 'API Test User',
    'email' => 'api-test@example.com',
    'message' => 'This is a test via API',
    'business_name' => 'Test Company',
    'phone' => '1234567890'
];

$ch = curl_init($baseUrl . '/api/contacts');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($apiData),
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Accept: application/json',
        'X-Requested-With: XMLHttpRequest'
    ],
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$responseData = json_decode($response, true);

if ($httpCode == 201 || $httpCode == 200) {
    echo "   ✅ API POST Working (HTTP $httpCode)\n";
    if (isset($responseData['data']['id'])) {
        $contactId = $responseData['data']['id'];
        echo "   Created Contact ID: $contactId\n";
    }
} else {
    echo "   ❌ API POST Failed (HTTP $httpCode)\n";
    if (isset($responseData['message']) && strpos($responseData['message'], 'CSRF') !== false) {
        echo "   CSRF Token Error! Fix needed:\n";
        echo "   1. Edit app/Http/Middleware/VerifyCsrfToken.php\n";
        echo "   2. Add: protected \$except = ['api/*'];\n";
    }
    echo "   Response: " . substr($response, 0, 200) . "\n";
}
curl_close($ch);

// Test database
echo "\n6. Testing Database:\n";
try {
    require __DIR__ . '/vendor/autoload.php';
    $app = require_once __DIR__ . '/bootstrap/app.php';
    $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
    
    $count = \App\Models\Contact::count();
    echo "   Contacts in database: $count\n";
    
    if ($count > 0) {
        $latest = \App\Models\Contact::latest()->first();
        echo "   Latest: #{$latest->id} - {$latest->fullname}\n";
    }
    
    echo "   ✅ Database connection working\n";
} catch (Exception $e) {
    echo "   ❌ Database error: " . $e->getMessage() . "\n";
}

echo "\n=== Quick Fixes Needed ===\n";
echo "1. Fix Contacts List (HTTP 500) - Likely view file error\n";
echo "2. Fix API CSRF - Exclude API routes from CSRF protection\n";
echo "3. Clear cache: php artisan view:clear && php artisan cache:clear\n";

echo "\n=== Test Complete ===\n";