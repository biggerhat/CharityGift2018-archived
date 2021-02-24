@extends('main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card" style="margin-bottom: 10px;">
                <h5 class="card-header" style="background-color: crimson; color: white;">
                    Add Pairing Picker
                </h5>
                <div class="card-body">
                    {{ Form::open(array('url' => 'make_key')) }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="picker_name">Name</label>
                        <input type="text" class="form-control" name="picker_name" placeholder="Person Selecting Pairing or Anonymous">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
        <table class="table table-striped table-responsive">
            <thead style="background-color: crimson; color: white;">
            <tr>
                <th scope="col">Player Name</th>
                <th scope="col">Key</th>
                <th scope="col">Corp ID</th>
                <th scope="col">Runner ID</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($pairings as $pairing)
                <tr>
                    <th scope="row">{{ $pairing->picker_name }}</th>
                    <td>{{ $pairing->key }}</td>
                    <td>{{ $pairing->pick_corp }}</td>
                    <td>{{ $pairing->pick_runn }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

@endsection