<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">

  <tr>
    <th>ID No.</th>
    <th>Service type</th>
    <th>Tyre type</th>
    <th>Vehical type</th>
    <th>ACTION</th>
  </tr>

  @foreach($care as $user)
  
  <tr>

    <td>{{$user->care_id}}</td>
    <td>{{$user->servicetype}}</td>
    <td>{{$user->tyre_type}}</td>
    <td>{{$user->vehical_type}}</td>
  
    <td>
        <a href="{{ url('/') }}/admin/cares/{{$user->care_id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a href="{{ url('/') }}/admin/cares/destroy/{{$user->care_id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>  
    </td>
    
  </tr>
  @endforeach
</table>