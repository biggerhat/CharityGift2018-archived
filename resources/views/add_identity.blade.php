@extends('main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header" style="background-color: crimson; color: white;; color: white;">
                    Add Identity
                </h5>
                <div class="card-body">
                    {{ Form::open(array('url' => 'identity')) }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Identity Name</label>
                            <input type="text" class="form-control" name="name" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="faction">Side</label>
                            <select class="form-control" name="faction">
                                <option value="corp">Corp</option>
                                <option value="runn">Runner</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nrdb_code">NRDB Code</label>
                            <input type="text" class="form-control" name="nrdb_code" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="tier">Tier</label>
                            <select class="form-control" name="tier">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection