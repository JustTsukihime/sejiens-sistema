<?php

namespace App;

class StudentFilters extends QueryFilters
{
    protected $options = [
        'name' => ['asc', 'desc'],
        'email' => ['asc', 'desc'],
    ];

    public function name($order = 'asc') {
        $this->builder->orderBy('name', $order)->orderBy('surname', $order);
    }

    public function email($order = 'asc') {
        $this->builder->orderBy('email', $order);
    }

    public function status($status = 'all') {
        switch($status) {
            case 'confirmed':
                $this->builder->whereNotNull('confirmed_at');
                break;
            case 'unconfirmed':
                $this->builder->whereNull('confirmed_at');
                break;
            case 'all':
            default:
                break;
        }
    }
}
