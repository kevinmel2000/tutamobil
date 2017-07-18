@extends('layouts.app-dash-lte')

@section('content-header', 'Pengguna Baru')

@section('breadcump')
<li>Dashboard</li>
<li>Pengguna</li>
<li class="active">Membuat Pengguna Baru</li>
@endsection

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Pengguna Baru</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      {!! Form::open(array('route' => 'dashboard.users.store', 'method' => 'POST', 'files' => true)) !!}
      <div class="col-xs-6">
        {{ Form::tutaText('name', old('name'), '*', ['required' => 'required'], 'Nama') }}
        {{ Form::tutaText('username', old('username'), '*', ['required' => 'required']) }}
        {{ Form::tutaEmail('email', old('email'), '*', ['required' => 'required']) }}
        {{ Form::tutaText('phone', old('phone'), '*', ['required' => 'required']) }}
        {{ Form::tutaText('website', old('website'), null, ['placeholder' => 'mobilokal.com']) }}
      </div>
      <div class="col-xs-6">
        {{ Form::tutaArea('address', old('address'), null, ['rows' => 3], 'Alamat') }}
        {{ Form::tutaPass('password', '*', ['required' => 'required']) }}
        <div class="form-group required {{ $errors->has('role') ? ' has-error' : '' }}">
        {{ Form::label('role', 'Role') }}
        {{ Form::select('role', ['' => '--Pilih Peranan--', 'admin' => 'Administrator', 'user' => 'Pengguna'], null, ['class' => 'form-control', 'required' => 'required']) }}
        @if ($errors->has('role'))
            <span class="help-block">
                <strong>{{ $errors->first('role') }}</strong>
            </span>
        @endif
        </div>
        <div class="form-group">
            <label class="control-label">Foto</label>
            {!! Form::file('foto', old('foto'), array('class' => 'form-control')) !!}
        </div>

      </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="form-group pull-right">
        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
        <a class="btn btn-small btn-warning" href="{{ URL::to('dashboard/users') }}">Cancel</a>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>

<!-- /.box -->
@endsection
