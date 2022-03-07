<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;

class LivewireCustomCrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:livewire:crud 
    {nameOfTheClass? : the name of the class.},
     {nameOfTheModelClass? : the name of the model class.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a custom livewire CRUD';
     protected $nameOfTheClass;
     protected $nameOfTheModelClass;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->file = new Filesystem();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      // $this->info('this is your custom livewire command for generating grud. ');
      //Géner tt les paramétres
      $this->gatherParameters();
      //Géner livewire class file
      $this->generateLivewireCrudClassFile();
      //Géner live wire view file
      $this->generateLivewireCrudViewFile();
    }

    protected function gatherParameters()
    {
        $this->nameOfTheClass = $this->argument('nameOfTheClass');  
        $this->nameOfTheModelClass = $this->argument('nameOfTheModelClass'); 
        //if you didn't input the name of the class
        if (!$this->nameOfTheClass) {
            $this->nameOfTheClass = $this->ask('Enter le nom de la classe');
        }
        if (!$this->nameOfTheModelClass ) {
            $this->nameOfTheModelClass = $this->ask('Enter le nom de la model');
        }
        //convert to studly case
        $this->nameOfTheClass = Str::studly($this->nameOfTheClass);
        $this->nameOfTheModelClass = Str::studly($this->nameOfTheModelClass);
         
    }
    //generate the crud class file
    protected function generateLivewireCrudClassFile()
    {
        //set the origine and destination for the livewire class file
        $fileOrigin = base_path('/stubs/custom.livewire.crud.stub');
        $fileDestination = base_path('/app/Http/Livewire/' .$this->nameOfTheClass . '.php');

        if ($this->file->exists($fileDestination)) {
            $this->info('this class file already exists: '.$this->nameOfTheClass .' .php');
            $this->info('Aborting class file creation.');
            return false;      
        }

        //get the  original string content of the file
        $fileOriginalString = $this->file->get($fileOrigin);

        //replace the string specified in the array sequentially
        $replaceFileOriginalString = Str::replaceArray('{{}}', 
    [
        $this->nameOfTheModelClass, // nom de model
        $this->nameOfTheClass, //nom de la classe 
        $this->nameOfTheModelClass, //nom de model
        $this->nameOfTheModelClass, //nom de model
        $this->nameOfTheModelClass, //nom de model
        $this->nameOfTheModelClass, //nom de model
        $this->nameOfTheModelClass, //nom de model
        Str::kebab($this->nameOfTheClass), //from "foobar" to "foobar"
    ],
    $fileOriginalString
);

        //put the content into the destination directory
        $this->file->put($fileDestination,  $replaceFileOriginalString);
        $this->info('Livewire class file created: '.$fileDestination);

    }

    protected function generateLivewireCrudViewFile()
    {
         //set the origine and destination for the livewire class file
         $fileOrigin = base_path('/stubs/custom.livewire.crud.view.stub');
         $fileDestination = base_path('/resources/views/Livewire/' . Str::kebab($this->nameOfTheClass)
          .'.blade.php');   

           if ($this->file->exists($fileDestination)) {
            $this->info('this view file already exists: '. Str::kebab($this->nameOfTheClass) . '.php');
            $this->info('Aborting view file creation.');
            return false;      
        }  
        
         //copy file to destination
        $this->file->copy($fileOrigin, $fileDestination);
        $this->info('Livewire view class file created: '.$fileDestination);

        }
}
