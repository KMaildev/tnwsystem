@extends('layouts.menus.sale_team')
@section('content')
    <div class="col-12 mb-4">
        @include('showing_property.shared.client_information')
        <br>
        <div class="card shadow-none text-center border mb-3">
            @include('showing_property.shared.link')

            <div class="tab-content">

            </div>
        </div>
    </div>
@endsection
