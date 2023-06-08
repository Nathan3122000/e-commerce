<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CRUD extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:model {name}';

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
        $model_name = $this->argument('name');
        $data = array();
        $j = 1;
        for ($i=0; $i < $j; $i++) {
            $std = $this->ask('name atrribure? (input exit to cancel or execute to generate)');
            if($std=='cancel'){
                $this->info('The command was cancel!');
                break;
            }

            if($std!='cancel' && $std!='execute'){
                $tipe = $this->ask('tipe data? (integer, string, text, boolean, date, dateTime, foreign:table)');
                $input = $this->ask('input tipe? (text, number, textarea, file, date, password, select)');
                $arr = explode(':',$tipe);
                $data[] = (object) array('attr' => $std, 'tipe' => $arr, 'input'=>$input);
                $j++;
            }

            if($std=='execute'){
                $this->createModel($data,$model_name);
                $this->createMigration($data,$model_name);
                Artisan::call('controller:model', ['name' => $model_name ]);
                $resource = "Route::resource('".strtolower($model_name)."',App\\Http\\Controllers\\".$model_name."Controller::class);";
                // $datatable = "Route::post('".strtolower($model_name)."',[App\\Http\\Controllers\\".$model_name."Controller::class,'datatable'])->name('".strtolower($model_name).".data');";
                $fp = fopen(base_path('routes/web.php'), 'a');
                // $fd = fopen(base_path('routes/datatable.php'), 'a');
                fwrite($fp, $resource);
                // fwrite($fd, $datatable);
                // $menu = "<li class=\"sidebar-item\">\r\n    <a class=\"sidebar-link waves-effect waves-dark sidebar-link\" href=\"{{ route('".strtolower($model_name).".index') }}\"\r\n        aria-expanded=\"false\">\r\n        <i class=\"fa fa-list\" aria-hidden=\"true\"></i>\r\n        <span class=\"hide-menu\">".$model_name." Management</span>\r\n    </a>\r\n</li>";
                // $fp = fopen(base_path('resources/views/component/sidebar.blade.php'), 'a');
                // fwrite($fp, $menu);
                if (!file_exists(base_path('resources/views/admin'))) {
                    mkdir(base_path('resources/views/admin'), 0777);
                }

                if (!file_exists(base_path('resources/views/admin/'.strtolower($model_name)))) {
                    mkdir(base_path('resources/views/admin/'.strtolower($model_name)), 0777);
                    $this->viewCreate($model_name);
                    $this->viewEdit($model_name);
                    $this->viewIndex($data, $model_name);
                    $this->viewForm($data, $model_name);
                }else{
                    $this->viewCreate($model_name);
                    $this->viewEdit($model_name);
                    $this->viewIndex($data, $model_name);
                    $this->viewForm($data, $model_name);
                }

                $migrate = $this->ask('are you want to migtare database?');
                if ($migrate=='yes') {
                    Artisan::call('migrate');
                }else{
                    $this->info('The command was successful!');
                }
                break;
            }
        }

    }

    public function createModel(array $data, $model_name)
    {
        $str = '';
        foreach ($data as $item) {
            $str = $str."\r\n        '".$item->attr."',";
        };
        $data = "[".$str."\r\n    ]";
        $html = "<?php\r\n\r\nnamespace App\\Models;\r\n\r\nuse Illuminate\\Database\\Eloquent\\Factories\\HasFactory;\r\nuse Illuminate\\Database\\Eloquent\\Model;\r\nuse Illuminate\Database\Eloquent\SoftDeletes;\r\n\r\nclass ".$model_name." extends Model\r\n{\r\n    use HasFactory, SoftDeletes;\r\n\r\n    protected ".'$fillable'." = ".$data.";\r\n}\r\n";
        $fp = fopen(base_path('app')."/"."Models/".$model_name.".php","wb");
        fwrite($fp,$html);
        fclose($fp);
    }

    public function createMigration(array $data, $model_name)
    {
        $str = '';
        foreach ($data as $item) {
            if (count($item->tipe)==1) {
                $str = $str."\r\n            ".'$table->'.$item->tipe[0].'('."'".$item->attr."'".')'.";";
            } else {
                $str = $str."\r\n            ".'$table->foreignId('."'".$item->attr."'".')'."->constrained('".$item->tipe[1]."');";
            }

        };
        $html = "<?php\r\n\r\nuse Illuminate\\Database\\Migrations\\Migration;\r\nuse Illuminate\\Database\\Schema\\Blueprint;\r\nuse Illuminate\\Support\\Facades\\Schema;\r\n\r\nreturn new class extends Migration\r\n{\r\n    public function up(): void\r\n    {\r\n        Schema::create('".strtolower($model_name)."s', function (Blueprint ".'$table'.") {\r\n            ".'$table->id()'.";".$str."\r\n            ".'$table->softDeletes()'.";\r\n            ".'$table->timestamps()'.";\r\n        });\r\n    }\r\n\r\n    public function down(): void\r\n    {\r\n        Schema::dropIfExists('".strtolower($model_name)."s');\r\n    }\r\n};";
        $file_name = date('Y_m_d_His').'_create_'.strtolower($model_name).'s_table';
        $fp = fopen(base_path('database')."/"."migrations/".$file_name.".php","wb");
        fwrite($fp,$html);
        fclose($fp);
    }

    public function viewCreate($model_name)
    {
        $content = "@extends('layouts.admin')\r\n@section('title','Tambah ".$model_name."')\r\n@section('content')\r\n    <div class=\"card\">\r\n        <div class=\"card-header\">\r\n            <div class=\"card-title\">Tambah ".$model_name."</div>\r\n        </div>\r\n        <div class=\"card-body\">\r\n            <form action=\"{{ route('".strtolower($model_name).".store') }}\" method=\"post\">\r\n                @csrf\r\n                @include('admin.".strtolower($model_name).".form')\r\n                <div class=\"btn-group\">\r\n                    <a class=\"btn btn-sm btn-primary\" href=\"{{ route('".strtolower($model_name).".index') }}\"><i class=\"fas fa-arrow-alt-circle-left\"></i> Kembali</a>\r\n                    <button type=\"submit\" onclick=\"return confirm('are you sure?')\" class=\"btn btn-sm btn-success\"><i class=\"fas fa-save\"></i> Simpan</button>\r\n                </div>\r\n            </form>\r\n        </div>\r\n    </div>\r\n@endsection\r\n";

        $create = fopen(base_path('resources/views/admin/'.strtolower($model_name))."/"."create.blade.php","wb");
        fwrite($create, $content);
        fclose($create);
    }

    public function viewEdit($model_name)
    {
        $content = "@extends('layouts.admin')\r\n@section('title','Edit ".$model_name."')\r\n@section('content')\r\n    <div class=\"card\">\r\n        <div class=\"card-header\">\r\n            <div class=\"card-title\">Edit ".$model_name."</div>\r\n        </div>\r\n        <div class=\"card-body\">\r\n            <form action=\"{{ route('".strtolower($model_name).".update',$".strtolower($model_name).") }}\" method=\"post\">\r\n                @csrf\r\n                @method('PUT')\r\n                @include('admin.".strtolower($model_name).".form')\r\n                <div class=\"btn-group\">\r\n                    <a class=\"btn btn-sm btn-primary\" href=\"{{ route('".strtolower($model_name).".index') }}\"><i class=\"fas fa-arrow-alt-circle-left\"></i> Kembali</a>\r\n                    <button type=\"submit\" onclick=\"return confirm('are you sure?')\" class=\"btn btn-sm btn-success\"><i class=\"fas fa-save\"></i> Simpan</button>\r\n                </div>\r\n            </form>\r\n        </div>\r\n    </div>\r\n@endsection\r\n";

        $edit = fopen(base_path('resources/views/admin/'.strtolower($model_name))."/edit.blade.php","wb");
        fwrite($edit, $content);
        fclose($edit);
    }

    public function viewIndex(array $data, $model_name)
    {
        $header = '';
        $column = '';
        foreach ($data as $item) {
            $header = $header."\r\n                            <th>Nama ".strtolower($item->attr)."</th>";
            $column = $column."\r\n                            <td>{{ ".'$item->'.strtolower($item->attr)." }}</td>";
        };

        $content = "@extends('layouts.admin')\r\n@section('title','".$model_name." Management')\r\n@section('content')\r\n    <div class=\"card\">\r\n        <div class=\"card-header\">\r\n            <a href=\"{{ route('".strtolower($model_name).".create') }}\" class=\"btn btn-sm btn-success\"><i class=\"fas fa-plus\"></i> Create</a>\r\n        </div>\r\n        <div class=\"card-body\">\r\n            <div class=\"table-responsive\">\r\n                <table class=\"table nowrap table-bordered\">\r\n                    <thead>\r\n                        <tr>\r\n                            <th>No.</th>".$header."\r\n                            <th>Action</th>\r\n                        </tr>\r\n                    </thead>\r\n                    <tbody>\r\n                        @foreach (".'$data'." as ".'$item'.")\r\n                        <tr>\r\n                            <td>{{ ".'$loop'."->iteration }}</td>".$column."\r\n                            <td>\r\n                                <div class=\"btn-group\">\r\n                                    <a href=\"{{ route('".strtolower($model_name).".edit',".'$item'.") }}\" class=\"btn btn-sm btn-primary\"><i class=\"fas fa-pencil-alt\"></i> Edit</a>\r\n                                    <form action=\"{{ route('".strtolower($model_name).".destroy',".'$item'.") }}\" method=\"post\">\r\n                                        @csrf\r\n                                        @method('DELETE')\r\n                                        <button class=\"btn btn-sm btn-danger\" type=\"submit\" onclick=\"return confirm('are you sure?')\"><i class=\"fas fa-trash-alt\"></i> Hapus</button>\r\n                                    </form>\r\n                                </div>\r\n                            </td>\r\n                        </tr>\r\n                        @endforeach\r\n                    </tbody>\r\n                </table>\r\n            </div>\r\n        </div>\r\n    </div>\r\n@endsection\r\n\r\n@push('script')\r\n<script>\r\n    $('.table').dataTable();\r\n</script>\r\n@endpush";

        $index = fopen(base_path('resources/views/admin/'.strtolower($model_name))."/index.blade.php","wb");
        fwrite($index, $content);
        fclose($index);
    }

    public function viewForm(array $data, $model_name)
    {
        $input = '';
        foreach ($data as $item) {
            if($item->input=='select'){
                $input = $input."\r\n<x-input :options=\"[]\" :value=\"$".strtolower($model_name)."->".$item->attr."??old('".$item->attr."')\" :col=\"6\" :label=\"'".ucfirst($item->attr)."'\" :type=\"'".$item->input."'\" :name=\"'".$item->attr."'\" :required=\"true\"></x-input>";
            }elseif($item->input=='toogle'){
                $input = $input."\r\n<x-toogle :value=\"$".strtolower($model_name)."->".$item->attr."??old('".$item->attr."')\" :col=\"6\" :label=\"'".ucfirst($item->attr)."'\" :name=\"'".$item->attr."'\" ></x-toogle>";
            }else{
                $input = $input."\r\n<x-input :value=\"$".strtolower($model_name)."->".$item->attr."??old('".$item->attr."')\" :col=\"6\" :label=\"'".ucfirst($item->attr)."'\" :type=\"'".$item->input."'\" :name=\"'".$item->attr."'\" :required=\"true\"></x-input>";
            }
        };

        $content = "<div class=\"row\">\r\n".$input."\r\n<div class=\"col-12 mb-2 px-1\">\r\n    </div>\r\n</div>";

        $form = fopen(base_path('resources/views/admin/'.strtolower($model_name))."/form.blade.php","wb");
        fwrite($form, $content);
        fclose($form);
    }

    public function viewShow(array $data, $model_name)
    {
        $str = '';
        foreach ($data as $item) {
            $str = $str."                    @include('component.input',['input'=> Form::".$item->input."('".$item->attr."',$".strtolower($model_name)."->".$item->attr.",['class' => 'form-control']),'label'=> Form::label('".$item->attr."', '".$item->attr."')])\r\n";
        };

        $content = "@extends('layouts.desktop')\r\n@section('content')\r\n<div class=\"container-fluid\">\r\n    <div class=\"row\">\r\n        <div class=\"col-md-12\">\r\n            <div class=\"white-box\">\r\n                <h3 class=\"box-title\">Detail </h3>                \r\n".$str."               \r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>\r\n@endsection";

        $show = fopen(base_path('resources/views/desktop/'.strtolower($model_name))."/show.blade.php","wb");
        fwrite($show, $content);
        fclose($show);
    }
}
