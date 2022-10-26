@section('title', __('Bookings'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							{{__('Booking Listing')}} </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} </h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="{{__('Search Bookings')}}">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  {{__('Add Bookings')}}
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.bookings.create')
						@include('livewire.bookings.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>{{__('Id User')}}</th>
								<th>{{__('Id Teacher')}}</th>
								<th>{{__('Date')}}</th>
								<th>{{__('Address')}}</th>
								<th>{{__('State')}}</th>
								<td>{{__('ACTIONS')}}</td>
							</tr>
						</thead>
						<tbody>
							@foreach($bookings as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->id_user }}</td>
								<td>{{ $row->id_teacher }}</td>
								<td>{{ $row->date }}</td>
								<td>{{ $row->address }}</td>
								<td>{{ $row->state }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									{{__('Actions')}}
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> {{__('Edit')}} </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Booking id {{$row->id}}? \nDeleted Bookings cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> {{__('Delete')}} </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $bookings->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
