@extends('adminlte::page')

@section('title', 'finishingmachines')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('finishingmachines') }}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('finishingmachines.create') }}" class="btn bg-gradient-primary float-right">Add finishingmachines</a>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                @foreach (['danger', 'warning', 'success', 'info'] as $message)
                    @if(Session::has($message))
                        <div class="alert alert-{{ $message }}">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ session($message) }}
                        </div>
                    @endif
                @endforeach
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">finishingmachines</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>Machine</th>
                                <th>Folds Available</th>
                                <th>Min End Fold</th>
                                <th>Max Length mm</th>
                                <th>Speed</th>
                                <th>Year</th>
                                <th>Srial Nos</th>
                                <th>Notes</th>

                                <th style="width: 200px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($finishingmachines as $index => $finishingmachine)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $finishingmachine->machine }}</td>
                                    <td>{{ $finishingmachine->folds_available }}</td>
                                    <td>{{ $finishingmachine->min_end_fold }}</td>
                                    <td>{{ $finishingmachine->max_length_mm }}</td>
                                    <td>{{ $finishingmachine->speed }}</td>
                                    <td>{{ $finishingmachine->year }}</td>
                                    <td>{{ $finishingmachine->serial_Nos }}</td>
                                    <td>{{ $finishingmachine->notes }}</td>
                                    <td>
                                        <a href="{{ route('finishingmachines.show',$finishingmachine->id) }}" class="btn btn-sm btn-warning">View</a>
                                        @if(!$finishingmachine->deleted_at)
                                        <a href="{{ route('finishingmachines.edit',$finishingmachine->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <form method="POST" action="{{ route('finishingmachines.destroy', $finishingmachine->id) }}"
                                              accept-charset="UTF-8"
                                              style="display: inline-block;"
                                              onsubmit="return confirm('Are you sure do you want to delete?');">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <div class="float-right">
                            {!! $finishingmachines->links() !!}
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            </div>
        </div>
    </section>
@stop
