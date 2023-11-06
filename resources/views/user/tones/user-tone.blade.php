@extends('layouts.user')

@section('content')

    {{--
    <link rel="stylesheet" href="{{asset('assets/css/table.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    --}}

    {{--<section class="b">
        <div class="relative lg:ml-64 p-8">
            <div class="px-4 pt-6">
                <div class="col-md-12 mx-auto" style="float: right; margin-bottom: 5px;">
                    <a href="{{route('tones.create')}}" class="py-2 px-3 rounded bg-sky-600 text-white">Create</a>
                </div>
                <h2 class="title text-3xl font-bold ot ld">{{ ucfirst($user->first_name) . " " . ucfirst($user->last_name)}} Tones</h2>

                <div class="rr tf ot ld">
                    <div class="oo ca i_ iq">
                        <table>
                            <tr>
                                <th>Sr</th>
                                <th>Tone Name</th>
                                <th>Actions</th>
                            </tr>
                            @if($user_tones->count())
                            @php
                                $num = 1
                            @endphp
                                @foreach($user_tones as $user_tone)
                                <tr class="remove-tone{{$user_tone->id}}">
                                    <td>{{$num}}</td>
                                    <td>{{$user_tone->tone->name ?? ''}}</td>
                                    <td>
                                        <button data-modal-target="popup-modal{{$user_tone->id}}" data-modal-toggle="popup-modal{{$user_tone->id}}" class="py-0 px-2 rounded bg-red-600">Delete</button>

                                        <div id="popup-modal{{$user_tone->id}}" tabindex="-1" class="modal-div{{$user_tone->id}} fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal{{$user_tone->id}}">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>


                                                    <div class="p-6 text-center">
                                                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this tone?</h3>
                                                        <button  data-modal-hide="popup-modal{{$user_tone->id}}" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2 click-delete{{$user_tone->id}}">
                                                            Yes, I'm sure
                                                        </button>
                                                        <button data-modal-hide="popup-modal{{$user_tone->id}}" type="button" class="click-cancel text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <form method="post" action="" class="delete-tone{{$user_tone->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="user_id" value="{{$user_tone->user_id}}">
                                            <input type="hidden" name="id" value="{{$user_tone->id}}">
                                            <input type="hidden" name="type" value="app">
                                            --}}{{-- <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="py-0 px-2 rounded bg-red-600">Delete</button> --}}{{--
                                            <input type="submit" style="display: none;" class="delete-button{{$user_tone->id}}">


                                        </form>

                                    </td>
                                </tr>

                                    <script type="text/javascript">

                                        $(document).ready(function() {

                                            $(".click-delete{{$user_tone->id}}").on("click", function(){
                                                $(".delete-button{{$user_tone->id}}").click();
                                            });

                                            $(".delete-tone{{$user_tone->id}}").on("submit", (function(e) {
                                                e.preventDefault();

                                                //$(".submitLoader").show();
                                                $.ajaxSetup({
                                                    headers: {
                                                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                                                    }
                                                });

                                                $.ajax({
                                                    url: "{{route('tones.delete')}}",
                                                    method: 'POST',
                                                    data: new FormData(this),
                                                    contentType: false,
                                                    processData: false,
                                                    success: function(data) {
                                                        $(".remove-tone{{$user_tone->id}}").fadeOut();
                                                        if(data?.updated_extension_values) {
                                                            localStorage.setItem('extension', data?.updated_extension_values)
                                                            document.getElementById("sync-storage").click()
                                                        }
                                                    },
                                                    error: function(xhr) {
                                                        var data = xhr.responseJSON;

                                                        if ($.isEmptyObject(data.errors) == false) {
                                                            $.each(data.errors, function(key, result) {
                                                                alert(result);
                                                            });
                                                        }
                                                    }
                                                })
                                            }))
                                        })
                                    </script>
                                    @php
                                        $num++
                                    @endphp
                                @endforeach
                            @else
                            <tr>
                                <td style="text-align: center;" colspan="4">No data found.</td>
                            </tr>
                            @endif

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>--}}

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-header pt-4">
                    <div class="row">
                        <div class="col-md-10 col-sm-12">
                            <h4 class="card-title">{{ ucfirst($user->first_name) . " " . ucfirst($user->last_name)}} Tones</h4>
                        </div>
                        <div class="col-md-2 col-sm-12 text-right">
                            <a href="{{route('tones.create')}}" class="btn btn-primary d-block">Create</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-white">Sr</th>
                                <th class="text-white">Tone Name</th>
                                <th class="text-white">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($user_tones->count())
                                @php
                                    $num = 1
                                @endphp
                                @foreach($user_tones as $user_tone)
                                    <tr class="text-white remove-tone-{{$user_tone->id}}">
                                        <td>{{$num}}</td>
                                        <td>{{$user_tone->tone->name ?? ''}}</td>
                                        <td>

                                            <div class="modal fade" id="popup-modal{{$user_tone->id}}" tabindex="-1"
                                                 role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabel">Confirmation</h5>
                                                            <button type="button"
                                                                    onclick="common_helper.modalClose('#popup-modal{{$user_tone->id}}')"
                                                                    class="close text-white" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="form-group text-center text-bold">
                                                                <label for="recipient-name" class="col-form-label text-danger">
                                                                    Are you sure you want to delete?
                                                                </label>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" onclick="deleteTone({
                                                                                    id:'{{$user_tone->id}}',
                                                                                    user_id:'{{$user_tone->user_id}}',
                                                                                    type:'app'
                                                                                })"

                                                                                id="form-{{$user_tone->id}}" class="btn btn-danger">
                                                                Yes
                                                                <span id="tone-spinner-delete" class="spinner-border spinner-border-sm"
                                                                      style="display: none" role="status" aria-hidden="true"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-primary"
                                                                    onclick="common_helper.modalClose('#popup-modal{{$user_tone->id}}')"
                                                            >No
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                onclick="common_helper.modalOpen('#popup-modal{{$user_tone->id}}')"
                                                class="btn btn-danger">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    @php
                                        $num++;
                                    @endphp
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script type="text/javascript">

        {{--$(".click-delete{{$user_tone->id}}").on("click", function () {--}}
        {{--    $(".delete-button{{$user_tone->id}}").click();--}}
        {{--});--}}

        async function deleteTone(params) {
            //event.preventDefault();
            console.log('params',params)
            //$(".submitLoader").show();
            /*$.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });*/

           const response = await common_helper.globalAjaxRequest({
                            url: "{{route('tones.delete')}}",
                            type: 'DELETE',
                            data: params,
                            spinner:"#tone-spinner-delete"
                         })

            //console.log('response',response)

            if(response?.status == 1){
                $(`.remove-tone-${params.id}`).fadeOut();
                common_helper.modalOpen(`#popup-modal${params.id}`)
                if (response?.updated_extension_values) {
                    localStorage.setItem('extension', response?.updated_extension_values)
                    document.getElementById("sync-storage").click()
                }
            }
            /*$.ajax({
                url: "{{route('tones.delete')}}",
                type: 'DELETE',
                data: params,
                contentType: false,
                processData: false,
                success: function (data) {
                    $(`.remove-tone-${id}`).fadeOut();
                    if (data?.updated_extension_values) {
                        localStorage.setItem('extension', data?.updated_extension_values)
                        document.getElementById("sync-storage").click()
                    }
                },
                error: function (xhr) {
                    var data = xhr.responseJSON;

                    if ($.isEmptyObject(data.errors) == false) {
                        $.each(data.errors, function (key, result) {
                            alert(result);
                        });
                    }
                }
            })*/
        }


    </script>
@endpush
