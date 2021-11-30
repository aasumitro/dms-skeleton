<?php

if (! function_exists('app')) {
    /**
     * Get the available container instance.
     *
     * @param string|null $make
     * @param array $parameters
     * @return mixed|\Console\Base\Application
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    function app(string $make = null, array $parameters = [])
    {
        if (is_null($make)) {
            return Illuminate\Container\Container::getInstance();
        }

        return Illuminate\Container\Container::getInstance()->make($make, $parameters);
    }
}

if (! function_exists('base_path')) {
    /**
     * Get the path to the base of the install.
     *
     * @param string $path
     * @return string
     */
    function base_path(string $path = ''): string
    {
        return app()->basePath().($path ? '/'.$path : $path);
    }
}

if (! function_exists('config')) {
    /**
     * Get / set the specified configuration value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param array|string|null $key
     * @param mixed|null $default
     * @return mixed
     */
    function config(array|string $key = null, mixed $default = null): mixed
    {
        if (is_null($key)) {
            return app('config');
        }

        if (is_array($key)) {
            return app('config')->set($key);
        }

        return app('config')->get($key, $default);
    }
}

if (! function_exists('database_path')) {
    /**
     * Get the path to the database directory of the install.
     *
     * @param string $path
     * @return string
     */
    function database_path(string $path = ''): string
    {
        return app()->databasePath($path);
    }
}
