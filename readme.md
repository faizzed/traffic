# Traffic

A lightweight Laravel monitoring package that provides comprehensive HTTP traffic insights without database overhead.

## Overview

Traffic is a filesystem-based Laravel monitoring solution that captures detailed request analytics, performance metrics, and user insights. Unlike database-driven alternatives, it uses efficient file storage with automatic cleanup, ensuring minimal impact on your application's performance.

## Features

- **HTTP Traffic Logging** - Complete request/response monitoring
- **Performance Metrics** - Route-level execution time analysis  
- **Flexible Configuration** - Monitor all routes or specific endpoints
- **RESTful API** - Query your analytics data programmatically
- **Zero Database Impact** - Filesystem storage with automatic cleanup
- **Device & User Analytics** - Comprehensive visitor insights

## Installation

```bash
composer require fyz/traffic
```

**Optional:** Publish the configuration file to customize settings
```bash
php artisan vendor:publish --tag=traffic
```

## Configuration

Configure monitoring behavior in `config/traffic.php`:

- **global**: `true/false` - Monitor all application routes
- **routes**: `true/false` - Enable selective monitoring via middleware

## Usage

### Global Monitoring
Set `global: true` in config to monitor all routes automatically.

### Selective Monitoring
Use the `traffic` middleware on specific routes:

```php
// Monitor a route group
Route::middleware(['traffic'])->group(function () {
    Route::get('/api/users', [UserController::class, 'index']);
    Route::post('/api/users', [UserController::class, 'store']);
});

// Monitor a single route
Route::get('/dashboard', [DashboardController::class, 'index'])
     ->middleware(['traffic']);
```

## Data Access

Access your analytics via RESTful endpoints:

### Today's Data
```http
GET|POST /traffic/logs/{resource}
```

### Historical Data  
```http
GET|POST /traffic/logs/{resource}/since/{days}
```

**Available Resources:**
- `requests` - HTTP request logs
- `performance` - Route execution metrics
- `devices` - Device and browser analytics
- `users` - User behavior insights

## Example API Calls

```bash
# Get today's requests
curl https://yourapp.com/traffic/logs/requests

# Get performance data from last 7 days
curl https://yourapp.com/traffic/logs/performance/since/7

# Get user analytics from last 30 days
curl https://yourapp.com/traffic/logs/users/since/30
```