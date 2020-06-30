<?php

namespace App\Scopes\Atricle;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class WithoutHiddenScope implements \Illuminate\Database\Eloquent\Scope
{

    /**
     * @inheritDoc
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('hidden', false);
    }
}
