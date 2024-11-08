@extends('adminlte::page')

@section('title', '元請け編集')

@section('content_header')
    <h1>元請け編集</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-primary">

                @if ($mode == config('const.editmode.create'))
                {{Form::open(['method'=>'post', 'id'=>'edit_form', 'route' => 'admin.company.update'])}}
                @else
                {{Form::open(['method'=>'post', 'id'=>'edit_form', 'route' => ['admin.company.update', $company->id] ])}}
                @endif
                    <input type="hidden" name="mode" id="mode" value="{{ $mode }}">



                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">社名</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="株式会社 ○○建設" value="{{ old('name', $company->name) }}">
                            @if ($errors->has('name'))
                            <code>{{ $errors->first('name') }}</code>
                            @endif
                        </div>
                        <div class="form-group h-adr">
                            <span class="p-country-name" style="display:none;">Japan</span>
                            <label for="name">住所</label>
                            <div class="row mb-2">
                                <div class="col-lg-2 col-md-3">
                                    <label class="" for="zip">郵便番号</label>
                                </div>
                                <div class="col-lg-3 col-md-5 col-sm-5">
                                    <input type="text" class="form-control p-postal-code" name="zip" id="zip" placeholder="1000001" maxlength="8" value="{{ old('zip', $company->zip) }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-2 col-md-3">
                                    <label class="" for="pref">都道府県</label>
                                </div>
                                <div class="col-lg-3 col-md-5 col-sm-5">
                                    <input type="text" class="form-control p-region" name="pref" id="pref" placeholder="○○県" maxlength="10" value="{{ old('pref', $company->pref) }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-2 col-md-3">
                                    <label class="" for="address1">市区町村</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control p-locality" name="address1" id="address1" placeholder="○○町" maxlength="50" value="{{ old('address1', $company->address1) }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-2 col-md-3">
                                    <label class="" for="address2">町名番地</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control p-street-address p-extended-address" name="address2" id="address2" placeholder="○○ 123-45" maxlength="50" value="{{ old('address2', $company->address2) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel">電話番号</label>
                            <input type="text" class="form-control" name="tel" id="tel" placeholder="03-1234-5678" value="{{ old('tel', $company->tel) }}">
                            @if ($errors->has('tel'))
                            <code>{{ $errors->first('tel') }}</code>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="memo">メモ</label>
                            <textarea class="form-control" name="memo" id="memo" placeholder="" rows="8">{{ old('memo', $company->memo) }}</textarea>
                            @if ($errors->has('memo'))
                            <code>{{ $errors->first('memo') }}</code>
                            @endif
                        </div>
                    </div>



                    <div class="card-footer">
                        <button type="submit" id="commit_btn" class="btn btn-primary">登録</button>
                        <button type="button" id="" class="btn btn-default back_btn float-right" onclick="location.href='{{ route('admin.company.index') }}'">戻る</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>





@stop

@section('css')
<link rel="stylesheet" href="{{ asset( cacheBusting('css/common.css') ) }}">
@stop

@section('js')
<script src="{{ asset( cacheBusting('js/common.js') ) }}"></script>
<script src="{{ asset( cacheBusting('js/admin/company.js') ) }}"></script>
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
@stop
