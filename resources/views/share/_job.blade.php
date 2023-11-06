
{{--<div class="col-6 mb-2">
    --}}{{--<<label for="jobTitle"
           class="text-sm font-medium text-gray-300 block mb-2">{{ __('Job Title') }}</label>

    <div class="col-md-6">
        <select id="jobTitle" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('job_title') is-invalid @enderror" name="job_title" required autocomplete="job_title" autofocus>
            <option value="">Select Job</option>
            @foreach($jobs as $job)
                <option value="{{$job->id ?? 0}}" {{isset($user->job) && $user->job->id == $job->id ? 'selected' : ''}}>{{$job->name ?? ''}}</option>
            @endforeach
        </select>
        input id="jobTitle" type="text"
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('job_title') is-invalid @enderror"
               name="job_title" value="{{ old('job_title', isset($user->job_title) ? $user->job_title : "") }}" required autocomplete="job_title" autofocus>

        <span id="jobTitleError" class="invalid-feedback error-msg text-red-600" role="alert"></span>

        @error('job_title')
        <span class="invalid-feedback text-red-600" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>--}}{{--

    <div class="col-md-6">
        <label for="jobTitle" class="text-sm font-medium text-gray-300 block mb-2">{{ __('Job Title') }}</label>
        <input id="jobTitle" type="text"
               class="icon-img {{isAllowPermission('job_title') ? : 'grey-out block-cursor'}} bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('job_title') is-invalid @enderror"
               name="job_title" {{isAllowPermission('job_title') ? : 'disabled readonly'}} value="{{ $user->job_title }}" required autocomplete="job_title" autofocus>

        @if(!isAllowPermission('job_title'))
            @component('components.lock')
                @slot('label')
                    Job Title
                @endslot
                @slot('mouseover')
                    jobTitle
                @endslot
                @slot('left')
                    288px
                @endslot
                @slot('top')
                    -44px
                @endslot
                @slot('width')
                    25px
                @endslot
            @endcomponent
        @endif

        <span class="invalid-feedback error-msg text-red-600" role="alert"></span>
        @error('job_title')
        <span class="invalid-feedback text-red-600" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>
</div>--}}

{{--<div class="col-6 mb-2">
    <label for="jobDescription"
           class="text-sm font-medium text-gray-300 block mb-2">{{ __('Job Description') }}</label>

    <div class="col-md-6 form-wrapper">
        <div class="flex gap-2 items-center" id="job-description-area">
            <textarea {{isAllowPermission('job_description') ? '' : 'disabled readonly'}} name="job_description" id="jobDescription" class="{{isAllowPermission('job_description') ? '' : 'grey-out block-cursor'}} bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('job_description') is-invalid @enderror">{{ old('job_description', isset($user->job_description) ? $user->job_description : "") }}</textarea>
            <button {{isAllowPermission('job_description') ? '' : 'disabled'}} id="optimize_job_description" class="{{isAllowPermission('job_description') ? '' : 'block-cursor'}} rounded py-2 px-3 bg-blue-600 text-white mx-auto" style="display: flex; align-items: center">
                <span id="loading" style="display: none" >
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
                </span>  Optimize
            </button>
        </div>
        @if(!isAllowPermission('job_description'))
            @component('components.lock')
                @slot('label')
                    Job Description
                @endslot
                @slot('mouseover')
                    job-description-area
                @endslot
                @slot('left')
                    288px
                @endslot
                @slot('top')
                    -58px
                @endslot
                @slot('width')
                    25px
                @endslot
            @endcomponent
        @endif
        <span id="jobDescriptionError" class="invalid-feedback error-msg text-red-600" role="alert"></span>
        @error('job_description')
        <span class="invalid-feedback text-red-600" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>--}}

<div class="row">
    <div class="{{isAllowPermission('job_description') ? 'col-12' : 'col-11'}}">
        <div class="form-group">
            <label for="exampleInputEmail1">Job Title  @if(!isAllowPermission('job_title'))
                    @component('components.lock')
                        @slot('label')
                            Job Title
                        @endslot
                        @slot('mouseover')
                            jobTitle
                        @endslot
                        @slot('left')
                            110px
                        @endslot
                        @slot('top')
                            -24px
                        @endslot
                        @slot('width')
                            25px
                        @endslot
                    @endcomponent
                @endif</label>
            <input type="text" {{isAllowPermission('job_title') ? : 'disabled readonly'}} value="{{ $user->job_title }}" required autocomplete="job_title"  name="job_title" class="form-control {{isAllowPermission('job_title') ? : 'grey-out block-cursor'}}" id="jobTitle" placeholder="Job Title">
        </div>
    </div>
    <div class="col-1">

    </div>
</div>
<div class="row">
    <div class="{{isAllowPermission('job_description') ? 'col-12' : 'col-11'}}">
        <div class="form-group">
            <label for="exampleInputEmail1">Job Description
                @if(!isAllowPermission('job_description'))
                    @component('components.lock')
                        @slot('label')
                            Job Description
                        @endslot
                        @slot('mouseover')
                            job-description-area
                        @endslot
                        @slot('left')
                            110px
                        @endslot
                        @slot('top')
                            -24px
                        @endslot
                        @slot('width')
                            25px
                        @endslot
                    @endcomponent
                @endif
            </label>
            <textarea placeholder="Job Description"
                      rows="5"
                      type="text"
                      id="jobDescription"
                      {{isAllowPermission('job_description') ? '' : 'disabled readonly'}}
                      name="job_description"
                      class="form-control
                      {{isAllowPermission('job_description') ? '' : 'grey-out block-cursor'}}" >{{ old('job_description', isset($user->job_description) ? $user->job_description : "") }}</textarea>
            <span id="jobDescriptionError" class="invalid-feedback error-msg text-red-600" role="alert"></span>
            @error('job_description')
            <span class="invalid-feedback text-red-600" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-1">

    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="exampleInputEmail1"></label>
            <button type="button" {{isAllowPermission('job_description') ? '' : 'disabled'}} id="optimize_job_description" class="form-control btn btn-primary optimize-btn">
                Optimize
                <span id="optimize-spinner" class="spinner-border spinner-border-sm" style="display: none" role="status" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</div>

@push('script')
<script>
    const OPEN_API_KEY = "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" //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"
    const API_URL = "https://api.openai.com/v1/chat/completions"

    $("#optimize_job_description").click(async function (e) {

        $('#loading').show();
        const jobTitle = $("#jobDescription").val();

        if(jobTitle === null || jobTitle === undefined || jobTitle === "") {
            return false;
        }

       const response = await common_helper.globalAjaxRequest({
            type: 'post',
            headers: {
                "Content-Type": "application/json",
                "Authorization": "Bearer " + OPEN_API_KEY,
            },
            url: API_URL,
            data: JSON.stringify({
                "model": "gpt-3.5-turbo",
                "messages": [{"role": "user", "content": `optimize this job description to make it more descriptive ${jobTitle}`}]
            }),
            spinner:'#optimize-spinner'
        });

        if(response?.choices[0]?.message?.content) {
            $("#jobDescription").val(response.choices[0].message.content)
        }

        /*return $.ajax({
            type: 'post',
            headers: {
                "Content-Type": "application/json",
                "Authorization": "Bearer " + OPEN_API_KEY,
            },
            url: API_URL,
            data: JSON.stringify({
                "model": "gpt-3.5-turbo",
                "messages": [{"role": "user", "content": `optimize this job description to make it more descriptive ${jobTitle}`}]
            }),
            success: function(result) {
                console.log(result);
                $("#jobDescription").val(result.choices[0].message.content)
            },
            complete: function() {
                $('#loading').hide(); // Hide the loading element after the request is complete
            }
        });*/
    })

</script>
@endpush
