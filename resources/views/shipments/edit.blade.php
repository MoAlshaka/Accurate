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
                <h4 class="content-title mb-0 my-auto">الرئيسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الشحنة
                    /
                    تعديل
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
                        تعديل
                    </div>
                    <form action="{{ route('shipments.update', ['shipment' => $shipment->id]) }}" data-parsley-validate=""
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row row-sm">
                            <div class="col-4">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="date" required="" type="text"
                                        value="{{ $shipment->date }}">
                                </div>
                                @error('date')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control" name="shipment_number" placeholder="رقم الشحنة"
                                        required="" value="{{ $shipment->shipment_number }}" type="text">
                                </div>
                                @error('shipment_number')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8" id="slWrapper">
                                <select class="form-control select1" data-placeholder="اختر الفرع" required=""
                                    name="branch_id">
                                    <option value="{{ $shipment->branch->branch_id }}">
                                        {{ $shipment->branch->branch_name }}
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
                            <div class="parsley-select col-lg-4 col-md-8" id="slWrapper">
                                <select class="form-control select1" data-placeholder="نوع الحركة " required=""
                                    name="type_of_movement">
                                    <option value="{{ $shipment->type_of_movement }}">
                                        {{ $shipment->type_of_movement }}
                                    </option>
                                    <option value="طلب شحن - بوليصة شحن">
                                        طلب شحن - بوليصة شحن
                                    </option>

                                </select>
                                <div id="slErrorContainer"></div>
                                @error('type_of_movement')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8" id="slWrapper">
                                <select class="form-control select1" data-placeholder="نوع الطلب" required=""
                                    name="request_type">
                                    <option value="{{ $shipment->request_type }}">
                                        {{ $shipment->request_type }}
                                    </option>
                                    <option value="طلب شحن - بوليصة شحن">
                                        طلب شحن - بوليصة شحن
                                    </option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('request_type')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control" name="package_desc" placeholder=" وصف الطرد" required=""
                                        value="{{ $shipment->package_desc }}" type="text">
                                </div>
                                @error('package_desc')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <input class="form-control" name="weight" placeholder="الوزن " required=""
                                        value="{{ $shipment->weight }}" type="number">
                                </div>
                                @error('weight')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <input class="form-control" name="long" placeholder="الطول" required=""
                                        value="{{ $shipment->long }}" type="number">
                                </div>
                                @error('long')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <input class="form-control" name="width" placeholder="العرض" required=""
                                        value="{{ $shipment->width }}" type="number">
                                </div>
                                @error('width')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <input class="form-control" name="high" placeholder="الإرتفاع" required=""
                                        value="{{ $shipment->high }}" type="number">
                                </div>
                                @error('high')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control" name="piece_number" placeholder="عددالقطع"
                                        required="" value="{{ $shipment->piece_number }}" type="number">
                                </div>
                                @error('piece_number')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="وسيلة الدفع " required=""
                                    name="payment_method">
                                    <option value="{{ $shipment->payment_method }}"> {{ $shipment->payment_method }}
                                    </option>
                                    <option value="حساب بنكى"> حساب بنكى </option>
                                    <option value="فوداقون كاش"> فوداقون كاش</option>
                                    <option value="نقدى">نقدى </option>
                                    <option value="مقر الشركة">مقر الشركة </option>

                                </select>
                                <div id="slErrorContainer"></div>
                                @error('payment_method')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control" name="package_price" placeholder="قيمة الطرد"
                                        required="" value="{{ $shipment->package_price }}" type="number">
                                </div>
                                @error('package_price')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="parsley-select col-lg-4 col-md-8" id="slWrapper">
                                <select class="form-control select1" data-placeholder="نوع السعر" required=""
                                    name="account_type">
                                    <option value="{{ $shipment->account_type }}">{{ $shipment->account_type }}
                                    </option>
                                    <option value="شامل مصاريف الشحن"> شامل مصاريف الشحن </option>
                                    <option value="غير شامل مصاريف الشحن"> غير شامل مصاريف الشحن </option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('account_type')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control" name="margay_number" placeholder=" الرقم المرجعى"
                                        required="" value="{{ $shipment->margay_number }}" type="text">
                                </div>
                                @error('margay_number')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="إمكانية فتح الطرد " required=""
                                    name="package_open">
                                    <option value="{{ $shipment->package_open }}">{{ $shipment->package_open }} </option>
                                    <option value="غير مسموح بفتح الطرد"> غير مسموح بفتح الطرد</option>
                                    <option value="مسموح بفتح الطرد"> مسموح بفتح الطرد </option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('package_open')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="notes" placeholder="ملاحظات " required=""
                                        value="{{ $shipment->notes }}" type="text">
                                </div>
                                @error('notes')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="main-content-label mg-b-10 col-12">
                                تفاصيل الراسل
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8" id="slWrapper">
                                <select class="form-control select1" data-placeholder="العميل" required=""
                                    name="customer_id">
                                    <option value="{{ $shipment->customer->id }}">
                                        {{ $shipment->customer->name }}
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
                            <div class="col-4">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="sender_name" placeholder="اسم الراسل"
                                        required="" value="{{ $shipment->sender_name }}" type="text">
                                </div>
                                @error('sender_name')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-4 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="الخدمة " required=""
                                    name="service">
                                    <option value="{{ $shipment->service }}">{{ $shipment->service }}</option>
                                    <option value="تاجر"> تاجر</option>
                                    <option value="شركة"> شركة</option>
                                    <option value="مصنع"> مصنع</option>
                                    <option value="سوبرماركت"> سوبرماركت</option>
                                    <option value="اونلاين استور"> اونلاين استور</option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('service')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="sender_city" placeholder="المدينة" required=""
                                        value="{{ $shipment->sender_city }}" type="text">
                                </div>
                                @error('sender_city')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control" name="sender_zone" placeholder="المنطقة" required=""
                                        value="{{ $shipment->sender_zone }}" type="text">
                                </div>
                                @error('sender_zone')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control" name="sender_address" placeholder="العنوان"
                                        required="" value="{{ $shipment->sender_address }}" type="text">
                                </div>
                                @error('sender_address')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="sender_phone" placeholder="رقم التلفون "
                                        required="" value="{{ $shipment->sender_phone }}" type="text">
                                </div>
                                @error('sender_phone')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="sender_mobile" placeholder="رقم المحمول "
                                        required="" value="{{ $shipment->sender_mobile }}" type="text">
                                </div>
                                @error('sender_mobile')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="main-content-label mg-b-10 mg-t-10 col-12">
                                بيانات المستلم
                            </div>

                            <div class="col-4">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="receiver_name" placeholder="اسم المستلم"
                                        required="" value="{{ $shipment->receiver_name }}" type="text">
                                </div>
                                @error('receiver_name')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="receiver_city" placeholder="المدينة"
                                        required="" value="{{ $shipment->receiver_city }}" type="text">
                                </div>
                                @error('receiver_city')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control" name="receiver_zone" placeholder="المنطقة"
                                        required="" value="{{ $shipment->receiver_zone }}" type="text">
                                </div>
                                @error('receiver_zone')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input class="form-control" name="receiver_address" placeholder="العنوان"
                                        required="" value="{{ $shipment->receiver_address }}" type="text">
                                </div>
                                @error('receiver_address')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="receiver_phone" placeholder="رقم التلفون "
                                        required="" value="{{ $shipment->receiver_phone }}" type="text">
                                </div>
                                @error('receiver_phone')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="receiver_mobile" placeholder="رقم المحمول "
                                        required="" value="{{ $shipment->receiver_mobile }}" type="text">
                                </div>
                                @error('receiver_mobile')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
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
@endsection
