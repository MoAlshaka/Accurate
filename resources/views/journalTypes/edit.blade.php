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
                <h4 class="content-title mb-0 my-auto">الرئيسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ أنواع
                    القيد المحاسبى
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
                    <form action="{{ route('journal-types.update', ['journal_type' => $journalType->id]) }}"
                        data-parsley-validate="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row row-sm">
                            <div class="col-6">
                                <div class="form-group mg-b-0">
                                    <input class="form-control" name="code" placeholder="الكود" required=""
                                        value="{{ $journalType->code }}" type="text">
                                </div>
                                @error('code')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" placeholder="الاسم" required=""
                                        value="{{ $journalType->name }}" type="text">
                                </div>
                                @error('name')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-6 col-md-8" id="slWrapper">
                                <select class="form-control select1" data-placeholder="اختر الفرع" required=""
                                    name="branch_id">
                                    @if ($journalType->branch_id !== null)
                                        <option value="{{ $journalType->branch->branch_id }}">
                                            {{ $journalType->branch->branch_name }}
                                        </option>
                                    @else
                                        <option label="اختر الفرع"></option>
                                        @isset($branches)
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->id }}">
                                                    {{ $branch->branch_name }}
                                                </option>
                                            @endforeach
                                        @endisset
                                    @endif
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('branch_id')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="parsley-select col-lg-6 col-md-8" id="slWrapper">
                                <select class="form-control select1" data-placeholder="المسلسل " required=""
                                    name="sersies">
                                    <option value="{{ $journalType->sersies }}">
                                        {{ $journalType->sersies }}
                                    </option>
                                    <option value="--">-- </option>
                                    <option value="--">-- </option>
                                    <option value="--">-- </option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('sersies')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-6 col-md-8 mg-lg-t-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="المرجع " required=""
                                    name="reference">
                                    <option value="{{ $journalType->reference }}">
                                        {{ $journalType->reference }}
                                    </option>
                                    <option value="--">-- </option>
                                    <option value="--">-- </option>
                                    <option value="--">-- </option>
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('reference')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 mg-t-20 mg-lg-t-20 mg-lg-b-20">
                                <label class="ckbox"><input checked type="checkbox" name="status"
                                        value="activity"><span>فعال
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
@endsection
