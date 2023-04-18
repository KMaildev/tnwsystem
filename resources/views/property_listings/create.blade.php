@extends('layouts.menus.marketing')
@section('content')
    <div class="row justify-content-center">

        <div class="col-xl-8 col-md-8 col-lg-8">
            <div class="card mb-4">
                <h5 class="card-header">
                    Add New Property
                </h5>
                <div class="card-body">
                    @include('property_listings.shared.add_new_form')
                </div>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="example-wrap">
                <div class="alert dark alert-icon alert-danger alert-dismissible" role="alert">
                    <i class="icon md-notifications" aria-hidden="true"></i>
                    This property has been already existed!
                </div>

                <h3 style="color: #DAA14B; text-shadow: 5px 5px 5px grey;">
                    Result: <span id="CountAlreadyProperty">0</span>
                </h3>

                <div class="example table-responsive">
                    <div id="AlreadyMarketingPropertyLists"></div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StorePropertyListing', '#create-form') !!}
    <script type="text/javascript">
        $(document).ready(function() {
            // 1 = Apartment
            // 2 = Condo
            // 3 = House
            $('select[name="property_type_id"]').on('change', function() {
                var propertyType = $(this).val();
                if (propertyType == 1) {
                    $("#FloorStatus").show();
                    $("#HouseStatus").hide();
                } else if (propertyType == 2) {
                    $("#FloorStatus").show();
                    $("#HouseStatus").hide();
                } else if (propertyType == 3) {
                    $("#FloorStatus").hide();
                    $("#HouseStatus").show();
                }

            });
            $("#FloorStatus").hide();
            $("#HouseStatus").hide();


            // Area 
            $('select[name="area_type"]').on('change', function() {
                var areaType = $(this).val();
                if (areaType === 'Sqft') {
                    $("#AreaWidthHeight").show();
                    $("#AreaResult").show();
                    $("#Area").hide();
                } else if (areaType === 'Acre') {
                    $("#AreaWidthHeight").hide();
                    $("#AreaResult").hide();
                    $("#Area").show();
                }
            });
            $("#Area").hide();


            // Premission
            $('select[name="permission_type"]').on('change', function() {
                var contractStatus = $(this).val();
                if (contractStatus === 'grant') {

                } else if (contractStatus === 'permit') {
                    $("#GrantType").hide();
                } else if (contractStatus === 'ancestral_land') {
                    $("#GrantType").hide();
                }
            });
            $("#Area").hide();


            $('input[name="offer_status"]').change(function() {
                var offerType = $(this).val();
                if (offerType === 'sale_offer') {
                    $("#RentOfferDiv").hide();
                } else if (offerType === 'rent_offer') {
                    $("#RentOfferDiv").show();
                } else if (offerType === 'buy_offer') {
                    $("#RentOfferDiv").hide();
                }
            });
            $("#RentOfferDiv").hide();

            // Rent Offer
            $('input[name="rent_offer_contract_status"]').change(function() {
                var permissionType = $(this).val();
                if (permissionType === 'monthly_contract') {
                    $("#DepositAmount").hide();
                } else if (permissionType === 'yearly_contract') {
                    $("#DepositAmount").hide();
                } else if (permissionType === 'deposit') {
                    $("#DepositAmount").show();
                }
            });
            $("#DepositAmount").hide();

            // Twonship Selected
            $('select[name="township_id"]').on('change', function() {
                var townshipId = $(this).val();
                var url = '{{ url('ward_list_ajax') }}';
                $.ajax({
                    method: 'GET',
                    url: url,
                    data: {
                        townshipId: townshipId,
                    },
                    success: function(data) {
                        let wardList = '';
                        $.each(JSON.parse(data), function(key, value) {
                            console.log(value.ward_no);
                            wardList += '<option value="' + value.ward_no + '">'
                        });
                        $('#WardList').html(wardList);
                    },
                    error: function(data) {
                        // location.reload();
                    }
                });
            });
        });


        var SqftResult = document.getElementById("SqftResult");

        function setAreaCalc() {
            var AreaWidth = document.getElementById("AreaWidth").value;
            var AreaHeight = document.getElementById("AreaHeight").value;
            var SqftResultTotal = parseInt(AreaWidth) * parseInt(AreaHeight);
            SqftResult.value = SqftResultTotal;
        }


        function getAlreadyMarketingProperty() {
            var No = document.getElementById("No").value;
            var WardNo = document.getElementById("WardNo").value;
            var Road = document.getElementById("Road").value;

            var url = '{{ url('already_live_filter_search') }}';
            $.ajax({
                method: 'GET',
                url: url,
                data: {
                    WardNo: WardNo,
                    Road: Road,
                    No: No,
                },
                success: function(data) {
                    let CountAlreadyPropertyNumber = 0;
                    let marketing = '';
                    $.each(JSON.parse(data), function(key, value) {
                        CountAlreadyPropertyNumber++;
                        var offer_status = value.offer_status;
                        var offer_status = offer_status.split('_').join(' ');
                        var offer_status = offer_status.toUpperCase();

                        marketing += '<table class="table">';
                        marketing += '<tr>';
                        marketing += '<th class="data-property">Date & Time</th>';
                        marketing += '<td class="data-value">' + value.marketing_date + '</td>'
                        marketing += '</tr>';

                        marketing += '<tr>';
                        marketing += '<th class="data-property">Type</th>';
                        marketing += '<td class="data-value">' + offer_status + '</td>'
                        marketing += '</tr>';


                        marketing += '<tr>';
                        marketing += '<th class="data-property">Code</th>';
                        marketing += '<td class="data-value">' + value.code + '</td>'
                        marketing += '</tr>';

                        marketing += '<tr>';
                        marketing += '<th class="data-property">No/အိမ်အမှတ်</th>';
                        marketing += '<td class="data-value">' + value.no + '</td>'
                        marketing += '</tr>';

                        marketing += '<tr>';
                        marketing += '<th class="data-property">Road/လမ်း</th>';
                        marketing += '<td class="data-value">' + value.road + '</td>'
                        marketing += '</tr>';

                        marketing += '<tr>';
                        marketing += '<th class="data-property">Ward/ရပ်ကွက်</th>';
                        marketing += '<td class="data-value">' + value.ward + '</td>'
                        marketing += '</tr>';

                        marketing += '<tr>';
                        marketing += '<th class="data-property">Price</th>';
                        marketing += '<td class="data-value">' + value.price + '</td>'
                        marketing += '</tr>';

                        marketing += '<tr>';
                        marketing += '<th class="data-property">Wide</th>';
                        marketing += '<td class="data-value">' + value.area_width * value
                            .area_height +
                            ' Sqft</td>'
                        marketing += '</tr>';


                        marketing += '<tr>';
                        marketing += '<th class="data-property">Owner/Agent</th>';
                        marketing += '<td class="data-value">' + value.owner_agent + '</td>'
                        marketing += '</tr>';


                        marketing += '<tr>';
                        marketing += '<th class="data-property">Action</th>';
                        marketing +=
                            '<td class="data-value"><a href="#" class="btn btn-primary btn-sm">View Detail</a></td>'
                        marketing += '</tr>';

                        marketing += '</table>';

                    });
                    $('#AlreadyMarketingPropertyLists').html(marketing);
                    document.getElementById('CountAlreadyProperty').textContent =
                        CountAlreadyPropertyNumber;
                },
                error: function(data) {
                    // location.reload();
                    document.getElementById('CountAlreadyProperty').textContent = 0;
                    $('#AlreadyMarketingPropertyLists').html('');
                }
            });
        }


        $('#tokenfield').tokenfield({
            createTokensOnBlur: true,
            beautify: true,
        })
    </script>
@endsection
