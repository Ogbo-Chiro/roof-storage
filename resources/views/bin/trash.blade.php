<link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css"> 


@extends('layouts.app')

@section('content')


<div class="sidenav">
        
  <center>
  <br>
    <i style="font-size: 50px; color:#000; margin-bottom: 15px" class="fas fa-trash"></i>
    <a class="bin" href="{{ route('index') }}">Back</a>

  </center>
</div>

<div class="main">
<br>
  @foreach($files as $file) 
  <div class='responsive'>
    <div class='gallery'>
      <center>
        <?php
          $default = "default.png";
        ?>
        <img src="{{asset($file->extension . '.png')}}" onerror="this.onerror=null;this.src='{{asset($default)}}'">
      </center>

    <div class='desc'><center>{{str_limit($file->name, 27)}}</center>

      <div style="display:inline-flex; vertical-align: middle; width:100%;">

        <a href="{{route('restore', $file->file)}}" class="btn btn_blue"><i class="fas fa-trash-restore-alt"></i></a>

        <a href="{{route('delete_file_permanently', $file->file)}}" class="btn btn_red"><i class="far fa-window-close"></i></a>

        <?php
            $bytes = $file->size;
            $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

            for ($i = 0; $bytes > 1024; $i++) {
                $bytes /= 1024;
            }

            echo "<span class='size'>" . round($bytes, 2) . ' ' . $units[$i]. "</span>";

        ?>

      </div>
    </div>
            
  </div>
</div>


    @endforeach

</div>


@endsection