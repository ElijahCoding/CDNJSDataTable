@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <data-table endpoint="{{ route('libraries.index') }}"></data-table>
        </div>
      </div>
</div>
@endsection
