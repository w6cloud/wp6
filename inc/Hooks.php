<?php
/**
 * Hooks
 */

namespace WP6;

use InvalidArgumentException;

class Hooks {


    public static function add( string $type, string $hook, callable $callback, array $options = [] ) {
        $options += [
            'priority' => 10,
            'accepted_args' => 1
        ];
        $allowedTypes = [
            'action',
            'filter'
        ];
        if ( !in_array( $type, $allowedTypes ) ) {
            throw new InvalidArgumentException( __("Invalid value for `$type`.", "wp6") );
        }
        return call_user_func_array(
            "add_$type",
            [
                $hook,
                $callback,
                $options['priority'],
                $options['accepted_args']
            ]
        );
    }

    public static function action( string $hook, callable $callback, array $options = [] ) {
        $options += [
            'priority' => 10,
            'accepted_args' => 1
        ];
        return static::add( 'action', $hook, $callback, $options['priority'], $options['accepted_args'] );
    }

    public static function filter( string $hook, callable $callback, array $options = [] ) {
        $options += [
            'priority' => 10,
            'accepted_args' => 1
        ];
        return static::add( 'filter', $hook, $callback, $options['priority'], $options['accepted_args'] );
    }

    public static function apply( string $hook, mixed $value ) {
        return apply_filters( $hook, $value );
    }

    public static function do( string $hook, mixed ...$value ) {
        call_user_func_array( 'do_action', func_get_args() );
    }

}