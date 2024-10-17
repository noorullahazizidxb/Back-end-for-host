<?php

require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Http\Request;
use Illuminate\Contracts\Http\Kernel;

// Load the Laravel application
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Create a request from the serverless environment
$request = Request::capture();

// Handle the request through Laravel's HTTP kernel
$kernel = $app->make(Kernel::class);
$response = $kernel->handle($request);

// Send the response back to the client
$response->send();

// Terminate the kernel
$kernel->terminate($request, $response);
