<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">{{__('Create New enrollment')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="id_client"></label>
                <input wire:model="id_client" type="text" class="form-control" id="id_client" placeholder="{{__('Id Client')}}">@error('id_client') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_package"></label>
                <input wire:model="id_package" type="text" class="form-control" id="id_package" placeholder="{{__('Id Package')}}">@error('id_package') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="state"></label>
                <input wire:model="state" type="text" class="form-control" id="state" placeholder="{{__('State')}}">@error('state') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="date"></label>
                <input wire:model="date" type="text" class="form-control" id="date" placeholder="{{__('Date')}}">@error('date') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="start"></label>
                <input wire:model="start" type="text" class="form-control" id="start" placeholder="{{__('Start')}}">@error('start') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="end"></label>
                <input wire:model="end" type="text" class="form-control" id="end" placeholder="{{__('End')}}">@error('end') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="num_class"></label>
                <input wire:model="num_class" type="text" class="form-control" id="num_class" placeholder="{{__('Num Class')}}">@error('num_class') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">{{__('Close')}}</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">{{__('Save')}}</button>
            </div>
        </div>
    </div>
</div>
