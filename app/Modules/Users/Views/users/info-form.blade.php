<div class="form-group">
    <label>Birth Date</label>
    {!!
        Form::date('user_birth_date',
            \Carbon\Carbon::now(),
            [
                'class' => 'form-control',
                'placeholder' => 'Birthday date',
            ]
        )
    !!}
</div>

<hr/>

<h4>Detail Information</h4>

<div class="form-group">
    <label>Address</label>
    {!!
        Form::textarea('user_address',
            $data->name,
            [
                'class' => 'form-control',
                'placeholder' => 'User Address',
                'rows' => 2,
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Province</label>
    {!!
        Form::select('user_province_id',
            $provinces,
            null,
            [
                'class' => 'form-control',
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>City</label>
    {!!
        Form::select('user_city_id',
            $cities,
            null,
            [
                'class' => 'form-control',
            ]
        )
    !!}
</div>
<hr/>

<h4>Shipment Information</h4>

<div class="form-group">
    <label>Same as main user info</label>
    {!!
        Form::text('shipment_pic',
            $data->shipment_pic,
            [
                'class' => 'form-control',
                'placeholder' => 'User Address',
                'rows' => 2,
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Receiver Full Name</label>
    {!!
        Form::text('shipment_pic',
            $data->shipment_pic,
            [
                'class' => 'form-control',
                'placeholder' => 'User Address',
                'rows' => 2,
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Receiver Phone</label>
    {!!
        Form::text('shipment_phone',
            $data->shipment_phone,
            [
                'class' => 'form-control',
                'placeholder' => 'Receiver Phone'
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Receiver Email</label>
    {!!
        Form::text('shipment_email',
            $data->shipment_email,
            [
                'class' => 'form-control',
                'placeholder' => 'Receiver Email'
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Shipment Address</label>
    {!!
        Form::textarea('shipment_address',
            $data->name,
            [
                'class' => 'form-control',
                'placeholder' => 'User Address',
                'rows' => 2,
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Shipment Province</label>
    {!!
        Form::select('shipment_province_id',
            $provinces,
            null,
            [
                'class' => 'form-control',
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Shipment City</label>
    {!!
        Form::select('shipment_city_id',
            $cities,
            null,
            [
                'class' => 'form-control',
            ]
        )
    !!}
</div>
