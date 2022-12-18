<?php

namespace App\Factory;

use App\Entity\ProgramSchedule;
use App\Repository\ProgramScheduleRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<ProgramSchedule>
 *
 * @method        ProgramSchedule|Proxy create(array|callable $attributes = [])
 * @method static ProgramSchedule|Proxy createOne(array $attributes = [])
 * @method static ProgramSchedule|Proxy find(object|array|mixed $criteria)
 * @method static ProgramSchedule|Proxy findOrCreate(array $attributes)
 * @method static ProgramSchedule|Proxy first(string $sortedField = 'id')
 * @method static ProgramSchedule|Proxy last(string $sortedField = 'id')
 * @method static ProgramSchedule|Proxy random(array $attributes = [])
 * @method static ProgramSchedule|Proxy randomOrCreate(array $attributes = [])
 * @method static ProgramScheduleRepository|RepositoryProxy repository()
 * @method static ProgramSchedule[]|Proxy[] all()
 * @method static ProgramSchedule[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static ProgramSchedule[]|Proxy[] createSequence(array|callable $sequence)
 * @method static ProgramSchedule[]|Proxy[] findBy(array $attributes)
 * @method static ProgramSchedule[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ProgramSchedule[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class ProgramScheduleFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'program' => ProgramFactory::new(),
            'updatedAt' => self::faker()->dateTimeBetween('-1 year')
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(ProgramSchedule $programSchedule): void {})
        ;
    }

    protected static function getClass(): string
    {
        return ProgramSchedule::class;
    }
}
