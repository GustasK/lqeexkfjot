@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
           <div class="col-md-8 col-md-offset-2">
               <h2>Thank you for registering! Please update your profile.</h2><br>
           </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">Update Info</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('updateInfo') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" rows="5" id="description" name="description"></textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group{{$errors->has('orientation') ? 'has-error' : ''}}">
                                <label class="col-md-4 control-label">Sexual Orientation:</label>

                                <div class="col-md-6">
                                    <select class="selectpicker" name="option">
                                        <option value="0">Heterosexual</option>
                                        <option value="1">Homosexual</option>
                                        <option value="2">Bisexual</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">City</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required>

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group"{{ $errors->has('file') ? ' has-error' : '' }}>
                                <div class="col-md-6 col-md-offset-4">
                                   <input type="file" name="file">
                                    @if ($errors->has('file'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
