@extends('layouts.user')

@section('content')
    <div class="row">
        <div class="col-12 text-right">
            <a href="{{route('tones.user-tone')}}" class="btn btn-primary">
                < Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{route('tones.store')}}" class="test-store">
                @csrf
                @include('user.tones.form')
            </form>
        </div>
    </div>
{{--<link rel="stylesheet" href="{{asset('assets/css/table.css')}}">
<section class="b">
    <div class="relative lg:ml-64 p-8">
        <div class="px-4 pt-6">
            <div class="col-md-12 mx-auto" style="float: right; margin-bottom: 5px;">
                <a href="{{route('tones.user-tone')}}" class="py-2 px-3 rounded bg-gray-800 text-white">
                    < Back</a>
            </div>
            <h2 class="title text-3xl font-bold ot ld">Tones / <span class="font-sm">Create</span></h2>

            <div class="rr tf ot ld">
                <div class="oo ca i_ iq">

                </div>
            </div>

        </div>
    </div>
</section>--}}




@endsection

@push('script')
    <script type="text/javascript">

        $(".alert-success").hide();
        $(".test-store").on("submit", (function(e) {
            e.preventDefault();
            $(".submitLoader").show();
            $("#tone-spinner-create").show();
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });

            $.ajax({
                url: "{{route('tones.store')}}",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function({response}) {
                    $('.alert-success').html('Tone saved successfully');
                    $('.alert-success').show();
                    $("#tone-spinner-create").hide();
                    //$(".alert-success").removeClass('hide');
                    if(response?.updated_extension_values) {
                        localStorage.setItem('extension', response?.updated_extension_values)
                        document.getElementById("sync-storage").click()
                    }

                    setTimeout(() => {
                        $(".alert-success").hide();
                    }, 2000);
                },
                error: function(xhr) {
                    var data = xhr.responseJSON;

                    if ($.isEmptyObject(data.errors) == false) {
                        $.each(data.errors, function(key, result) {
                            $('.invalid-feedback').html(result);
                        });
                    }
                }
            })
        }))

    </script>
@endpush
