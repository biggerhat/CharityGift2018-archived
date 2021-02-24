@extends('main')

@section('content')
    @if (! empty($flash))
        <div class="alert alert-danger" role="alert">
            {{ $flash }}
        </div>
    @endif
    <div class="row">
        <div class="col">
            <div class="card" style="margin-bottom: 15px;">
                <h5 class="card-header" style="background-color: crimson; color: white;">
                    Pairing Selection
                </h5>
                <div class="card-body">
                    <p class="card-text">This section is for those members of the community who have been given keys to make ID Pairing selections. Select your ID Pair, give your pair a name, enter the unique key given to you and Submit!</p>
                    <p class="card-text">There are 2 tiers of ID's. Selectors may not pick more than one Tier 1 ID, so if you pick a Tier 1 corp, you may not pick a Tier 1 Runner, and vice versa.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header" style="background-color: crimson; color: white;">
                    Choose Your Pairing
                </h5>
                <div class="card-body">
                    {{ Form::open(array('url' => 'make_picks')) }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name Your Pairing Team:</label>
                        <input type="text" class="form-control" name="team_name" required placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">Enter Your Unique Key:</label>
                        <input type="text" class="form-control" name="key" placeholder="" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pick_corp">Choose Your Corporation:</label><br/>
                                @foreach($identities as $identity)
                                    @if($identity->faction == "corp")
                                        <input type="radio" name="pick_corp" required value="{{ $identity->id }}">{{ $identity->name }} @if($identity->tier == "1")<strong> (Tier 1)</strong> @endif<br/>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pick_corp">Choose Your Runner:</label><br/>
                                @foreach($identities as $identity)
                                    @if($identity->faction == "runner")
                                        <input type="radio" name="pick_runn" required value="{{ $identity->id }}">{{ $identity->name }} @if($identity->tier == "1")<strong> (Tier 1)</strong> @endif<br/>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection