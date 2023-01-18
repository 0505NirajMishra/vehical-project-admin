<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">

  <tr>
    <th>ID No.</th>
    <th>vehical type exprt</th>
    <th>vehical employee name</th>
    <th>vehical employee cname</th>
    <th>vehical employee mobile no</th>
    <th>vehical employee profile</th>
    <th>ACTION</th>
  </tr>

  @foreach($vehicalemployee as $user)
  
  <tr>

    <td>{{$user->vehical_employee_id }}</td>
    <td>{{$user->vehical_service_type_exprt}}</td>
    <td>{{$user->vehical_employee_name}}</td>
    <td>{{$user->vehical_company_name}}</td>
    <td>{{$user->vehical_mobile}}</td>

    <td><img src="{{ url('/') }}/vehicalcategory/image/{{$user->vehical_employee_profile}}" style="width:50px; height:50px;" /></td>
  
    <td>
        <a href="{{ url('/') }}/admin/vehicalemployees/{{$user->vehical_employee_id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a href="{{ url('/') }}/admin/vehicalemployees/destroy/{{$user->vehical_employee_id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>  
    </td>
    
  </tr>
  @endforeach
</table>