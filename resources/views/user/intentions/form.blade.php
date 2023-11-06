{{--<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-wrapper">
                <div class="col-sm-6">
                    <div class="alert alert-success" style="max-width: 350px" role="alert">
                       --}}{{-- {{ $errors->first('name') }} --}}{{--
                    </div>
                    <label for="intention_id" class="control-label">Intention Name</label>
                    <select id="intention_id" class="form-control text-color" name="intention_id">
                        <option value="">Select</option>
                        @foreach($intentions as $intention)
                            @if(in_array($intention->name, $user_intention, true))
                                @continue
                            @endif
                        <option value="{{$intention->id}}">{{$intention->name ?? ''}}</option>
                        @endforeach
                    </select>

                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>

                    <input type="hidden" value="app" name="type">
                    <input type="hidden" value="{{$user->id}}" name="user_id">
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <button class="rounded py-2 px-3 bg-blue-600 text-white mt-4 mx-auto">Save</button>
        </div>
    </div>
</div>--}}

<div class="card-body">
    <div class="row">
        <div class="col-md-6 col-sm-12 text-center">
            <div class="alert alert-success hide" role="alert">
                {{-- {{ $errors->first('name') }} --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-wrapper">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="tone_id" class="control-label">Intention Name</label>
                            <select id="intention_id" class="form-control text-color" name="intention_id">
                                <option value="">Select</option>
                                @foreach($intentions as $intention)
                                    @if(in_array($intention->name, $user_intention, true))
                                        @continue
                                    @endif
                                    <option value="{{$intention->id}}">{{$intention->name ?? ''}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <input type="hidden" value="app" name="type">
                <input type="hidden" value="{{$user->id}}" name="user_id">

            </div>
        </div>

        <div class="col-md-12">
            <button class="btn btn-primary">
                Save
                <span id="intention-spinner-create" class="spinner-border spinner-border-sm"
                      style="display: none" role="status" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</div>
