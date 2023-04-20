@extends('layouts.menus.sale_team')
@section('content')
    <div class="col-12 mb-4">
        @include('showing_property.shared.client_information')
        <br>
        <div class="card shadow-none text-center border mb-3">
            @include('showing_property.shared.link')

            <div class="tab-content py-5">
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <form>
                        <div class="input-group">
                            <span class="input-group-text">
                                ဈေးနှုန်းဖြင့်ရှာပါ
                            </span>
                            <input type="text" class="form-control" id="start" placeholder="ဈေးနှုန်း (သိန်း)">
                            <input type="text" class="form-control" id="to" placeholder="ဈေးနှုန်း (အတွင်း)">
                            <button id="dateSearch" type="button" class="btn btn-primary"
                                aria-placeholder="ဈေးနှုန်း (အတွင်း)">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
                <br>
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="table-responsive" id="no-more-tables">
                        @include('showing_property.shared.property_list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            lengthChange: false,

            ajax: {
                url: "{{ route('property_lists_datatable_sale') }}",
                data: function(d) {
                    d.from = $('#start').val();
                    d.to = $('#to').val();
                }
            },

            lengthMenu: [50, 100, 250, 350, 450, 550, 650, 750, 850, 950, 1100, 1200, 1300],
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'marketing_name',
                    name: 'marketing_name'
                },
                {
                    data: 'offer_status',
                    name: 'offer_status'
                },
                {
                    data: 'marketing_date',
                    name: 'marketing_date'
                },
                {
                    data: 'code',
                    name: 'code'
                },
                {
                    data: 'no',
                    name: 'no'
                },
                {
                    data: 'road',
                    name: 'road'
                },
                {
                    data: 'ward',
                    name: 'ward'
                },
                {
                    data: 'township_name',
                    name: 'township_name'
                },
                {
                    data: 'property_type',
                    name: 'property_type'
                },
                {
                    data: 'floor',
                    name: 'floor'
                },
                {
                    data: 'house_style',
                    name: 'house_style'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'sqft',
                    name: 'sqft'
                },
                {
                    data: 'area',
                    name: 'area'
                },
                {
                    data: 'permission_type',
                    name: 'permission_type'
                },
                {
                    data: 'orginal_or_copy',
                    name: 'orginal_or_copy'
                },
                {
                    data: 'photo_status',
                    name: 'photo_status'
                },
            ],
        });

        $('#dateSearch').on('click', function() {
            table.draw();
        });

        $(document).ready(function() {
            $('#datatable thead th').each(function() {
                var title = $('#datatable thead th').eq($(this).index()).text();
            });
            var table = $('#datatable').DataTable();

            table.columns().eq(0).each(function(colIdx) {
                $('input', table.column(colIdx).footer()).on('change', function() {
                    table
                        .column(colIdx)
                        .search(this.value)
                        .draw();
                });
            });
        });
    </script>
@endsection
