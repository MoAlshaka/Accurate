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
                <h4 class="content-title mb-0 my-auto">الرئيسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الخزينة
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
                    <form action="{{ route('safes.update', ['safe' => $safe->id]) }}" data-parsley-validate=""
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="code" placeholder="الكود" required=""
                                        value="{{ $safe->code }}" type="text">
                                </div>
                                @error('code')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" placeholder="الاسم" required=""
                                        value="{{ $safe->name }}" type="text">
                                </div>
                                @error('name')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-6 col-md-8" id="slWrapper">
                                <select class="form-control select1" data-placeholder="اختر الفرع" required=""
                                    name="branch_id">
                                    <option value="{{ $safe->branch->branch_id }}">
                                        {{ $safe->branch->branch_name }}
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
                            <div class="parsley-select col-lg-6 col-md-8" id="slWrapper">
                                <select class="form-control select1" data-placeholder="امين الخزينة " required=""
                                    name="user_id">
                                    <option value="{{ $safe->user->id }}">
                                        {{ $safe->user->name }}
                                    </option>
                                    @isset($users)
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('branch_id')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20">
                                <label class="ckbox"><input checked type="checkbox" name="status"
                                        value="activity"><span>فعال
                                    </span></label>
                            </div>
                            <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20">
                                <label class="ckbox"><input checked type="checkbox" name="deposit"
                                        value="activity"><span>إيداع
                                    </span></label>
                            </div>
                            <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20">
                                <label class="ckbox"><input checked type="checkbox" name="incoming_transfer"
                                        value="activity"><span>تحويل وارد
                                    </span></label>
                            </div>
                            <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20">
                                <label class="ckbox"><input checked type="checkbox" name="withdraw"
                                        value="activity"><span>سحب
                                    </span></label>
                            </div>
                            <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20">
                                <label class="ckbox"><input checked type="checkbox" name="outgoing_transfer"
                                        value="activity"><span>تحويل صادر
                                    </span></label>
                            </div>
                            <div class="col-12 mg-lg-t-20"> نوع الدفع
                                <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20 ">
                                    <label class="ckbox"><input checked type="checkbox" name="colc"
                                            value="1"><span>واجبة التحصيل
                                        </span></label>
                                </div>
                                <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20 ">
                                    <label class="ckbox"><input checked type="checkbox" name="crdt"
                                            value="1"><span>
                                            اجلة-بريد
                                        </span></label>
                                </div>
                                <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20 ">
                                    <label class="ckbox"><input checked type="checkbox" name="cash"
                                            value="1"><span>
                                            مسددة نقدا
                                        </span></label>
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
@endsection
