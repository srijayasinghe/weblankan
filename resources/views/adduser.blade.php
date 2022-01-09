@extends('template.master')

@section('content')
<script>
    $( function() {
      $( "#datepicker" ).datepicker();
      $( "#birthdate" ).datepicker();
    } );
</script>
<h1 class="text-info mt-5">Add New User</h1>
<form method="POST" class="mt-5 mb-5 bg-light p-5" action="{{route('addUser')}}" oninput='txt_password2.setCustomValidity(txt_password2.value != txt_password.value ? "Passwords do not match." : "")'>
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label for="txt_name">Name</label>
                <input type="text" class="form-control" required name="txt_name" id="txt_name" placeholder="Enter name">
            </div>
        </div>
        <div class="col">
            <label>Gender</label>
            <div class="row">
                <div class="col-3">
                    <div class="form-check">
                        <input type="radio" name="maleFemail" class="form-check-input" id="red_male">
                        <label class="form-check-label" for="red_male">Male</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="radio" name="maleFemail" class="form-check-input" id="red_female">
                        <label class="form-check-label" for="red_female">Female</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
      <label for="txt_designation">Designation</label>
      <input type="text" class="form-control" id="txt_designation" name="txt_designation" placeholder="Enter designation">
    </div>
    <div class="row">
        <div class="col-4">
            <div id="datepicker"></div>
            <input type="hidden" id="bookingDate" name="bookingDate"/>
        </div>
        <div class="col text-center">
            <label for="txt_morning">Morning</label>
            <input type="text" name="txt_morning" id="txt_morning" class="w-100"  />
            <input type="button" class="btn btn-info mt-2 w-100" value="Add Time Slot"/>
        </div>
        <div class="col text-center">
            <label for="txt_afternoon">Afternoon</label>
            <input type="text" name="txt_afternoon" id="txt_afternoon" class="w-100" />
            <input type="button" class="btn btn-info mt-2 w-100" value="Add Time Slot"/>
        </div>
        <div class="col text-center">
            <label for="txt_evening">Evening</label>
            <input type="text" name="txt_evening" id="txt_evening" class="w-100" />
            <input type="button" class="btn btn-info mt-2 w-100" value="Add Time Slot"/>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-3">
            <div class="form-group">
                <label for="txt_name">Date of Birth</label>
                <input type="text" class="form-control" id="birthdate" name="txt_birth_date" >
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="txt_age">Age</label>
                <input type="number" class="form-control" id="age" name="txt_age" >
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="txt_nic">NIC Number</label>
                <input type="number" class="form-control" id="txt_nic" name="txt_nic" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="txt_contact">Contact Number</label>
                <input type="number" class="form-control" id="txt_contact" name="txt_contact" >
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="txt_land_contact">Land Phone Number</label>
                <input type="number" class="form-control" id="txt_land_contact" name="txt_land_contact" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="txt_email">Email Address</label>
                <input type="email" class="form-control" id="txt_email" name="txt_email" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="txt_password">Create Password</label>
                <input type="password" class="form-control" id="txt_password" required name="txt_password" >
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="txt_password">Confirm Password</label>
                <input type="password" class="form-control" id="txt_password2"  name="txt_password2" required  >
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary  mb-5 float-right">Submit</button>
  </form>

  <script>
    $("#datepicker").on("change",function(){
        $("#bookingDate").val($(this).val());
    });

    $("form").on("submit", function(e) {
        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');

        console.log( $( this ).serialize() );
            $.ajax({
                type: "put",
                url: url,
                data: form.serialize(),
                dataType: "json",
                headers: {"Authorization": 'Bearer '+localStorage.getItem('access_token')},
                success: function (response) {
                    alert('User successfuly added!')
                }
            });
        });

</script>

@endsection()
