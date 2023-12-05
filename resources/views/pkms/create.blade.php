@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئيسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    قوائم الالتقاط/
                    إضافة
                </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        إنشاء
                    </div>
                    <form action="{{ route('pkms.store') }}" data-parsley-validate="" method="POST">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-4">
                                <div class="form-group mg-b-0 ">
                                    <input class="form-control" name="code" placeholder="كود القائمة" required=""
                                        type="text">
                                </div>
                                @error('code')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control" name="date" placeholder="التاريخ" required=""
                                        type="date">
                                </div>
                                @error('date')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="اختر الفرع" required=""
                                    name="branch_id" id="branch_id">
                                    <option label="اختر الفرع ">
                                    </option>
                                    @isset($branches)
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}">
                                                {{ $branch->branch_name }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('branch_id')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="مندوب الشحن" required=""
                                    name="agent_id" id="agent">
                                    <option label="مندوب الشحن ">
                                    </option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('agent_id')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="خط السير" required=""
                                    name="route_id">
                                    <option label="خط السير ">
                                    </option>
                                    @isset($routes)
                                        @foreach ($routes as $route)
                                            <option value="{{ $route->id }}">
                                                {{ $route->name }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('route_id')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="نوع الحركة" required=""
                                    name="type_of_movement">
                                    <option value="قائمة إلتقاط شاحنة">
                                        قائمة إلتقاط شاحنة
                                    </option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('type_of_movement')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="العميل" required=""
                                    name="customer_id" id="customer_id">
                                    <option label="العميل ">
                                    </option>
                                    @isset($customers)
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">
                                                {{ $customer->name }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('customer_id')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-8">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="notes" placeholder="ملاحظات " required=""
                                        type="text">
                                </div>
                            </div>
                            <h3 id="numShipments">عدد الشحنات</h3>
                            <table class="table key-buttons text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الكود</th>
                                        <th>اسم الراسل</th>
                                        <th> المصدر</th>
                                        <th>عنوان الراسل</th>
                                        <th>نوع الطلب</th>
                                        <th>وصف الطرد</th>
                                        <th>قيمة الطرد</th>
                                        <th>عدد القطع</th>
                                        <th> الوزن</th>
                                        <th> المبلغ الواجب تحصيلة</th>
                                    </tr>
                                </thead>
                                <tbody id="shipments">

                                </tbody>
                            </table>
                            <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20">
                                <label class="ckbox"><input checked type="checkbox" name="type"
                                        value="1"><span>معتمد
                                    </span></label>
                            </div>
                            <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10"
                                    type="submit">إضافة</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Select2 js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal  Parsley.min js -->
    <script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('select[name="branch_id"]').on('change', function() {
                var TypeId = $(this).val();
                let url = "{{ URL::to('admin/agent') }}/" + TypeId;

                if (TypeId) {
                    $.ajax({
                        url: url,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#agent').empty();
                            $.each(data, function(key, value) {
                                $('#agent').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('select[name="customer_id"]').on('change', function() {
                var TypeId = $(this).val();
                let url = "{{ URL::to('admin/shipment') }}/" + TypeId;

                if (TypeId) {
                    $.ajax({
                        url: url,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#numShipments').empty();
                            $('#numShipments').append('<h3> عدد الشحنات = ' + `${data.length}` +
                                '</h3>');
                            $('#shipments').empty();
                            for (shipment of data) {
                                $('#shipments').append('<tr>' +
                                    '<td>' + '<input type="checkbox" name="shipment_id[]"' +
                                    ' value="' + `${shipment.id}` + '">' + '</td>' +
                                    '<td>' + `${shipment.id}` + '</td>' +
                                    '<td>' + `${shipment.sender_name}` + '</td>' +
                                    '<td>' +
                                    `${shipment.sender_city}` + ' ' +
                                    `${shipment.sender_zone}` +
                                    '</td>' +
                                    '<td>' + `${shipment.sender_address}` + '</td>' +
                                    '<td>' + `${shipment.request_type}` + '</td>' +
                                    '<td>' + `${shipment.package_desc}` + '</td>' +
                                    '<td>' + `${shipment.package_price}` + '</td>' +
                                    '<td>' + `${shipment.piece_number}` + '</td>' +
                                    '<td>' + `${shipment.weight}` + '</td>' +
                                    '<td>' + `${shipment.id}` + '</td>' +
                                    '</tr>');
                            }

                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });
    </script>
@endsection
