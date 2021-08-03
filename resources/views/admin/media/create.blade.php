@extends('layouts.admin')


@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('content')

    <h1>Upload Media</h1>

   {!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store', 'class'=>'dropzone']) !!}
      
   
    {!! Form::close() !!}

@endsection


@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.js"></script>

@endsection