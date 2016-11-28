@extends ('layouts.dashboard')
@section('page_heading','User management')
@section('section')

<div class="col-sm-12">
	<div class="row">
		<div class="col-sm-12">
			<a href="{{ url('/add_user') }}">
				<button type="button" class="btn btn-primary btn-md">
					<i class="glyphicon glyphicon-plus"></i> Add user
				</button>
			</a>
		</div>
	</div>
	<br/>

	<div class="row">
		<div class="col-sm-12">
			<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
				<tr>
					<th class="col-sm-3">User name</th>
					<th class="col-sm-5">User Email</th>
					<th class="col-sm-4">User group</th>
					<th></th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				@foreach ($userDataList as $userData)
					<tr class="odd gradeX">
						<td>{{ $userData["name"] }}</td>
						<td>{{ $userData["email"] }}</td>
						<td>Group1</td>
						<td class="center">
                            {{--<a class="btn btn-small btn-info" href="{{ URL::to('nerds/'.$userData["id"].'/edit_user') }}">Edit this Nerd</a>--}}
							<a href="{{ url($userData["id"].'/edit_user') }}">
								<i class="glyphicon glyphicon-pencil" style="cursor: pointer"></i>
							</a>
						</td>
						<td class="center">
                            <i id="{{$userData["id"]}}" class="glyphicon glyphicon-remove js-confirm-delete" style="cursor: pointer">
                            </i>
                        </td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				Deleting
			</div>
			<div class="modal-body">
				Are you shure, that you want to delete it ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a class="btn btn-danger btn-ok js-delete-btn">Delete</a>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
    $(document).ready(function() {
        var currDeleteUserID = 0;
        $('.js-confirm-delete').click(function() {
            currDeleteUserID = $(this).attr("id");
            $(".modal").modal();
        });

        $(".js-delete-btn").click(function() {
            var deleteUrl = '{{url('/')}}' + '/' + currDeleteUserID + '/delete_user';
            window.location.href = deleteUrl;
            return false;
        });
    });

</script>

@stop
