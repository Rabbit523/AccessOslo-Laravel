@extends('layouts.private') @section('title', 'Hjem') @section('content')
<div class="page-container" data-source="{{$data}}" data-type="{{$type}}"> 
  <accessoslo-post></accessoslo-post>
</div>
</div>
@endsection