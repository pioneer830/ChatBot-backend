
@push('script')
<script>
    var isRtl = $('html').attr('data-textdirection') === 'rtl';

    function options() {
        return {
            closeButton: true,
            tapToDismiss: false,
            progressBar: true,
            timeOut: 6000,
            extendedTimeOut: 6000,
            rtl: isRtl,
        };
    }

</script>

@if(session()->has('success'))
    <script>
        toastr['success'](
            '{{session('success')}}',
            'Success',
            options()
        );

    </script>

@endif

@if(session()->has('error'))
    <script>

        toastr['error'](
            '{{session('error')}}',
            'Error',
            options()
        );

    </script>

@endif

@if(session()->has('warning'))
    <script>


        toastr['warning'](
            '{{session('warning')}}',
            'Warning',
            options
        );

    </script>

@endif

@if(session()->has('info'))
    <script>

        toastr['info'](
            '{{session('info')}}',
            'Info',
            options
        );

    </script>

@endif
@endpush
