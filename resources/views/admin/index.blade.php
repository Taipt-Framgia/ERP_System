@extends('layouts.admin.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>{{ trans('language.wellcome') }}</h1>
    </div>
</div>
@endsection
{{-- @section('script')
    <script type="text/javascript">
        $().ready(function() {
            $('#elfinder').elfinder({
                @if ($locale)
                    lang: '{!! $locale !!}',
                @endif
                // set your elFinder options here
                customData: {
                    _token: '{{csrf_token()}}'
                },
                url : '{!! route("elfinder.connector") !!}',  // connector URL
                soundPath: '{!! asset('assets/elfinder/sounds') !!}'
            });
        });
    </script>
@stop --}}