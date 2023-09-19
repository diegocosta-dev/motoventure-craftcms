<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 *
 * @see \craft\config\GeneralConfig
 */

use craft\config\GeneralConfig;
use craft\helpers\App;

// Set the @webroot alias so the clear-caches command knows where to find CP resources
return GeneralConfig::create()
    ->aliases([
        '@assetsUrl' => App::env('ASSETS_URL'),
        '@assetsRoot' => App::env('ASSETS_ROOT'),
        '@web' => App::env('BASE_CP_URL'),
        '@webroot' => App::env('WEB_ROOT_PATH'),
        '@storage' => App::env('STORAGE_PATH'),
    ])

    // Set the default week start day for date pickers (0 = Sunday, 1 = Monday, etc.)
    ->defaultWeekStartDay(1)

    // Prevent generated URLs from including "index.php"
    ->omitScriptNameInUrls()

    // Enable Dev Mode (see https://craftcms.com/guides/what-dev-mode-does)
    ->devMode(App::env('DEV_MODE') ?? false)
    
    // Allow administrative changes
     ->allowAdminChanges(App::env('ALLOW_ADMIN_CHANGES') ?? false)

     // Allow updates
    ->allowUpdates(App::env('ALLOW_UPDATES') ?? false)

    // Backup database before updates
    ->backupOnUpdate(App::env('BACKUP_ON_UPDATE') ?? true)

    // Run queue automatically? Make sure you have daemons running
    ->runQueueAutomatically(App::env('RUN_QUEUE_AUTOMATICALLY') ?? true)

    // Preload Single entries as Twig variables
    ->preloadSingles()

    // Disallow robots
    ->disallowRobots(App::env('DISALLOW_ROBOTS') ?? false)

    // Prevent user enumeration attacks
    ->preventUserEnumeration()
;
