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
                    خدمات الشحن /
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
                    <form action="{{ route('shipping-services.update', ['shipping_service' => $shippingService->id]) }}"
                        data-parsley-validate="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" placeholder="الاسم" required=""
                                        type="text" value="{{ $shippingService->name }}">
                                </div>
                                @error('name')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="code" placeholder="الكود" required=""
                                        type="text" value="{{ $shippingService->code }}">
                                </div>
                                @error('code')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control" name="days" placeholder="ايام الشحن" required=""
                                        type="text" value="{{ $shippingService->days }} ">
                                </div>
                                @error('days')
                                    <div class="tx-danger">{{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mg-b-20">
                                <select class="form-control select1-no-search" name="branch_id">
                                    @isset($branches)
                                        <option value="{{ $shippingService->branch->id }}">
                                            {{ $shippingService->branch->branch_name }}
                                        </option>
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}">
                                                {{ $branch->branch_name }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                                @error('branch_id')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mg-b-20">
                                <select class="form-control select1-no-search" name="account_tahsel">
                                    <option value="{{ $shippingService->account_tahsel }}">
                                        {{ $shippingService->account_tahsel }}</option>
                                    @isset($agents)
                                        @foreach ($agents as $agent)
                                            <option value="{{ $agent->ahda_account }}">
                                                {{ $agent->ahda_account }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                                @error('ahda_account')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mg-b-20">
                                <select class="form-control select1-no-search" name="account_deliver">
                                    <option value="{{ $shippingService->account_deliver }}">
                                        {{ $shippingService->account_deliver }}</option>
                                    @isset($agents)
                                        @foreach ($agents as $agent)
                                            <option value="{{ $agent->ahda_account }}">
                                                {{ $agent->ahda_account }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                                @error('account_deliver')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mg-b-20">
                                <select class="form-control select1-no-search" name="agent_account">
                                    <option value="{{ $shippingService->agent_account }}">
                                        {{ $shippingService->agent_account }}</option>
                                    @isset($agents)
                                        @foreach ($agents as $agent)
                                            <option value="{{ $agent->ahda_account }}">
                                                {{ $agent->ahda_account }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                                @error('agent_account')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mg-b-20">
                                <select class="form-control select1-no-search" name="shipment_type">
                                    <option value="{{ $shippingService->shipment_type }}">
                                        {{ $shippingService->shipment_type }}
                                    </option>
                                    <option value="FBD|تسليم كامل الطرد">
                                        FBD|تسليم كامل الطرد
                                    </option>
                                    <option value="PDP|تسليم جزء الطرد">
                                        PDP|تسليم جزء الطرد
                                    </option>
                                    <option value="PTP|طرد مقابل طرد / إستبدال">
                                        PTP|طرد مقابل طرد / إستبدال
                                    </option>
                                    <option value="RTS|إسترجاع طرد">
                                        RTS|إسترجاع طرد
                                    </option>
                                    <option value="CLC|تحصيل أموال">
                                        CLC|تحصيل أموال
                                    </option>
                                </select>
                                @error('shipment_type')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-3 mg-lg-b-20 mg-lg-t-20">
                                <label class="ckbox"><input type="checkbox" name="status" checked
                                        value="1"><span>فعال</span></label>
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
