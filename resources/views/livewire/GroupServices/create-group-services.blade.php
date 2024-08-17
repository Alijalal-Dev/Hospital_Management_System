<div>

@if ($ServiceSaved)
        <div class="alert alert-info">تم حفظ البيانات بنجاح.</div>
    @endif

    @if ($ServiceUpdated)
    <div class="alert alert-info">تم تعديل البيانات بنجاح.</div>
    @endif

    @if($show_table)
        @include('livewire.GroupServices.index')
    @else
    <form wire:submit.prevent="saveGroup" autocomplete="off">
        @csrf
        <div class="form-group">
            <label>{{trans('Services.group_name_group_services')}}</label>
            <input wire:model="name_group" type="text" name="name_group" class="form-control" required>
        </div>

        <div class="form-group">
            <label>{{trans('Services.group_description_group_services')}}</label>
            <textarea wire:model="notes" name="notes" class="form-control" rows="5"></textarea>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <div class="col-md-12">
                    <button class="btn btn-primary"
                            wire:click.prevent="addService">{{trans('Services.group_add_sub_service_group_services')}}
                    </button>
                </div>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="table-primary">
                            <th>{{trans('Services.group_service_name_group_services')}}</th>
                            <th width="200">{{trans('Services.group_service_number_group_services')}}</th>
                            <th width="200">{{trans('Services.group_service_processes_group_services')}}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($GroupsItems as $index => $groupItem)
                            <tr>
                                <td>
                                    @if($groupItem['is_saved'])
                                        <input type="hidden" name="GroupsItems[{{$index}}][service_id]"
                                               wire:model="GroupsItems.{{$index}}.service_id"/>
                                        @if($groupItem['service_name'] && $groupItem['service_price'])
                                            {{ $groupItem['service_name'] }}
                                            ({{ number_format($groupItem['service_price'], 2) }})
                                        @endif
                                    @else
                                        <select name="GroupsItems[{{$index}}][service_id]"
                                                class="form-control{{ $errors->has('GroupsItems.' . $index) ? ' is-invalid' : '' }}"
                                                wire:model="GroupsItems.{{$index}}.service_id">
                                            <option value="">-- choose product --</option>
                                            @foreach ($allServices as $service)
                                                <option value="{{ $service->id }}">
                                                    {{ \App\Models\ServiceTranslation::where(['Service_id' => $service->id])->pluck('name')->first() }} ({{ number_format($service->price, 2) }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('GroupsItems.' . $index))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('GroupsItems.' . $index) }}
                                            </em>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if($groupItem['is_saved'])
                                        <input type="hidden" name="GroupsItems[{{$index}}][quantity]"
                                               wire:model="GroupsItems.{{$index}}.quantity"/>
                                        {{ $groupItem['quantity'] }}
                                    @else
                                        <input type="number" name="GroupsItems[{{$index}}][quantity]"
                                               class="form-control" wire:model="GroupsItems.{{$index}}.quantity"/>
                                    @endif
                                </td>
                                <td>
                                    @if($groupItem['is_saved'])
                                        <button class="btn btn-sm btn-primary"
                                                wire:click.prevent="editService({{$index}})">
                                                {{trans('Services.group_service_update_button_group_services')}}
                                        </button>
                                    @else
                                        <button class="btn btn-sm btn-success mr-1"
                                                wire:click.prevent="saveService({{$index}})">
                                                {{trans('Services.group_service_validate_button_group_services')}}
                                        </button>
                                    @endif
                                    <button class="btn btn-sm btn-danger"
                                            wire:click.prevent="removeService({{$index}})">{{trans('Services.group_service_delete_button_group_services')}}
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="col-lg-4 ml-auto text-right">
                    <table class="table pull-right">
                        <tr>
                            <td style="color: red">{{trans('Services.group_Total_group_services')}}</td>
                            <td>{{ number_format($subtotal, 2) }}</td>
                        </tr>

                        <tr>
                            <td style="color: red">{{trans('Services.group_Discount_group_services')}}</td>
                            <td width="125">
                                <input type="number" name="discount_value" class="form-control w-75 d-inline" wire:model="discount_value" wire:change="calculateTotal">
                            </td>
                        </tr>

                        <tr>
                            <td style="color: red">{{trans('Services.group_tax_group_services')}}</td>
                            <td>
                                <input type="number" name="taxes" class="form-control w-75 d-inline" min="0" max="100" wire:model="taxes" wire:change="calculateTotal"> %
                            </td>
                        </tr>
                        <tr>
                            <td style="color: red">{{trans('Services.group_total_tax_group_services')}}</td>
                            <td>{{ number_format($total, 2) }}</td>
                        </tr>
                    </table>
                </div> <br/>
                <div>
                    <input class="btn btn-success" type="submit" value=" {{trans('Services.group_confirm_group_services')}}">
                </div>
            </div>
        </div>

    </form>
    @endif

</div>

