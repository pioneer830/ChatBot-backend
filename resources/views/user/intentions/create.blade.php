@extends('layouts.user')

@section('content')
{{--
<link rel="stylesheet" href="{{asset('assets/css/table.css')}}">
<section class="b">
    <div class="relative lg:ml-64 p-8">
        <div class="px-4 pt-6">
            <div class="col-md-12 mx-auto" style="float: right; margin-bottom: 5px;">
                <a href="{{route('intentions.user-intention')}}" class="py-2 px-3 rounded bg-gray-800 text-white">
                    < Back</a>
            </div>
            <h2 class="title text-3xl font-bold ot ld">Intentions / <span class="font-sm">Create</span></h2>

            <div class="rr tf ot ld">
                <div class="oo ca i_ iq">
                    <form method="post" action="{{route('intentions.store')}}" class="test-store">
                        @csrf
                        @include('user.intentions.form')
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
--}}


<div class="row">
    <div class="col-12 text-right">
        <a href="{{route('intentions.user-intention')}}" class="btn btn-primary">
            < Back</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form method="post" action="{{route('intentions.store')}}" class="test-store">
            @csrf
            @include('user.intentions.form')
        </form>
    </div>
</div>



@endsection

@push('script')
    <script type="text/javascript">
        $(".alert-success").hide();
        $(".test-store").on("submit", (function(e) {
            e.preventDefault();
            $(".submitLoader").show();
            $("#intention-spinner-create").show();
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });

            $.ajax({
                url: "{{route('intentions.store')}}",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function({response}) {
                    $(".alert-success").show();
                    $('.alert-success').html('Intention saved successfully');
                    $("#intention-spinner-create").hide();
                    console.log('ssss',response);
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
