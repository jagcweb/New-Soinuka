@if(Session::has('error'))
    <div style="background:red; color:#fff; margin-top:30px; text-align:center; font-family: 'Montserrat'; font-size:16px;">
        {{ Session::get('error') }}
        @php
            Session::forget('error');
        @endphp
    </div>
@endif

@if(Session::has('exito'))
    <div style="background:green; color:#fff; margin-top:30px; text-align:center; font-family: 'Montserrat'; font-size:16px;">
        {!! Session::get('exito') !!}
        @php
            Session::forget('exito');
        @endphp
    </div>
@endif

@if (count($errors) > 0)
    <div style="background:red; color:#fff; margin-top:30px; text-align:center; font-family: 'Montserrat'; font-size:16px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif