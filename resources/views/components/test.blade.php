<div id="fade">
    <h1 class="display-1 cname">{{$company->name}}</h1>
    <p  >{{$company->homepage}}</p>
    <button id="page">{{$slot}}</button>

</div>


@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/test/test.css')}}">
    <script src="{{ asset('js/test/test.js') }}"></script>
@endpush
