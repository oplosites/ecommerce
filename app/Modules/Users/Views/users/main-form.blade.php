<div class="form-group">
    <label>User Name</label>
    {!!
        Form::text('username',
            $data->name,
            [
                'class' => 'form-control',
                'placeholder' => 'User Name',
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Full Name</label>
    {!!
        Form::text('fullname',
            $data->fullname,
            [
                'class' => 'form-control',
                'placeholder' => 'Full Name',
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Email</label>
    {!!
        Form::text('username',
            $data->name,
            [
                'class' => 'form-control',
                'placeholder' => 'User Email',
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Password</label>
    {!!
        Form::text('password',
            null,
            [
                'class' => 'form-control',
                'placeholder' => 'Password',
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Password Confirmation</label>
    {!!
        Form::text('password_confirmation',
            null,
            [
                'class' => 'form-control',
                'placeholder' => 'Password Confirmation',
            ]
        )
    !!}
</div>
