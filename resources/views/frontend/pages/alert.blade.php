@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger">
        <ul>
            <li> {{ session()->get('error') }}</li>
        </ul>
    </div>
@endif
