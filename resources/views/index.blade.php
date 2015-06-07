@extends('app')

@section('content')
<div class="row" id="maincontent">    
    <div class="col-md-3 hidden-xs hidden-sm" id="sidebar">
        <!--newsletter-->
        <div id="formnewsletter">
        @if (Session::get('subscibesuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('subscibesuccess') }}
        </div>
        @endif
        {!! Form::open(array('url' => '/newsletter', 'method' => 'POST')) !!}
            <div class="form-group {!! $errors->has('first_name') ? 'has-error' : '' !!}">
                    <label>{!! Form::label('first_name', 'First name:') !!}</label>
                    <div>
                            {!! Form::text('first_name',null,array('class' => 'form-control')) !!}
                            {!! $errors->first('first_name', '<small class="help-block">:message</small>') !!}
                    </div>
            </div>

            <div class="form-group {!! $errors->has('last_name') ? 'has-error' : '' !!}">
                    <label>{!! Form::label('last_name', 'Last name:') !!}</label>
                    <div>
                            {!! Form::text('last_name',null,array('class' => 'form-control')) !!}
                            {!! $errors->first('last_name', '<small class="help-block">:message</small>') !!}
                    </div>
            </div>                        

            <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                    <label>{!! Form::label('email', 'Email:') !!}</label>
                    <div>
                            {!! Form::text('email',null,array('class' => 'form-control')) !!}
                            {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                    </div>
            </div> 
            {!! Form::submit('Envoyer !', array('class' => 'btn btn-info')) !!}
        {!! Form::close() !!} 
        </div>
        <!--end newsletter-->
    </div><!-- /#sidebar -->   
    <div class="col-md-8 col-md-offset-1" id="main">
      <h2>Welcome to <span id="logopart1">LARA</span><span id="logopart2">BOOKSHOP</span></h2>
      LRABOOKSHOP is a booshop on line.  <br />
      It is an e-commerce website. <br />
      It is my favourite sideproject because I'm using Laravel to build it.<br />
      I'll put on this page all features developed and finished.<br />
      So far, tehese features work already :<br />
      <ul>
          <li>User registration and authentication</li>
          <li>Subsciption to the  newsletter</li>
      </ul> 
      
    </div><!-- /#main -->
</div>
@endsection


