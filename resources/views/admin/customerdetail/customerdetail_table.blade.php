<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">

  <tr>
    <th>ID No.</th>
    <th>shop employee</th>
    <th>booking date and time</th>
    <th>service status</th>
    <th>location</th>
    <th>service type</th>
    <th>tyre type</th>
    <th>vehical type</th>
    <th>ACTION</th>
  </tr>

  @foreach($customer as $user)
  
  <tr>

    <td>{{$user->customer_id }}</td>
    <td>{{$user->shop_employee}}</td>
    <td>{{$user->booking_date_time}}</td>
    <td>{{$user->service_status}}</td>
    <td>{{$user->location}}</td>
    <td>{{$user->servicetype}}</td>
    <td>{{$user->tyre_type}}</td>
    <td>{{$user->vehical_type}}</td>
    <td>
        <a href="{{ url('/') }}/admin/customerdetails/{{$user->customer_id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a href="{{ url('/') }}/admin/customerdetails/destroy/{{$user->customer_id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>  
    </td>
  </tr>
  @endforeach
</table>