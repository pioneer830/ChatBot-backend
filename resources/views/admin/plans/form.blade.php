<link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-wrapper">
                <div  class="col-sm-12">
                    <label for="plan_name" class="control-label">Plan Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', isset($plan->name) ? $plan->name : '') }}" id="plan_name" placeholder="Plan Name">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                    @endif
                </div>
            </div>
            <div class="form-wrapper ">
                <div  class="col-sm-12">
                    <label for="plan_option" class="control-label">Plan Option</label>
                    <textarea id="plan_option" name="plan_option" class="form-control textarea-resize-none" placeholder="Description">{{ old('plan_option', isset($plan->plan_option) ? $plan->plan_option : '') }}</textarea>
                    @if ($errors->has('plan_option'))
                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('plan_option') }}</strong>
                                            </span>
                    @endif
                </div>
            </div>
            <div class="form-wrapper ">
                <div  class="col-sm-12">
                    <label for="plan_description" class="control-label">Plan Description</label>
                    <textarea id="plan-description" name="plan_description" class="form-control textarea-resize-none" placeholder="Description">{{ old('plan_description', isset($plan->plan_description) ? $plan->plan_description : '') }}</textarea>
                    @if ($errors->has('plan_description'))
                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('plan_description') }}</strong>
                                            </span>
                    @endif
                </div>
            </div>
            <div class="form-wrapper ">
                <div  class="col-sm-12">
                    <label for="plan_amount" class="control-label">Amount</label>
                    <input type="text" name="amount" class="form-control" id="plan_amount" value="{{ old('amount', isset($plan->amount) ? $plan->amount : '') }}" placeholder="Amount">
                    @if ($errors->has('amount'))
                        <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('amount') }}</strong>
                                              </span>
                    @endif
                </div>
            </div>
            <div class="form-wrapper ">
                <div  class="col-sm-12">
                    <label for="plan_interval" class="control-label">Plan Interval</label>
                    <select class="form-control" name="plan_interval">
                        <option value="year" {{ old('plan_interval', isset($plan->plan_interval) ? $plan->plan_interval : '') == "year" ? 'selected' : '' }}>Yearly</option>
                        <option value="month" {{ old('plan_interval', isset($plan->plan_interval) ? $plan->plan_interval : '') == "month" ? 'selected' : '' }}>Monthly</option>
                    </select>
                    @if ($errors->has('plan_interval'))
                        <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('plan_interval') }}</strong>
                                              </span>
                    @endif
                </div>
            </div>
            <div class="form-wrapper ">
                <div  class="col-sm-12">
                    <label for="plan_intervalCount" class="control-label">Plan Interval Count</label>
                    <input type="number" name="plan_intervalCount" value="{{ old('plan_intervalCount', isset($plan->plan_intervalCount) ? $plan->plan_intervalCount : '') }}" class="form-control" id="plan_intervalCount" placeholder="Plan Interval Count">
                    @if ($errors->has('plan_intervalCount'))
                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('plan_interval') }}</strong>
                                            </span>
                    @endif
                </div>
            </div>
            <div class="form-wrapper">
                <div  class="col-sm-12">
                    <div class="flex items-center gap-2">
                        <label for="trial_check" class="control-label mr-2">Trial Period</label>
                        <input type="checkbox" {{ old('trial_period_days', isset($plan->trial_period_days) ? $plan->trial_period_days : null) != null ? 'checked' : ''  }} name="trial_check" id="trial_check">
                    </div>
                    <div class="mt-4">
                        <input type="text" name="trial_period_days" value="{{ old('trial_period_days', isset($plan->trial_period_days) ? $plan->trial_period_days : '') }}" class="form-control" id="trial_period_days" placeholder="Trial Period">
                        @if ($errors->has('trial_period_days'))
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('trial_period_days') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->
<!-- Main Quill library -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>
<script>

    (function(){
        "use strict";

        window.onload = function(){
            var trial_check = document.getElementById('trial_check');
            var trial_check_input = document.getElementById('trial_period_days');
            if(!trial_check.checked) {
                trial_check_input.style.display = 'none';
            }
            trial_check.addEventListener('change',function(){
                if(this.checked){
                    trial_check_input.style.display = '';
                    trial_check_input.setAttribute('value', '')
                }else{
                    trial_check_input.style.display = 'none';
                }
            })
            new FroalaEditor('#plan-description');
        }
    })()
</script>

<style>
    .fr-wrapper ul {
        list-style: disc;
    }
    .fr-wrapper ol {
        list-style: decimal;
    }
</style>
