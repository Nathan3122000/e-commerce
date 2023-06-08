<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'controller:model {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $model = $this->argument('name');

        $content = "<?php\r\n\r\nnamespace App\\Http\\Controllers;\r\n\r\nuse App\\Models\\".$model.";\r\nuse Illuminate\\Http\\Request;\r\n\r\nclass ".$model."Controller extends Controller\r\n{\r\n    public function index()\r\n    {\r\n        ".'$data'." = ".$model."::all();\r\n        return view('admin.".strtolower($model).".index', compact('data'));\r\n    }\r\n\r\n    public function create()\r\n    {\r\n        return view('admin.".strtolower($model).".create');\r\n    }\r\n\r\n    public function edit(".$model." $".strtolower($model).")\r\n    {\r\n        return view('admin.".strtolower($model).".edit', compact('".strtolower($model)."'));\r\n    }\r\n\r\n    public function store(Request ".'$request'.")\r\n    {\r\n        ".$model."::create(".'$request'."->all());\r\n        return redirect()->route('".strtolower($model).".index')->with('success','Data berhasil ditambahkan!');\r\n    }\r\n\r\n    public function update(".$model." $".strtolower($model).", Request ".'$request'.")\r\n    {\r\n        $".strtolower($model)."->update(".'$request'."->all());\r\n        return redirect()->route('".strtolower($model).".index')->with('success','Data berhasil disimpan!');\r\n    }\r\n\r\n    public function destroy(".$model." $".strtolower($model).")\r\n    {\r\n        $".strtolower($model)."->delete();\r\n        return redirect()->route('".strtolower($model).".index')->with('success','Data berhasil dihapus!');\r\n    }\r\n}";

        $fp = fopen(base_path('app')."/"."Http/Controllers/".$model."Controller.php","wb");
        fwrite($fp,$content);
        fclose($fp);
    }
}
