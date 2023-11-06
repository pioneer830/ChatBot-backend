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
                            <label for="tone_id" class="control-label">Tone Name</label>
                            <select id="tone_id" class="form-control text-color" name="tone_id">
                                <option value="">Select</option>
                                @foreach($tones as $tone)
                                    @if(in_array($tone->name, $user_tone, true))
                                        @continue
                                    @endif
                                    <option value="{{$tone->id}}">{{$tone->name ?? ''}}</option>
                                @endforeach
                            </select>

                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tone_id') }}</strong>
                            </span>
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
                <span id="tone-spinner-create" class="spinner-border spinner-border-sm"
                      style="display: none" role="status" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</div>
