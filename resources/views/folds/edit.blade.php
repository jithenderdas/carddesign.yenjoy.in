@extends('adminlte::page')

@section('title', 'Edit fold')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('Edit fold - ') . $fold->fold_name }}</h1>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('folds.index') }}" class="btn bg-gradient-primary float-right">Back</a>
        </div>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-1">

                    @foreach (['danger', 'warning', 'success', 'info'] as $message)
                        @if(Session::has($message))
                            <div class="alert alert-{{ $message }}">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{ session($message) }}
                            </div>
                    @endif
                @endforeach

                <!-- general form elements -->
                    <div class="card card-primary" style="width: 850px;">
                        <div class="card-header">
                            <h3 class="card-title">Edit fold</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('folds.update', $fold->id) }}" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="card-body row">

                            <div class="col-md-6" style=""> 
                            <div class="form-group">
                                    <label for="type_of_fold">Type of Fold</label>
                                    <input type="text" class="form-control @error('type_of_fold') is-invalid @enderror" id="type_of_fold" name="type_of_fold" value="{{$fold->type_of_fold}}" placeholder="Type of Fold">
                                    @error('type_of_fold')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ $fold->image }}">
                                    @error('image')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="minimum_mm">Minimum mm</label>
                                    <input type="text" class="form-control @error('minimum_mm') is-invalid @enderror" id="minimum_mm" name="minimum_mm" value="{{$fold->minimum_mm}}" placeholder="Minimum mm">
                                    @error('minimum_mm')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>                     
                                       
                                <div class="form-group">
                                    <label for="notes">Notes</label>
                                    <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" value="{{$fold->notes}}">{{$fold->notes}}</textarea>
                                    
                                    @error('notes')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                </div>
                                
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
            </div>
        </div>
    </section>
@stop
