@extends('layouts.app')

@section('content')
    <div>
        @if (session('status'))
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Dashboard</div>
                            <div class="card-body">

                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div id="news">
            <div id="props" data-news="{{$news}}"></div>
        </div>
    </div>
@endsection
