<?php
{{ $config := . }}
/**
 * @file
 * {{ $config.Signature }}: Automatically generated Drupal settings file.
 * ddev manages this file and may delete or overwrite the file unless this
 * comment is removed.
 */

$host = "{{ $config.DatabaseHost }}";
$port = {{ $config.DatabasePort }};
$driver = "{{ $config.DatabaseDriver }}";

// If DDEV_PHP_VERSION is not set but IS_DDEV_PROJECT *is*, it means we're running (drush) on the host,
// so use the host-side bind port on docker IP
if (empty(getenv('DDEV_PHP_VERSION') && getenv('IS_DDEV_PROJECT') == 'true')) {
  $host = "{{ $config.DockerIP }}";
  $port = {{ $config.DBPublishedPort }};
}

$databases['default']['default'] = array(
  'database' => "{{ $config.DatabaseName }}",
  'username' => "{{ $config.DatabaseUsername }}",
  'password' => "{{ $config.DatabasePassword }}",
  'host' => $host,
  'driver' => $driver,
  'port' => $port,
  'prefix' => "{{ $config.DatabasePrefix }}",
);

$drupal_hash_salt = '{{ $config.HashSalt }}';

// Enable verbose logging for errors.
// https://www.drupal.org/docs/7/creating-custom-modules/show-all-errors-while-developing
$conf['error_level'] = 2;
