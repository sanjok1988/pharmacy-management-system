@include('admin.layouts.locale')
@extends('admin.layouts.app')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="paypasa-heading">
                <h4>View  Vacancy </h4>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card m-b-20">
                        <div class="card-body">
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <select disabled name="company_id" id="company_id" class="form-control" >
                                        <option value="">Select  a Company </option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}"
                                                    @if($company->id==$vacancy->company_id)
                                                    selected
                                                    @endif
                                            >
                                                {{ $company->company_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('company_name')) <p class="help-block m-b-none">{{ $errors->first('company_name') }}</p> @endif
                                </div>
                                <div class="form-group">
                                    <label for="details">Position</label>
                                    <input disabled type="text"  value="{{$vacancy->position}}"  name="position" class="form-control" id="" placeholder="Position" >
                                </div>

                                <div class="form-group">
                                    <label for="details">Working Time</label>
                                    <input disabled type="text"  value="{{$vacancy->working_time}}" name="working_time"class="form-control" id="" placeholder="details">
                                </div>

                                <div class="form-group">
                                    <label for="company">Number Of Vacancy</label>
                                    <input disabled type="text"  value="{{$vacancy->number_of_vacancies}}" name="number_of_vacancies"class="form-control" id="" placeholder="Number Of Vacancy">
                                </div>
                                <div class="form-group">
                                    <label>Employment form *</label>
                                    <div>
                                        <input  disabled type="text"  value="{{$vacancy->employee_form}}" id="employee_form" name="employee_form" class="form-control"  placeholder="Employment form" >
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Fixed Monthly Salary</label>
                                    <div>
                                        <input  disabled type="text" value="{{$vacancy->salary}}"  id="salary" name="salary" class="form-control"  placeholder="Fixed Monthly Salary" >
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="example">Example</label>
                                <input disabled type="text"  value="{{$vacancy->example}}" name="example" class="form-control"  placeholder="Example" id="example" >
                            </div>
                            <div class="form-group">
                                <label for="details">Insurance</label>
                                <input disabled type="text" value="{{$vacancy->insurance}}" name="insurance"class="form-control" id="" placeholder="Insurance">
                            </div>
                            <div class="form-group">
                                <label for="details">Job Description</label>
                                <input disabled type="text" value="{{$vacancy->job_description}}" name="job_description"class="form-control" id="" placeholder="Job Description">
                            </div>
                            <div class="form-group">
                                <label for="company">Holiday</label>
                                <input disabled type="text"  value="{{$vacancy->holiday_type}}" name="holiday_type"class="form-control" id="" placeholder="Holiday">
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <div>
                                    <input disabled type="text" value="{{$vacancy->location}}" id="location" name="location" class="form-control"  placeholder="Location" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Information</label>
                                <div>
                                    <input disabled type="text"  value="{{$vacancy->information}}" id="information" name="information" class="form-control"  placeholder="information" >
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- end container -->
        </div>
    </div>
@endsection
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $(".content").fadeOut(1500);
        },3000);
    });
</script>