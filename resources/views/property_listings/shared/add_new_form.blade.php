<form action="{{ route('property_listings.store') }}" method="POST" autocomplete="off" id="create-form" role="form"
    enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <div class="form-check form-check-inline mt-3">
            <input class="form-check-input" type="radio" id="sale_offer" name="offer_status" value="sale_offer"
                checked />
            <label for="sale_offer">
                Sale Offer
            </label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="rent_offer" name="offer_status" value="rent_offer" />
            <label for="rent_offer">
                Rent Offer
            </label>
        </div>

        <div class="form-check form-check-inline" hidden>
            <input class="form-check-input" type="radio" id="buy_offer" name="offer_status" value="buy_offer" />
            <label for="buy_offer">
                Buy Offer
            </label>
        </div>
    </div>

    <br>
    <h6 class="mb-b fw-normal" style="color: #DAA14B; font-weight: bold; font-size: 19px;">
        1. Property Information
    </h6>
    <hr>

    <div class="mb-4 row">
        <label for="html5-text-input" class="col-md-3 col-form-label">
            Date
        </label>
        <div class="col-md-9">
            <input class="date_picker form-control @error('marketing_date') is-invalid @enderror" type="text"
                name="marketing_date" value="{{ old('marketing_date') }}" />
            @error('marketing_date')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div>
    </div>

    <div class="mb-4 row">
        <label for="html5-text-input" class="col-md-3 col-form-label">
            No / အိမ်အမှတ်
        </label>
        <div class="col-md-9">
            <input class="form-control @error('no') is-invalid @enderror" type="text" name="no"
                value="{{ old('no') }}" id="No" oninput="getAlreadyMarketingProperty()" />
            @error('no')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div>
    </div>

    <div class="mb-4 row">
        <label for="html5-text-input" class="col-md-3 col-form-label">
            Road / လမ်း
        </label>
        <div class="col-md-9">
            <input class="form-control @error('road') is-invalid @enderror" type="text" name="road"
                value="{{ old('road') }}" id="Road" oninput="getAlreadyMarketingProperty()" />
            @error('road')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- Township Group --}}
    <div class="mb-3 row">
        <label class="col-md-3 form-label">
            Township
        </label>
        <div class="col-md-3">
            <select class="select2 form-control form-control-lg" name="township_id">
                <option value="">--Select Township--</option>
                @foreach ($regions as $region)
                    <optgroup label="{{ $region->region ?? '' }}">
                        @foreach ($region->townships_table as $township)
                            <option value="{{ $township->id ?? '' }}">
                                - {{ $township->township ?? '' }}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
            @error('township_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-text">Ward</span>
                    <input list="WardList" class="form-control @error('ward') is-invalid @enderror" type="text"
                        name="ward" value="{{ old('ward') }}" id="WardNo"
                        oninput="getAlreadyMarketingProperty()" />
                    <datalist id="WardList"></datalist>
                    @error('ward')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    {{-- Property Type --}}
    <div class="mb-3 row">
        <label for="html5-text-input" class="col-md-3 col-form-label">
            Property Type
        </label>
        <div class="col-md-3">
            <select class="form-control" data-plugin="select2" name="property_type_id">
                <option value="">--Select Property Type--</option>
                @foreach ($property_types as $property_type)
                    <option value="{{ $property_type->id }}">
                        {{ $property_type->property_type ?? '' }}
                    </option>
                @endforeach
            </select>
            @error('property_type_id')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div>

        <div class="col-md-6" id="FloorStatus">
            <div class="input-group">
                <span class="input-group-text">Floor</span>
                <input list="floorList" class="form-control @error('floor') is-invalid @enderror" type="text"
                    name="floor" value="{{ old('floor') }}" />
                <datalist id="floorList">
                    <option value="Ground Floor">Ground Floor</option>
                    <option value="Penthouse">Penthouse</option>
                    @for ($i = 1; $i < 25; $i++)
                        <option value="{{ $i }}">
                    @endfor
                </datalist>
                @error('floor')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6" id="HouseStatus">
            <div class="input-group">
                <span class="input-group-text">House Style</span>
                <input list="HouseStyleList" class="form-control @error('house_style') is-invalid @enderror"
                    type="text" name="house_style" value="{{ old('house_style') }}" />
                <datalist id="HouseStyleList">
                    <option value="ပျဉ်ထောင်အိမ်">
                        ပျဉ်ထောင်အိမ်
                    </option>
                    <option value="RC">
                        RC
                    </option>
                    <option value="Steel Structure">
                        Steel Structure
                    </option>
                    <option value="Brick Nogging House">
                        Brick Nogging House
                    </option>
                    <option value="ပျဉ်ထောင် အုတ်တွဲ">
                        ပျဉ်ထောင် အုတ်တွဲ
                    </option>
                    <option value="ထရံအိမ်">
                        ထရံအိမ်
                    </option>
                </datalist>
                @error('house_style')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        </div>
    </div>

    {{-- Price --}}
    <div class="mb-4 row">
        <label for="html5-text-input" class="col-md-3 col-form-label">
            Price
        </label>
        <div class="col-md-3">
            <div class="input-daterange">
                <div class="input-group">
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" />
                    <span class="input-group-text">
                        Lakhs
                    </span>
                </div>
                @error('price')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        </div>
    </div>

    {{-- Rent Offer --}}
    <div class="py-5 row" id="RentOfferDiv">
        <br>
        <div class="col-md-12">
            <h6 class="mb-b fw-normal" style="color: #DAA14B; font-weight: bold; font-size: 19px;">
                3. Rent Offer
            </h6>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-control-label">
                        Contract Status
                    </label>
                    <div class="form-group">
                        <div class="form-check form-check-inline mt-3">
                            <input type="radio" id="MolthlyContract" name="rent_offer_contract_status"
                                value="monthly_contract" class="form-check-input" />
                            <label for="MolthlyContract">
                                လချုပ်
                            </label>
                        </div>

                        <div class="form-check form-check-inline mt-3">
                            <input type="radio" id="YearlyContracy" name="rent_offer_contract_status"
                                value="yearly_contract" class="form-check-input" />
                            <label for="YearlyContracy">
                                နှစ်ချုပ်
                            </label>
                        </div>

                        <div class="form-check form-check-inline mt-3">
                            <input type="radio" id="Deposit" name="rent_offer_contract_status" value="deposit"
                                class="form-check-input" />
                            <label for="Deposit">
                                Deposit
                            </label>
                        </div>
                        @error('rent_offer_contract_status')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row py-4" id="DepositAmount">
                <div class="col-md-4">
                    <div class="input-daterange">
                        <div class="input-group">
                            <span class="input-group-text">
                                Deposit Amount
                            </span>
                            <input type="text" class="form-control @error('deposit_amount') is-invalid @enderror"
                                name="deposit_amount" value="0" />
                            @error('deposit_amount')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Area --}}
    <div class="py-2 row">
        <div class="col-md-12">
            <h6 class="mb-b fw-normal" style="color: #DAA14B; font-weight: bold; font-size: 19px;">
                2. Area Specifications
            </h6>
            <hr>
            <div class="row">
                <div class="col-md-5">
                    <div class="input-daterange" id="AreaWidthHeight">
                        <div class="input-group">
                            <span class="input-group-text">W</span>
                            <input type="text" class="form-control" name="area_width" id="AreaWidth"
                                oninput="setAreaCalc()" value="0" />
                            @error('area_width')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror

                            <span class="input-group-text">H</span>
                            <input type="text" class="form-control" name="area_height" id="AreaHeight"
                                oninput="setAreaCalc()" value="0" />
                            @error('area_height')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>

                    <div class="input-daterange" id="Area">
                        <div class="input-group">
                            <input type="text" class="form-control" name="area" value="0" />
                            @error('area_height')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="col-md-2" id="AreaTypeStatus">
                    <div class="row">
                        <div class="input-group">
                            <div class="col-md-12">
                                <select class="form-control" name="area_type" style="width: 100%">
                                    <option value="Sqft">
                                        Sqft
                                    </option>
                                    <option value="Acre">
                                        Acre
                                    </option>
                                </select>
                                @error('area_type')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" id="AreaResult">
                    <div class="input-daterange">
                        <div class="input-group">
                            <input type="text" class="form-control" id="SqftResult" readonly value="0" />
                            <span class="input-group-text">
                                Sqft
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Property Specifications --}}
    <br>
    <div class="py-2 row">
        <div class="col-md-12">
            <h6 class="mb-b fw-normal" style="color: #DAA14B; font-weight: bold; font-size: 19px;">
                3. Property Specifications
            </h6>
            <hr>
            <div class="row" id="Apartment">
                <div class="col-md-4" id="BCCStatus" style="background-color: #a5873b;">
                    <label class="form-control-label text-white">
                        BCC Status
                    </label>
                    <div class="form-group py-2">
                        <div class="form-check form-check-inline">
                            <input type="radio" id="BCCTrue" name="bcc_status" value="true"
                                class="form-check-input" />
                            <label for="BCCTrue" class="text-white">
                                BCC ကျပြီး
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="radio" id="BCCFalse" name="bcc_status" value="false"
                                class="form-check-input" />
                            <label for="BCCFalse" class="text-white">
                                BCC မကျပြီး
                            </label>
                        </div>
                        @error('bcc_status')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror

                    </div>
                </div>

                <div class="col-md-4" id="OwnerStatus" style="background-color: #57461e;">
                    <label class="form-control-label text-white">
                        Owner Status
                    </label>
                    <div class="form-group py-2">
                        <div class="form-check form-check-inline">
                            <input type="radio" id="OwnLand" name="owner_status" value="မြေရှင်"
                                class="form-check-input" />
                            <label for="OwnLand" class="text-white">
                                မြေရှင်
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="radio" id="OwnApartent" name="owner_status" value="တိုက်ခန်း"
                                class="form-check-input" />
                            <label for="OwnApartent" class="text-white">
                                တိုက်ခန်း
                            </label>
                        </div>

                        @error('owner_status')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>
                </div>


                <div class="col-md-4" id="ListStatus" style="background-color: #9c7d34;">
                    <label class="form-control-label text-white">
                        Lift Status (ဓာတ်လှေကား)
                    </label>
                    <div class="form-group py-2">
                        <div class="form-check form-check-inline">
                            <input type="radio" id="ListTrue" name="lift_status" value="Yes"
                                class="form-check-input" />
                            <label for="ListTrue" class="text-white">
                                ပါ
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="radio" id="ListFalse" name="lift_status" value="No"
                                class="form-check-input" />
                            <label for="ListFalse" class="text-white">
                                မပါ
                            </label>
                        </div>
                    </div>
                </div>


                <div class="col-md-4" style="background-color: #daa14b;">
                    <div class="form-group form-material">
                        <label class="form-control-label text-white">
                            Status
                        </label>
                        <div class="form-group py-2">
                            <div class="form-check form-check-inline">
                                <input type="radio" id="Hall" name="property_status" value="Hall"
                                    class="form-check-input" />
                                <label for="Hall" class="text-white">
                                    Hall
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" id="Bedroom" name="property_status" value="Bedroom"
                                    class="form-check-input" />
                                <label for="Bedroom" class="text-white">
                                    အိပ်ခန်း
                                </label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4" id="ExtraChargeStatus" style="background-color: #2d2a26;">
                    <div class="form-group form-material">
                        <label class="form-control-label text-white">
                            Extra Charge
                        </label>
                        <div class="form-group py-2">
                            <div class="form-check form-check-inline">
                                <input type="radio" id="ExtraChargeTrue" name="extra_charge" value="Yes"
                                    class="form-check-input" />
                                <label for="ExtraChargeTrue" class="text-white">
                                    ပါ
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" id="ExtraChargeFalse" name="extra_charge" value="No"
                                    class="form-check-input" />
                                <label for="ExtraChargeFalse" class="text-white">
                                    မပါ
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Room Specifications --}}
    <div class="row py-3">
        <div class="col-md-12">
            <h6 class="mb-b fw-normal" style="color: #DAA14B; font-weight: bold; font-size: 19px;">
                4. Room Specifications
            </h6>
            <hr>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text">Rooms</span>
                            <input class="form-control @error('rooms') is-invalid @enderror" type="text"
                                name="rooms" value="{{ old('rooms') }}" />
                            @error('rooms')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text">Shrine</span>
                            <input class="form-control @error('shrine') is-invalid @enderror" type="text"
                                name="shrine" value="{{ old('shrine') }}" />
                            @error('shrine')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text">Bathrooms</span>
                            <input class="form-control @error('bathrooms') is-invalid @enderror" type="text"
                                name="bathrooms" value="{{ old('bathrooms') }}" />
                            @error('bathrooms')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text">Dining</span>
                            <input class="form-control @error('dining') is-invalid @enderror" type="text"
                                name="dining" value="{{ old('dining') }}" />
                            @error('dining')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text">Living</span>
                            <input class="form-control @error('living') is-invalid @enderror" type="text"
                                name="living" value="{{ old('living') }}" />
                            @error('living')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text">Bedrooms</span>
                            <input class="form-control @error('bedrooms') is-invalid @enderror" type="text"
                                name="bedrooms" value="{{ old('bedrooms') }}" />
                            @error('bedrooms')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text">Master Bedrooms</span>
                            <input class="form-control @error('master_bedrooms') is-invalid @enderror" type="text"
                                name="master_bedrooms" value="{{ old('master_bedrooms') }}" />
                            @error('master_bedrooms')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text">Other</span>
                            <input class="form-control @error('other_rooms') is-invalid @enderror" type="text"
                                name="other_rooms" value="{{ old('other_rooms') }}" />
                            @error('other_rooms')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Permission --}}
    <div class="py-2 row">
        <div class="col-md-12">
            <h6 class="mb-b fw-normal" style="color: #DAA14B; font-weight: bold; font-size: 19px;">
                5. Premission
            </h6>
            <hr>
        </div>
        <label for="html5-text-input" class="col-md-2 col-form-label">
            Premission
        </label>
        <div class="col-md-3">
            <select class="form-control" name="permission_type">
                <option value="">
                    -- Select Premission --
                </option>
                <option value="grant">
                    ဂရံ
                </option>
                <option value="permit">
                    Permit
                </option>
                <option value="ancestral_land">
                    ဘိုးဘွားပိုင်မြေ
                </option>
            </select>
            @error('permission_type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- id="GrantType" --}}
        <div class="col-md-3">
            <div class="row">
                <div class="input-group">
                    <div class="col-md-12">
                        <select class="form-control" name="grant_type" style="width: 100%">
                            <option value="">-- Select --</option>
                            <option value="အမည်ပေါက်">
                                အမည်ပေါက်
                            </option>
                            <option value="SP">
                                SP
                            </option>
                            <option value="GP">
                                GP
                            </option>
                        </select>
                        @error('grant_type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 py-2">
            <div class="form-group">
                <div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="Orginal" name="orginal_or_copy" value="Orginal"
                            class="form-check-input" />
                        <label for="Orginal">
                            မူရင်း
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input type="radio" id="Copy" name="orginal_or_copy" value="Copy"
                            class="form-check-input" />
                        <label for="Copy">
                            မိတ္တူ
                        </label>
                    </div>

                    @error('orginal_or_copy')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
        </div>

    </div>


    {{-- Owner & Agent Info --}}
    <br>
    <div class="py-3 row">
        <div class="col-md-12">
            <h6 class="mb-b fw-normal" style="color: #DAA14B; font-weight: bold; font-size: 19px;">
                6. Owner / Agent Info
            </h6>
            <hr>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <div>
                    <div class="form-check form-check-inline mt-3">
                        <input type="radio" id="Owner" name="owner_agent" value="Owner" checked
                            class="form-check-input" />
                        <label for="Owner">
                            Owner
                        </label>
                    </div>

                    <div class="form-check form-check-inline mt-3">
                        <input type="radio" id="Agent" name="owner_agent" value="Agent"
                            class="form-check-input" />
                        <label for="Agent">
                            Agent
                        </label>
                    </div>

                    @error('owner_agent')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
            <br>

            <div class="mb-4 row">
                <label for="html5-text-input" class="col-md-3 col-form-label">
                    Name
                </label>
                <div class="col-md-9">
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                        value="{{ old('name') }}" />
                    @error('name')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 row">
                <label for="html5-text-input" class="col-md-3 col-form-label">
                    Phone
                </label>
                <div class="col-md-9">
                    <input class="token-example-field form-control @error('phone') is-invalid @enderror"
                        type="text" name="phone" value="{{ old('phone') }}" data-plugin="tokenfield"
                        id="tokenfield" />
                    @error('phone')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 row">
                <label for="html5-text-input" class="col-md-3 col-form-label">
                    Email
                </label>
                <div class="col-md-9">
                    <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
                        value="{{ old('email') }}" />
                    @error('email')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 row">
                <label for="html5-text-input" class="col-md-3 col-form-label">
                    Address
                </label>
                <div class="col-md-9">
                    <input class="form-control @error('address') is-invalid @enderror" type="text" name="address"
                        value="{{ old('address') }}" />
                    @error('address')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 row">
                <label for="html5-text-input" class="col-md-3 col-form-label">
                    Remark
                </label>
                <div class="col-md-9">
                    <input class="form-control @error('remark') is-invalid @enderror" type="text" name="remark"
                        value="{{ old('remark') }}" />
                    @error('remark')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <label for="html5-search-input" class="col-md-3 col-form-label"></label>
                <div class="col-md-9">
                    <button type="submit" class="btn btn-primary">
                        <span class="tf-icons fa fa-edit me-1"></span>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
