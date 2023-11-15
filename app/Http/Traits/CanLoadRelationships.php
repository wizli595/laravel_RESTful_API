<?php

namespace App\Http\Traits;

use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBldr;
use Illuminate\Contracts\Database\Query\Builder as QueryBldr;
use Illuminate\Database\Eloquent\Model;

trait CanLoadRelationShips
{
    // this should load the missing filed in the response like the user or attendees of the event 
    // and bcs its an query it will be optional 
    public function loadRelation(Model|EloquentBldr|QueryBldr $for, ?array $relations = null): Model|EloquentBldr|QueryBldr
    {
        $relations = $relations ?? $this->relations ?? [];
        foreach ($relations as $relation) {
            $for->when(
                $this->shouldIncludeRelation($relation),
                fn ($q) => $for instanceof Model ? $for->load($relation) : $q->with($relation)
            );
        }
        return $for;
    }


    /**
     * Helper function for the query in the URL
     */
    protected function shouldIncludeRelation(string $relation): bool
    {
        $include = request()->query('include');
        if (!$include) {
            return false;
        }
        $relations = array_map('trim', explode(',', $include));
        return in_array($relation, $relations);
    }
}
