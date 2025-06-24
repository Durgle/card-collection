<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;

class CreateGameModelCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:game-model {game} {name} {--m|migration} {--f|factory}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a model for a specific game and optional migration.';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/model.stub';
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        $name = trim($this->argument('name'));

        if (Str::endsWith($name, '.php')) {
            return Str::substr($name, 0, -4);
        }

        return Str::ucfirst($name);
    }

    /**
     * Get the desired game from the input.
     *
     * @return string
     */
    protected function getGameInput()
    {
        return trim($this->argument('game'));
    }

    /**
     * Get table name.
     *
     * @return string
     */
    protected function getTableName()
    {
        $game = Str::snake($this->getGameInput());
        $name = Str::snake($this->getNameInput());
        return Str::plural("{$game}_{$name}");
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        $gameName = Str::studly($this->getGameInput());

        return "{$rootNamespace}\\Models\\{$gameName}";
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $class = str_replace($this->getNamespace($name) . '\\', '', $name);
        $gameName = Str::studly($this->getGameInput());

        $replace = [
            '{{ class }}' => $class,
            '{{ game }}' => $gameName,
            '{{ table }}' => $this->getTableName(),
        ];

        return str_replace(array_keys($replace), array_values($replace), $stub);
    }

    /**
     * Create a model factory for the model.
     *
     * @return void
     */
    protected function createFactory()
    {
        $factory = Str::studly($this->getNameInput());
        $gameName = Str::studly($this->getGameInput());

        $this->call('make:factory', [
            'name' => "{$gameName}/{$factory}Factory",
            '--model' => $this->qualifyClass($this->getNameInput()),
        ]);
    }

    /**
     * Execute the console command.
     *
     * @return bool|null
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {

        if (parent::handle() === false) {
            return false;
        }

        if ($this->option('factory')) {
            $this->createFactory();
        }

        if ($this->option('migration')) {
            $this->call('make:game-migration', [
                'game' => $this->getGameInput(),
                'name' => $this->getNameInput(),
            ]);
        }

        return true;
    }
}
