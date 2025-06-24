<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use function Illuminate\Filesystem\join_paths;
use Illuminate\Console\MigrationGeneratorCommand;

class CreateGameMigrationCommand extends MigrationGeneratorCommand
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:game-migration {game} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a migration for a specific game';

    /**
     * Get the migration stub file path.
     *
     * @return string
     */
    protected function migrationStubFile()
    {
        return __DIR__ . '/stubs/migration.stub';
    }

    /**
     * Get the migration table name.
     *
     * @return string
     */
    protected function migrationTableName()
    {
        return Str::snake(Str::pluralStudly($this->getGameInput() . '_' . $this->getNameInput()));
    }

    /**
     * Get the desired game from the input.
     *
     * @return string
     */
    protected function getGameInput()
    {
        return Str::lower(trim($this->argument('game')));
    }

    /**
     * Get the desired name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return Str::lower(trim($this->argument('name')));
    }

    /**
     * Get the migration file path.
     *
     * @return string
     */
    protected function getMigrationPath()
    {
        return 'migrations/' . $this->getGameInput();
    }

    /**
     * Create a base migration file for the table.
     *
     * @param  string  $table
     * @return string
     */
    protected function createBaseMigration($table)
    {
        return $this->laravel['migration.creator']->create(
            'create_' . $table . '_table',
            $this->laravel->databasePath($this->getMigrationPath())
        );
    }

    /**
     * Determine whether a migration for the table already exists.
     *
     * @param  string  $table
     * @return bool
     */
    protected function migrationExists($table)
    {
        return count($this->files->glob(
            join_paths($this->laravel->databasePath($this->getMigrationPath()), '*_*_*_*_create_' . $table . '_table.php')
        )) !== 0;
    }
}
