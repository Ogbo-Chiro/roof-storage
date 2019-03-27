<link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css"> 

@extends('layouts.app')

@section('content')


<div class="sidenav">
  <form action="{{ route('store_roof_path') }}" method="POST" enctype="multipart/form-data" id="upload_new_form">
  @csrf()
    <center>
      <input type="file" name="files" id="upload_new_file" />
      <label for="upload_new_file" /><img src='https://img.icons8.com/color/48/000000/upload-to-cloud.png' style="height:25px"></label><br>
    </center>
  </form>
  <center>
    <a class="bin" href="{{route('bin')}}">Bin</a>
  </center>
</div>



<div class="main">
<br>
    @foreach($files as $file) 

  <div class='responsive'>
    <div class='gallery'>
      <center>
        <img src="{{asset($file->extension . '.png')}}" onerror="this.onerror=null;this.src='default.png'">
      </center>
      <div class='desc'><center><b>{{str_limit($file->name, 27)}}</b></center>

        <div style="display:inline-flex; vertical-align: middle; width:100%;">

          <a href="{{route('getfile', $file->file)}}" class="btn btn_blue"><i class="fa fa-download"></i></a>

          <a href="{{route('deletefile', $file->file)}}" class="btn btn_red"><i class="fas fa-trash"></i></a>
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



@endsection

