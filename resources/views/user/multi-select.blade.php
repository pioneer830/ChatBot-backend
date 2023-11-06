@extends('layouts.user')

@section('content')

    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.0.0/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/multi_select.css')}}">

    <style>
        .form-control {
            height: auto !important;
        }
        .custom-control-label::before, .custom-control-label::after {
            left: -1.5rem !important;
        }
        .page-body-wrapper {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
    </style>

    <div class="page-header">
        <h3 class="page-title">Thank You</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Multi Select</h1>
        </div>
        <div class="col-md-12">
            <br>
            <input type="text" class="form-control multi-select" name="country" data-access_multi_select="true"
            placeholder="Select a Country">
            <br>
            <div class="text-center">
                <button class="btn btn-success" id="display_selected">Show Selected Value</button>
            </div>
        </div>
    </div>


    <script src="{{asset('assets/js/custom-jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/multi_select.js')}}"></script>

    <script>
        (function($) {
            $(document).ready(function () {
                // Country
                var items = [
                    { value: 1, text: 'United Arab Emirates' },
                    { value: 2, text: 'Saudi Arabia' },
                    { value: 3, text: 'Israel' },
                    { value: 4, text: 'India' },
                    { value: 5, text: 'Japan' },
                    { value: 6, text: 'France' },
                    { value: 7, text: 'Germany' },
                    { value: 8, text: 'United Kingdom' },
                    { value: 9, text: 'China' },
                    { value: 10, text: 'Russia' },
                    { value: 11, text: 'United States' },
                    { value: 12, text: 'Switzerland' },
                    { value: 13, text: 'Canada' },
                    { value: 14, text: 'Sweden' },
                    { value: 15, text: 'Australia' }

                ];

                // Set a default values in list
                var select = $('[data-access_multi_select="true"]').check_multi_select({
                    multi_select: true,
                    items: items,
                    defaults: [3, 4, 5],
                    rtl: false
                });

                // Display the selected Values
                $('#display_selected').click(function () {
                    alert(select.check_multi_select('fetch_country'))
                });
            })
        })(jQuery);
    </script>
@endsection
