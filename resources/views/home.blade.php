@extends('layouts.user')
@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp
@section('content')
    {{--dashboard--}}
    {{--<div class="relative lg:ml-64 p-8">
        <div class="px-4 pt-6">
            <h2 class="title text-3xl font-bold">Account Settings</h2>
            @php
            $user = \Illuminate\Support\Facades\Auth::user();
            @endphp
            <div>
                <h5 class="sub-title mt-10 mb-6 text-xl font-bold">Profile</h5>

                <div class="form-wrapper col-6">
                    <label>Name</label>
                    <div class="flex items-center gap-2 col-md-6">
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" name="first_name" id="first_name" value="{{ $user->first_name }}"/>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" name="last_name" id="last_name" value="{{ $user->last_name }}"/>
                        <button style="display: flex; align-items: center" id="update_name_btn" class="rounded py-2 px-3 bg-blue-600 text-white mx-auto">
                            <span class="loading" style="display: none"  >
                                <svg style="width: 31px" version="1.1" id="L3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                                    <circle fill="none" stroke="#fff" stroke-width="4" cx="50" cy="50" r="44" style="opacity:0.5;"/>
                                    <circle fill="#fff" stroke="#e74c3c" stroke-width="3" cx="8" cy="54" r="6" >
                                        <animateTransform
                                        attributeName="transform"
                                        dur="2s"
                                        type="rotate"
                                        from="0 50 48"
                                        to="360 50 52"
                                        repeatCount="indefinite" />

                                    </circle>
                                </svg>
                            </span>
                            Update
                        </button>
                    </div>
                    <span class="invalid-feedback error-msg text-red-600" id="nameError"></span>
                </div>

                <div class="form-wrapper col-6">
                    <label>Email</label>
                    <div class="col-md-6">
                        <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" name="email" value="{{ $user->email }}" disabled/>
                    </div>
                </div>

                <div class="form-wrapper col-6">
                    <label>Password</label>
                    <div>
                        <input type="password" placeholder="Old Password" name="old_password" id="old_password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"/>
                    </div>
                    <div class="flex items-center gap-2 col-md-6 mt-2">
                        <input type="password" placeholder="New Password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"/>
                    </div>
                    <span id="passwordError" class="invalid-feedback error-msg text-red-600" role="alert"></span>
                    <div class="mt-4">
                        <button style="display: flex; align-items: center" id="passwordUpdate" class="rounded py-2 px-3 bg-blue-600 text-white ">
                            <span class="loading1" style="display: none"  >
                                <svg style="width: 31px" version="1.1" id="L3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                                    <circle fill="none" stroke="#fff" stroke-width="4" cx="50" cy="50" r="44" style="opacity:0.5;"/>
                                    <circle fill="#fff" stroke="#e74c3c" stroke-width="3" cx="8" cy="54" r="6" >
                                        <animateTransform
                                        attributeName="transform"
                                        dur="2s"
                                        type="rotate"
                                        from="0 50 48"
                                        to="360 50 52"
                                        repeatCount="indefinite" />

                                    </circle>
                                </svg>
                            </span>
                            Update
                        </button>
                    </div>
                </div>

                <div>
                    <h5 class="sub-title mt-10 mb-6 text-xl font-bold">About You</h5>

                    <div class="flex items-center gap-4">
                        <div>
                            @include('share._job', [ "user" => isset($user) ? $user : null,  ])

                            --}}{{-- job title input --}}{{--
                            --}}{{-- <div class="col-md-6">
                                <label for="jobTitle" class="text-sm font-medium text-gray-300 block mb-2">{{ __('Job Title') }}</label>
                                <input id="jobTitle" type="text" value="{{ $user->job_title }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('job_title') is-invalid @enderror"
                                        name="job_title" value="{{ old('job_title') }}" required autocomplete="job_title" autofocus>

                                <span class="invalid-feedback error-msg text-red-600" role="alert"></span>
                                @error('job_title')
                                <span class="invalid-feedback text-red-600" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div> --}}{{--

                            --}}{{-- job description input --}}{{--
                            --}}{{-- <div class="col-6 mb-2">
                                <label for="jobDescription"
                                    class="text-sm font-medium text-gray-300 block mb-2">{{ __('Job Description') }}</label>

                                <div class="col-md-6 form-wrapper">
                                    <div class="flex gap-2 items-center">
                                        <textarea name="job_description" id="jobDescription" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('job_description') is-invalid @enderror">{{ old('job_description', isset($user->job_description) ? $user->job_description : "") }}</textarea>
                                        <button id="optimize_job_description" class="rounded py-2 px-3 bg-blue-600 text-white mx-auto">Optimize</button>
                                    </div>

                                    <span id="jobDescriptionError" class="invalid-feedback error-msg text-red-600" role="alert"></span>
                                    @error('job_description')
                                    <span class="invalid-feedback text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> --}}{{--

                            --}}{{-- industry input --}}{{--
                            <div class="col-6 mb-2">
                                <label for="industry"
                                       class="text-sm font-medium text-gray-300 block mb-2">{{ __('Industry') }}</label>

                                <div class="col-md-6">
                                    <select id="industry" type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('industry') is-invalid @enderror"
                                            name="industry" value="{{ old('industry', $user->industry) }}" required autocomplete="industry" autofocus>
                                        <option value="" >Select Industry</option>
                                        @if (isset($industries))
                                            @foreach ($industries as $item)
                                                <option value={{$item->id}} {{ $item->id == old('industry', $user->industry) ? "selected" : "" }}>{{$item->name}}</option>
                                            @endforeach
                                        @endif



                                    </select>

                                    <span id="industryError" class="invalid-feedback error-msg text-red-600" role="alert"></span>
                                    @error('industry')
                                    <span class="invalid-feedback text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6 mb-2" id="industryDescription_wrapper">
                                <div class="col-md-6">
                                    <input id="industryDescription" type="text"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('industry_description') is-invalid @enderror"
                                           name="industry_description" value="{{ old('industry_description', $user->industry_description) }}" required autocomplete="industry_description" autofocus>

                                    <span id="industryDescriptionError" class="invalid-feedback error-msg text-red-600" role="alert"></span>
                                    @error('industry_description')
                                    <span class="invalid-feedback text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <button style="display: flex; align-items: center" class="rounded py-2 px-3 bg-blue-600 text-white mt-4" id="update_about_info">
                        <span class="loading" style="display: none"  >
                                <svg style="width: 31px" version="1.1" id="L3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                                    <circle fill="none" stroke="#fff" stroke-width="4" cx="50" cy="50" r="44" style="opacity:0.5;"/>
                                    <circle fill="#fff" stroke="#e74c3c" stroke-width="3" cx="8" cy="54" r="6" >
                                        <animateTransform
                                        attributeName="transform"
                                        dur="2s"
                                        type="rotate"
                                        from="0 50 48"
                                        to="360 50 52"
                                        repeatCount="indefinite" />

                                    </circle>
                                </svg>
                            </span>
                            Update
                    </button>
                </div>
            </div>
        </div>
        <input type="hidden" id="prospect_frame_social_login" value="{{ $isSocialLogin }}"/>
    </div>
--}}
    <!-- ! Main -->
    <div class="page-header">
        <h3 class="page-title"> Account Settings </h3>
    </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profile</h4>
                    <form class="forms-sample" autocomplete="off">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                           value="{{ $user->first_name }}" placeholder="First Name">
                                    <span class="invalid-feedback error-msg text-red-600" id="nameError"></span>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                           value="{{ $user->last_name }}" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="button" id="update_name_btn">
                                        Update
                                        <span id="optimize-spinner-name" class="spinner-border spinner-border-sm"
                                              style="display: none" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                           value="{{ $user->email }}" disabled placeholder="Email">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="old_password"
                                           placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="password" name="confirm_password" class="form-control" id="password"
                                           placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="password"></label>
                                    <button class="btn btn-primary" type="button" id="passwordUpdate">
                                        Update
                                        <span id="optimize-spinner-password" class="spinner-border spinner-border-sm"
                                              style="display: none" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h4 class="card-title">About you</h4>
                        </div>
                    </div>
                    @include('share._job', [ "user" => isset($user) ? $user : null,  ])
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Industry</label>
                                <select type="text" id="industry" name="industry" class="form-control">
                                    <option value="">Select Industry</option>
                                    @if (isset($industries))
                                        @foreach ($industries as $item)
                                            <option
                                                value={{$item->id}} {{ $item->id == old('industry', $user->industry) ? "selected" : "" }}>{{$item->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <button type="button" id="update_about_info" class="btn btn-primary mr-2">
                                    Update
                                    <span id="optimize-spinner-job" class="spinner-border spinner-border-sm"
                                          style="display: none" role="status" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        function checkIndustryOption() {
            const selectedOption = $("#industry option:selected").html();
            console.log(selectedOption, "selectedOption");
            if (selectedOption === 'other') {
                $("#industryDescription_wrapper").removeClass("hidden");
            } else {
                $("#industryDescription_wrapper").addClass("hidden");
                $("#industryDescription").val("");
            }
        }

        checkIndustryOption();
        $("#industry").change(function () {
            checkIndustryOption();
        });

        async function updateUserData(params) {
            params._token = "{{ csrf_token() }}";
            $('.loading').show();
            const response = await common_helper.globalAjaxRequest({
                type: 'put',
                url: "{{ route("updateUserDataApi", ["user" => $user->id]) }}",
                data: params,
                spinner: params?.spinner
            });
            //console.log('result',response)
            if (response.msg === 'success') {
                alert("Updated.");
            } else {
                alert(response.msg);
            }

            /*success: function(result) {
                if(result.msg === 'success') {
                    alert("Updated.");
                } else {
                    alert(result.msg);
                }
            },
            complete: function() {
                $('.loading').hide(); // Hide the loading element after the request is complete
            }*/
        }



        $("#update_about_info").click(async function () {
            const job_title = $("#jobTitle").val();
            const job_description = $("#jobDescription").val()
            const industry = $("#industry").val();
            const industry_description = $("#industryDescription").val();
            common_helper.removeValidationErrors()
            let is_valid = true;

            if (!job_title) {
                common_helper.validationErrorSet('#jobTitle', 'Job Title is required.')
                is_valid = false;
            }

            if (!job_description) {
                common_helper.validationErrorSet('#jobDescription', 'Job Description is required.')
                is_valid = false;
            }

            if (!industry) {
                common_helper.validationErrorSet('#industry', 'Industry is required.')
                is_valid = false;
            }

            if(is_valid) {
                const params = {
                    job_title, job_description, industry, industry_description,
                    spinner: '#optimize-spinner-job'
                }
                await updateUserData(params);
            }
        });

        $("#update_name_btn").click(async function () {
            const first_name = $("#first_name").val();
            const last_name = $("#last_name").val();
            common_helper.removeValidationErrors()
            let is_valid = true;
            if (!first_name) {
                common_helper.validationErrorSet('#first_name', 'First Name is required')
                is_valid = false;
            }
            if (!last_name) {
                common_helper.validationErrorSet('#last_name', 'Last Name is required')
                is_valid = false;
            }

            if (is_valid) {
                await updateUserData({
                    first_name, last_name,
                    spinner: '#optimize-spinner-name'
                })
            }
        });

        $("#passwordUpdate").click(async function () {
            const password = $("#password").val();
            const old_password = $("#old_password").val();
            common_helper.removeValidationErrors()
            let is_valid = true;
            if (!old_password) {
                common_helper.validationErrorSet('#old_password', 'Old Password is required')
                is_valid = false;
            }

            if (!password) {
                common_helper.validationErrorSet('#password', 'New password is required')
                is_valid = false;
            } else if (password.length < 8) {
                common_helper.validationErrorSet('#password', 'Password must be at least 8 characters.')
                is_valid = false;
            }

            if (is_valid) {
                await updateUserData({
                    password, old_password,
                    spinner: '#optimize-spinner-password'
                })
            }
        })
    </script>
@endpush
