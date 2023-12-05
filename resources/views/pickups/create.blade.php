@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئيسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    قائمة طالبات الالتقاط/
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
                    <form action="{{ route('pickups.store') }}" data-parsley-validate="" method="POST">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-4">
                                <div class="form-group mg-b-0 ">
                                    <input class="form-control" name="code" placeholder="كود الاذن" required=""
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
                                <select class="form-control select1" data-placeholder="نوع الحركة" required=""
                                    name="type_of_movement">
                                    <option value="طلب التقاط - طلبات البيك أب">
                                        طلب التقاط - طلبات البيك أب
                                    </option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('type_of_movement')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="العميل" required=""
                                    name="customer_id">
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
                            <div class="parsley-select col-lg-4 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="مندوب الشحن" required=""
                                    name="agent_id" id="agent">
                                    <option label="مندوب الشحن ">
                                    </option>
                                    {{-- @isset($agents)
                                        @foreach ($agents as $agent)
                                            <option value="{{ $agent->id }}">
                                                {{ $agent->name }}
                                            </option>
                                        @endforeach
                                    @endisset --}}
                                </select>
                                {{-- <div id="slErrorContainer"></div> --}}
                                @error('agent_id')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="وسيلة النقل " required=""
                                    name="transport">
                                    <option label="وسيلة النقل  ">
                                    </option>
                                    <option value="موتوسيكل">موتوسيكل </option>
                                    <option value="سيارة">سيارة </option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('transport')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group mg-b-0 mg-lg-b-20">
                                    <input class="form-control" name="start_at" placeholder="من الساعة" required=""
                                        type="time">
                                </div>
                                @error('start_at')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group mg-b-0 mg-lg-b-20">
                                    <input class="form-control" name="end_at" placeholder="الى الساعة" required=""
                                        type="time">
                                </div>
                                @error('end_at')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="number_of_shipments" placeholder="عدد الشحنات "
                                        required="" type="text">
                                </div>
                                @error('number_of_shipments')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-3 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="الحالة " required=""
                                    name="status">
                                    <option label="الحالة  ">
                                    </option>
                                    <option value="قائمة الانتظار">قائمة الانتظار </option>
                                    <option value="تم اعلام المندوب">تم اعلام المندوب </option>
                                    <option value="تم الالتقاط">تم الالتقاط </option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('status')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="notes" placeholder="ملاحظات " required=""
                                        type="text">
                                </div>

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
@endsection
