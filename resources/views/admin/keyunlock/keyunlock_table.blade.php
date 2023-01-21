<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">

  <tr>
    <th>ID No.</th>
    <th>Vehical Type</th>
    <th>Vehical Registration No</th>
    <th>service location</th>
    <th>service longitude</th>
    <th>service latitude</th>
    <th>Description</th>
    <th>Vehical Photo</th>
    <th>ACTION</th>
  </tr>

  @foreach($keyunlock as $user)
  
  <tr>

    <td>{{$user->keyunlocks_id}}</td>
    <td>{{$user->vehical_type}}</td>
    <td>{{$user->vehical_registration_no}}</td>
    <td>{{$user->service_location}}</td>
    <td>{{$user->service_longitude}}</td>
    <td>{{$user->service_latitude}}</td>
    <td>{{$user->description}}</td>

    <td><img src="{{ url('/') }}/vehical/image/{{$user->vehical_photo}}" style="width:50px; height:50px;" /></td>

    <td>
        <a href="{{ url('/') }}/admin/keyunlocks/{{$user->keyunlocks_id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a href="{{ url('/') }}/admin/keyunlocks/destroy/{{$user->keyunlocks_id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>  
    </td>
    
  </tr>
  @endforeach
</table>  