<?php

namespace Curicows\LaravelSeederManager\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Carbon;

/**
 * Curicows\LaravelSeederManager\Models\Seed
 *
 * @property int $id
 * @property string $seeder
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|Seed whereId($value)
 * @method static Builder|Seed whereSeeder($value)
 * @method static Builder|Seed newModelQuery()
 * @method static Builder|Seed newQuery()
 * @method static QueryBuilder|Seed onlyTrashed()
 * @method static Builder|Seed query()
 * @method static QueryBuilder|Seed withTrashed()
 * @method static QueryBuilder|Seed withoutTrashed()
 * @mixin \Eloquent
 */
class Seed extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'seeder',
    ];
}
