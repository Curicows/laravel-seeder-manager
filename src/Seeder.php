<?php

namespace Curicows\LaravelSeederManager;

use Curicows\LaravelSeederManager\Interfaces\ManagerSeeder;
use Curicows\LaravelSeederManager\Interfaces\SeedDatabase;
use Curicows\LaravelSeederManager\Models\Seed;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder as BaseSeeder;

abstract class Seeder extends BaseSeeder
{
    public abstract function getName(): string;

    public function run(): void
    {
        $this->handleRun();
    }

    private function handleRun(): void
    {
        if ($this instanceof ManagerSeeder) {
            $this->handleSeeders();
        } else if ($this instanceof SeedDatabase) {
            if (!$this->seedExist()) {
                Model::unguard();
                $this->seed();
                $this->createSeed($this->getName());
                Model::reguard();
            }
        }
        throw new Exception("Must implement ManagerSeeder or SeedDatabase");
    }

    private function handleSeeders(): void
    {
        foreach ($this->getSeeders() as $seeder) {
            $this->call($seeder);
        }
    }

    private function seedExist(): bool
    {
        try {
            Seed::whereSeeder($this->getName())->firstOrFail();
        } catch (Exception) {
            return false;
        }
        return true;
    }

    private function createSeed(string $name): void
    {
        Seed::create([
            'seeder' => $name,
        ]);
    }
}
