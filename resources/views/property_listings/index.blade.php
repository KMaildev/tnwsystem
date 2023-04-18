@extends('layouts.menus.marketing')
@section('content')
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        tfoot {
            display: table-header-group;
        }

        @media only screen and (max-width:800px) {

            #no-more-tables tbody,
            #no-more-tables tr,
            #no-more-tables td {
                display: block;
            }

            #no-more-tables thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            #no-more-tables td {
                position: relative;
                padding-left: 50%;
                border: none;
                border-bottom: 1px solid #eee;
            }

            #no-more-tables td:before {
                content: attr(data-title);
                position: absolute;
                left: 6px;
                font-weight: bold;
            }

            #no-more-tables tr {
                border-bottom: 1px solid #ccc;
            }
        }
    </style>

    <a href="{{ route('property_listings.create') }}" class="dt-button create-new btn btn-primary btn-sm">
        <span>
            <i class="bx bx-plus me-sm-2"></i>
            <span class="d-none d-sm-inline-block">Create</span>
        </span>
    </a>

    <div class="row justify-content-center" style="background-color: white;">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="table-responsive" id="no-more-tables">
                <table class="table table-bordered table-striped" id="datatable">
                    <thead class="tbbg">
                        <tr>
                            <th class="tbbg" rowspan="2" style="width: 1%;">
                                #
                            </th>

                            <th class="tbbg" rowspan="2" style="width: 10%; text-align: center;">
                                Marketing Name
                            </th>

                            <th class="tbbg" rowspan="2" style="width: 10%; text-align: center;">
                                Type
                            </th>

                            <th class="tbbg" rowspan="2" style="width: 10%; text-align: center;">
                                Date & Time
                            </th>

                            <th class="tbbg" rowspan="2" style="width: 10%; text-align: center;">
                                Code
                            </th>

                            <th class="tbbg" rowspan="2" style="width: 2%; text-align: center;">
                                No/အိမ်အမှတ်
                            </th>

                            <th class="tbbg" rowspan="2" style="width: 10%; text-align: center;">
                                Road/လမ်း
                            </th>

                            <th class="tbbg" rowspan="2" style="width: 10%; text-align: center;">
                                Ward/ရပ်ကွက်
                            </th>

                            <th class="tbbg" rowspan="2" style="width: 10%; text-align: center;">
                                Tsp/မြို့နယ်
                            </th>

                            <th class="tbbg" rowspan="2" style="width: 10%; text-align: center;">
                                Property Type
                            </th>

                            <th colspan="2"
                                style="color: white; background-color: #3f51b5; text-align: center; width: 10%">
                                Property Style
                            </th>

                            <th class="tbbg" rowspan="2" style="width: 10%; text-align: center;">
                                Price (Lakhs)
                            </th>

                            <th colspan="2"
                                style="width: 10%; text-align: center; background-color: green; color: white;">
                                Wide
                            </th>

                            <th colspan="2"
                                style="width: 10%; text-align: center; background-color: #c01faa; color: white;">
                                Permission
                            </th>

                            <th class="tbbg" rowspan="2" style="width: 10%; text-align: center;">
                                Owner/Agent
                            </th>

                            <th class="tbbg" rowspan="2" style="width: 10%; text-align: center;">
                                Name
                            </th>

                            <th class="tbbg" rowspan="2" style="width: 10%; text-align: center;">
                                Phone
                            </th>

                            <th class="tbbg" rowspan="2" style="width: 10%; text-align: center;">
                                Photo
                            </th>

                            <th class="tbbg" rowspan="2" style="width: 10%; text-align: center;">
                                Actions
                            </th>
                        </tr>

                        <tr>
                            <td style="color: white; background-color: #3f51b5; text-align: center; widht: 10%">
                                Floor
                            </td>

                            <td style="color: white; background-color: #3f51b5; text-align: center; widht: 10%">
                                House Style
                            </td>

                            <td style="color: white; background-color: green; text-align: center; widht: 100px">
                                Sqft
                            </td>

                            <td style="color: white; background-color: green; text-align: center; widht: 10%">
                                Acre
                            </td>

                            <td style="color: white; background-color: #c01faa; text-align: center; widht: 10%">
                                Premission
                            </td>

                            <td style="color: white; background-color: #c01faa; text-align: center; widht: 10%">
                                မူရင်း/မိတ္တူ
                            </td>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>
                                <input type="text" data-colum="0" placeholder="Search" hidden>
                            </th>
                            <th>
                                <input type="text" data-colum="1" placeholder="Search">
                                {{-- marketing_name --}}
                            </th>
                            <th>
                                <input type="text" data-colum="2" placeholder="Search">
                            </th>
                            <th>
                                <input type="text" data-colum="3" placeholder="Search">
                            </th>
                            <th>
                                <input type="text" data-colum="4" placeholder="Search">
                            </th>
                            <th>
                                <input type="text" data-colum="5" placeholder="Search">
                            </th>
                            <th>
                                <input type="text" data-colum="6" placeholder="Search">
                            </th>
                            <th>
                                <input type="text" data-colum="7" placeholder="Search">
                            </th>
                            <th>
                                <input type="text" data-colum="8" placeholder="Search">
                            </th>
                            <th>
                                <input type="text" data-colum="9" placeholder="Search">
                            </th>
                            <th>
                                <input type="text" data-colum="10" placeholder="Search">
                            </th>
                            <th>
                                <input type="text" data-colum="11" placeholder="Search">
                            </th>
                            <th>
                                <input type="text" data-colum="12" placeholder="Search">
                            </th>
                            <th>
                                <input type="text" data-colum="13" placeholder="Search">
                            </th>
                            <th>
                                <input type="text" data-colum="14" placeholder="Search">
                            </th>
                            <th>
                                <input type="text" data-colum="15" placeholder="Search">
                            </th>
                            <th>
                                <input type="text" data-colum="16" placeholder="Search">
                            </th>
                            <th>
                                <input type="text" data-colum="17" placeholder="Search">
                            </th>
                            <th>
                                <input type="text" data-colum="18" placeholder="Search">
                            </th>
                            <th>
                                <input type="text" data-colum="19" placeholder="Search" hidden>
                            </th>
                            <th>
                                <input type="text" data-colum="20" placeholder="Search" hidden>
                            </th>
                            <th>
                                <input type="text" data-colum="21" placeholder="Search" hidden>
                            </th>
                        </tr>
                    </tfoot>
                </table>
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
            ajax: {
                url: "{{ route('property_lists_datatable_marketing') }}",
                data: function(d) {
                    d.from = $('#start').val();
                    d.to = $('#to').val();
                }
            },

            lengthMenu: [70, 100, 250, 350, 450, 550, 650, 750, 850, 950, 1100, 1200, 1300],
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
                    data: 'owner_agent',
                    name: 'owner_agent'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'photo_status',
                    name: 'photo_status',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
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
