@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرئيسية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    الشكاوى/ تعديل</span>
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
                    <form action="{{ route('teams.update', ['team' => $team->id]) }}" data-parsley-validate=""
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row row-sm">
                            <div class="col-6 mg-lg-b-20">
                                <div class="form-group">
                                    <input class="form-control" name="code" placeholder="الكود" type="text"
                                        value="{{ $team->code }}">
                                </div>
                            </div>
                            <div class="col-6 mg-lg-b-20">
                                <div class="form-group">
                                    <input class="form-control" name="name" placeholder="الاسم" type="text"
                                        required="" value="{{ $team->name }}">
                                </div>
                                @error('name')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="parsley-select col-lg-6 col-md-8 mg-lg-b-20" id="slWrapper">
                                <select class="form-control select1" data-placeholder="قسم الدعم" required=""
                                    name="support_cate_id">
                                    <option value="{{ $team->supportCate->id }}">
                                        {{ $team->supportCate->name }}
                                    </option>
                                    @isset($supportCates)
                                        @foreach ($supportCates as $supportCate)
                                            <option value="{{ $supportCate->id }}">
                                                {{ $supportCate->name }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                                <div id="slErrorContainer"></div>
                                @error('support_cate_id')
                                    <div class="tx-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            {{-- <label class="ckbox mg-b-5">
                                            <input data-parsley-class-handler="#cbWrapper2"
                                                data-parsley-errors-container="#cbErrorContainer2" data-parsley-mincheck="2"
                                                name="users[]" required="" type="checkbox" value="{{ $user->id }}">

                                                <span>{{ $user->name }}</span> --}}
                            <div class="col-lg-12 mg-t-20 mg-lg-b-20 mg-lg-t-20">
                                <p class="mg-b-10">الاعضاء </p>
                                @isset($users)
                                    @foreach ($users as $user)
                                        <label class="ckbox"><input type="checkbox" name="users[]"
                                                value="{{ $user->id }}"><span> {{ $user->name }}</span></label>
                                    @endforeach
                                @endisset
                            </div>


                            <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10"
                                    type="submit">إضافة</button></div>
                        </div>
                    </form>
                </div>
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
@endsection
