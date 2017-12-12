<div class="container">
    <div class="col-md-8 offset-md-2">
        <h1>{{isset($post)?'Edit':'New'}} Post</h1>
        <hr/>
        @if(isset($post))
            {!! Form::model($post,['method'=>'put','id'=>'frm']) !!}
        @else
            {!! Form::open(['id'=>'frm']) !!}
        @endif
      
        <div class="form-group row required">
            {!! Form::label("name","Name",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-6">
                {!! Form::text("name",null,["class"=>"form-control".($errors->has('name')?" is-invalid":""),"autofocus",'placeholder'=>'User Name']) !!}
                <span id="error-name" class="invalid-feedback"></span>
            </div>
        </div>

        <!-- <div class="form-group row required">
            {!! Form::label("email","Email",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-6">
                {!! Form::text("email",null,["class"=>"form-control".($errors->has('email')?" is-invalid":""),"autofocus",'placeholder'=>'User Email']) !!}
                <span id="error-email" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("nic","Nic",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-6">
                {!! Form::text("nic",null,["class"=>"form-control".($errors->has('nic')?" is-invalid":""),"autofocus",'placeholder'=>'ex:-(*********V)']) !!}
                <span id="error-nic" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("job_title","Job Title",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-6">
                {!! Form::text("job_title",null,["class"=>"form-control".($errors->has('job_title')?" is-invalid":""),"autofocus",'placeholder'=>'ex:-(Student | No | Lecturer | ...etc)']) !!}
                <span id="error-job_title" class="invalid-feedback"></span>
            </div>
        </div> -->

        <!-- <div class="form-group row required">
            {!! Form::label("password","Password",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-6">
                {!! Form::text("password",null,["class"=>"form-control".($errors->has('password')?" is-invalid":""),"autofocus",'placeholder'=>'Password']) !!}
                <span id="error-password" class="invalid-feedback"></span>
            </div>
        </div> -->

        <div class="form-group row required">
            {!! Form::label("admin","Is Admin",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-6">
                {!! Form::text("admin",null,["class"=>"form-control".($errors->has('admin')?" is-invalid":""),"autofocus",'placeholder'=>'1 or 0']) !!}
                <span id="error-admin" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("approve","Approve",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-6">
                {!! Form::text("approve",null,["class"=>"form-control".($errors->has('approve')?" is-invalid":""),"autofocus",'placeholder'=>'1 or 0']) !!}
                <span id="error-approve" class="invalid-feedback"></span>
            </div>
        </div>

        <div class="form-group row required">
            {!! Form::label("description","Description",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-6">
                {!! Form::textarea("description",null,["class"=>"form-control".($errors->has('description')?" is-invalid":""),'placeholder'=>'Description']) !!}
                <span id="error-description" class="invalid-feedback"></span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 col-lg-2"></div>
            <div class="col-md-4">
                <a href="javascript:ajaxLoad('{{url('users')}}')" class="btn btn-danger btn-xs">
                    Back</a>
                {!! Form::button("Save",["type" => "submit","class"=>"btn btn-primary btn-xs"])!!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
