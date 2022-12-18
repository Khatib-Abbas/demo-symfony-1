<?php

namespace App\Factory;

use App\Entity\Program;
use App\Repository\ProgramRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Program>
 *
 * @method        Program|Proxy create(array|callable $attributes = [])
 * @method static Program|Proxy createOne(array $attributes = [])
 * @method static Program|Proxy find(object|array|mixed $criteria)
 * @method static Program|Proxy findOrCreate(array $attributes)
 * @method static Program|Proxy first(string $sortedField = 'id')
 * @method static Program|Proxy last(string $sortedField = 'id')
 * @method static Program|Proxy random(array $attributes = [])
 * @method static Program|Proxy randomOrCreate(array $attributes = [])
 * @method static ProgramRepository|RepositoryProxy repository()
 * @method static Program[]|Proxy[] all()
 * @method static Program[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Program[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Program[]|Proxy[] findBy(array $attributes)
 * @method static Program[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Program[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class ProgramFactory extends ModelFactory
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
            'duration' => self::faker()->numberBetween(1, 32767),
            'name' => self::faker()->text(255),
            'updatedAt' => self::faker()->dateTimeBetween('-1 year')
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Program $program): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Program::class;
    }
}
