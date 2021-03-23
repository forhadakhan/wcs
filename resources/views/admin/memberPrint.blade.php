<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WCS | Member Profile</title>
    <style>
        .container{min-width:992px!important}
        .col-sm-8{max-width:700px}
        .p-5{padding:3rem!important}
        .mx-auto{margin-right:auto!important}
        .mx-auto{margin-left:auto!important}
        .text-center{text-align:center!important}
        .text-right{text-align:right!important}
        .bg-light{background-color:#f8f9fa!important}
        /* .font-weight-light{font-weight:300!important} */
        .table{width:100%;margin-bottom:1rem;color:#212529}
        .table-bordered{border:1px solid #26292c}
        tr{border-top:1px solid #26292c}
        .d-none{display:none!important}
        .p-2{padding:.5rem!important}
    </style>
</head>
<body>

    <div class="">
        <div class="col-sm-8 p-5 mx-auto">
            <table class="table table-bordered" >
                <thead>
                    <tr>
                        <th colspan="3" class="text-center bg-light p-5">
                            <h3> Waterlily Cooperative Society </h3>
                            <span class="font-weight-light"> House-03, Road-07, Block-A </span> <br>
                            <span class="font-weight-light"> Gram, Sylhet, Bangladesh </span> <br>
                            <span class="font-weight-light"> P: +8801234567890 </span> <br>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3" class="text-center p-2">
                            <strong> Member Profile </strong>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-light">
                    <tr>
                        <th class="text-right p-2" scope="row">Name</th>
                        <td colspan="2" class="p-2"> {{ $member->name_member}} </td>
                    </tr>
                    <tr>
                        <th class="text-right p-2" scope="row">NID</th>
                        <td colspan="2" class="p-2"> {{ $member->nid_member}} </td>
                    </tr>
                    <tr>
                        <th class="text-right p-2" scope="row">Birthdate</th>
                        <td colspan="2" class="p-2"> {{ $member->birthday_member}} </td>
                    </tr>
                    <tr>
                        <th class="text-right p-2" scope="row">Age</th>
                        <td colspan="2" class="p-2"> {{ floor((time() - strtotime($member->bday_member)) / 31556926)}} </td>
                    </tr>
                    <tr>
                        <th class="text-right p-2" scope="row">Gender</th>
                    <span class="d-none"> {{ ($member->gender_member == 'F') ? $gender = "Female" : $gender = "Male"}}</span>
                        <td colspan="2" class="p-2"> {{ $gender }} </td>
                    </tr>
                    <tr>
                        <th class="text-right p-2" scope="row">Phone</th>
                        <td colspan="2" class="p-2"> {{ $member->phone_member}} </td>
                    </tr>
                    <tr>
                        <th class="text-right p-2" scope="row">Email</th>
                        <td colspan="2" class="p-2"> {{ $member->email_member}} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>

