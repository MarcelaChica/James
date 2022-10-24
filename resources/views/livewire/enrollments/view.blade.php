@section('title', __('Enrollments'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Enrollment Listing </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Enrollments">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Enrollments
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.enrollments.create')
						@include('livewire.enrollments.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Id Client</th>
								<th>Id Package</th>
								<th>State</th>
								<th>Date</th>
								<th>Start</th>
								<th>End</th>
								<th>Num Class</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($enrollments as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->id_client }}</td>
								<td>{{ $row->id_package }}</td>
								<td>{{ $row->state }}</td>
								<td>{{ $row->date }}</td>
								<td>{{ $row->start }}</td>
								<td>{{ $row->end }}</td>
								<td>{{ $row->num_class }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Enrollment id {{$row->id}}? \nDeleted Enrollments cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $enrollments->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
