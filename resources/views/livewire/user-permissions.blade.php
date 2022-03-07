<div class="p-6">
    <div class="flex items-center  px-6 py-3 text-left sm:px-6 lg:px-8">
        <x-jet-button wire:click="createShowModal">
            {{ __("Définir les droits d'accés") }}
        </x-jet-button>
    </div>

    {{-- The data table --}}
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Dossier</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" >Option</th>
                                
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">                           
                            @if ($data->count())
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="px-6 py-2">{{ $item->role_id }}</td>
                                        <td class="px-6 py-2">{{ $item->route_name }}</td>                                      
                                        <td class="px-6 py-2 text-center">
                                            <button class="text-blue-600" style="width: 30px" wire:click="updateShowModal({{ $item->id }})"> <i class="far fa-edit"></i> </button>
        
                                             <button class=" text-red-600" style="width: 30px" wire:click="deleteShowModal" > <i class="fa fa-trash-alt"></i></button>
        
                                          
                                        </td>  
                                    </tr>
                                @endforeach
                            @else 
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mt-5">
    {{ $data->links() }}
    </div>

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            <h4 class="border-b"><b>Sauvegarder les autorisation de l'utilisateur</b></h4>
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="role_id" value="{{ __('Role') }}" />
                <select wire:model="role_id" id="" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">-- Séléctionner le role de l'utilisateur --</option>    
                    @foreach (App\Models\User::userRoleList() as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>    
                    @endforeach
                </select>
                @error('role_id') <span class="error">{{ $message }}</span> @enderror
            </div>  

            <div class="mt-4">
                <x-jet-label for="routeName" value="{{ __('Dossier') }}" />
                <select wire:model="routeName" id="" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">-- Séléctionner la route --</option>    
                    @foreach (App\Models\UserPermission::routeNameList() as $item)
                        <option value="{{ $item }}">{{ $item }}</option>    
                    @endforeach
                </select>
                @error('routeName') <span class="error">{{ $message }}</span> @enderror
            </div>  
        </x-slot>

        <x-slot name="footer">
            <button type="button" class="btn btn-default ml-2" data-dismiss="modal" wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">Annuler</button>

            @if ($modelId)
             
                <button type="submit" class="btn btn-success ml-2" wire:click="update" wire:loading.attr="disabled">Mettre à jour</button>
            @else
               
                <button type="submit" class="btn btn-success ml-2"  wire:click="create" wire:loading.attr="disabled">Définir le droit d'accés</button>
            @endif       
        </x-slot>
    </x-jet-dialog-modal>

    {{-- The Delete Modal --}}
    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
           <h4 class="border-b"><strong>Supprimer l'autorisation</strong></h4>
        </x-slot>

        <x-slot name="content">
            {{ __("Voulez-vous vraiment supprimer l'autorisation accorder à cet utilisateur") }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __("Supprimer l'autorisation") }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
