@extends('main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card" style="margin-bottom: 15px;">
                <h5 class="card-header" style="background-color: crimson; color: white;">
                    ID Pairings
                </h5>
                <div class="card-body">
                    <p class="card-text">These 47 auction lots represent your ticket to participate in the event. Each provides a pair of custom Charity Gift alt-art IDs, and several have additional prize support bundled in.</p>

                    <p class="card-text">The Auctions are divided in A, B and C track listings. A track listings will close first, on Friday October 5th at 10pm. B track listings will close on Monday October 8th at 10pm. C track listings will close on Wednesday October 10th at 10pm.</p>
                    <p class="card-text">Proxy bidding is allowed, and each auction has a bid extension system in place which will extend the run time of the auction if the auction is active and bids are placed within the last 10 minutes of the auction closing, so snipers beware!</p>
                </div>
            </div>
            <div class="card" style="margin-bottom: 15px">
                    <h5 class="card-header" style="background-color: crimson; color: white;">IMPORTANT NOTES</h5>
                <div class="card-body">
                    <p class="card-text">There is nothing in place to stop you bidding on, and in fact, winning, multiple auction lots. If this happens to you, here are the rules!</p>
                    <p class="card-text">1 - You must play the highest costing Auction ID pairing which you have won.</p>
                    <p class="card-text">2 - You have 24 hours from the end of the auction to find someone willing to take your addition ID pairing(s) you have won off you. They must match your winning bid price.</p>
                    <p class="card-text">3 - If you cannot find or do not want to find someone to take your excess ID pair(s), they will be offered to the highest bidder in that auction who has not already won a pairing at your final bid price.</p>
                    <p class="card-text">4 - If no-one takes your excess pairings, they are re-entered into a Lightning Round auction at the end of the main auction process to ensure all the IDs are sold.</p>
                </div>
            </div>
            <div class="card" style="margin-bottom: 15px">
                <h5 class="card-header" style="background-color: crimson; color: white;">PAYMENTS</h5>
                <div class="card-body">
                    <p class="card-text">32auctions does not take any payments from you. Once you have won an auction pairing, you have until up to the day of the event to make a donation matching your winning bid to the following page. Please ensure you do not make your donation anonymously so I can match the donation to the donor in my list of people who need to pay!</p>
                    <p class="card-text">Donations can be made at <a href="http://www.justgiving.com/CharityGift2018" target="_highwire">www.JustGiving.com/CharityGift2018</a></p>
                    <p class="card-text">You can also pay the total cost of your donation on the day in cash, though I would vastly prefer the option above as it means I do not have to walk around with a load of cash and then go visit a bank.</p>
                </div>
            </div>
        </div>
    </div>
        <table class="table table-striped table-responsive">
            <thead style="background-color: crimson; color: white;">
            <tr>
                <th scope="col">Pairing Name</th>
                <th scope="col">Picked By</th>
                <th scope="col">Corp ID</th>
                <th scope="col">Runner ID</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($pairings as $pairing)
                <tr>
                    <th scope="row">@if($pairing->link != '') <a href="{!! $pairing->link !!}" target="_new"> @endif {!! $pairing->team_name !!} </a></th>
                    <td>{!! $pairing->picker_name !!}</td>
                    <td>{!! $pairing->pick_corp !!}</td>
                    <td>{{ $pairing->pick_runn }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endsection