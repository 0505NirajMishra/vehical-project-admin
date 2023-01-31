<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">
  
  <tr>
    <th>ID No.</th>
    <th>vehical type name</th>
    <th>vehical category type</th>
    <th>vehical logo</th>
    <th>ACTION</th>
  </tr>

  @foreach($vehicalcategory as $user)
  
  <tr>
  
    <td>{{ $user->vehical_catgeory_id }}</td>
    <td>{{ $user->vehical_name }}</td>
    <td>{{ $user->vehical_type }}</td>  
    
    
    
    <td>
        <a href="{{ url('/') }}/admin/vehicaltypes/{{$user->vehical_catgeory_id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a href="{{ url('/') }}/admin/vehicaltypes/destroy/{{$user->vehical_catgeory_id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>  
    </td>
  
  </tr>

  @endforeach
</table>