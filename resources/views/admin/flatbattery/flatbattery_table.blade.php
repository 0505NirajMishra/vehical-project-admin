<html>
        <head>
               <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
               <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        </head>
</html>

<table class="table align-middle table-row-dashed fs-6 gy-5">

  <tr>
    <th>ID No.</th>
    <th>vehical type</th>
    <th>battery photo</th>
    <th>vehical registration no</th>
    <th>vehical image</th>
    <th>location</th>
    <th>longitute</th>
    <th>latitute</th>
    <th>description</th>
    <th>status</th>
    <th>ACTION</th>
  </tr>

  @foreach($flat as $user)

  <tr>

    <td>{{$user->flatbattery_id }}</td>
    <td>{{$user->vehical_type}}</td>
    <td><img src="{{ url('/') }}/vehicalcategory/image/{{$user->battery_photo}}" style="width:50px; height:50px;" /></td>
    <td>{{$user->vehical_registration_no}}</td>
    <td><img src="{{ url('/') }}/vehicalcategory/image/{{$user->vehical_image}}" style="width:50px; height:50px;" /></td>
    <td>{{$user->location}}</td>
    <td>{{$user->longitude}}</td>
    <td>{{$user->latitude}}</td>
    <td>{{$user->description}}</td>
    <td>
        <a href="{{ url('/') }}/admin/flatbatterys/active/{{$user->flatbattery_id}}/{{$user->status==0?1:($user->status==1?2:0)}}" data-id="`+ flatbattery_id +`" title="Status" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
          <span class="svg-icon svg-icon-3">
              <?php if ($user->status == 0): ?>
                    <button type="button" class="btn btn-warning">Pending</button>
              <?php elseif ($user->status == 1): ?>
                    <button type="button" class="btn btn-success">Accept</button>
              <?php elseif ($user->status == 2): ?>
                    <button type="button" class="btn btn-danger">Cancel</button>
              <?php else: ?>
                    <span>No Status Found</span>
              <?php endif;?>
          </span>
        </a>
    </td>
    <td>
        <a href="{{ url('/') }}/admin/flatbatterys/{{$user->flatbattery_id}}/edit" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-pen"></i>
                    </span>
        </a>
        <a href="{{ url('/') }}/admin/flatbatterys/destroy/{{$user->flatbattery_id}}" title="Delete" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" >
                    <span class="svg-icon svg-icon-3">
                        <i class="fa fa-trash"></i>
                    </span>
        </a>
    </td>
  </tr>
  @endforeach
</table>