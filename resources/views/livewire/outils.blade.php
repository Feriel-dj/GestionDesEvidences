<div class="p-8">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createShowModal">
            <i class="nav-icon fas fa-plus"></i>
            {{ __('Ajouter un outil') }}
        </x-jet-button>
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-2">
            <div class="py-2 align-middle inline-block min-w-full sm:px-3 lg:px-2">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nom du produit</th>
                                <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Version du logiciel</th>
                                <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Version matérielle</th>
                                <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">N° de série</th>
                                <th class="px-3 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Plus de détails</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" class="text-center">Option</th>
                            </tr>
                            </thead>  
                            <tbody class= "bg-white divide-y divide-gray-200">
                                    @if ($data->count())
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="px-3 py-4 text-sm whitespace-no-wrap"> {{ $item->nom_produit}} </td>
                                                   
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap"> {{ $item->version_logiciel}} </td>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->version_matériel}} </td>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->Num_série}} </td>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->détails}} </td>
                                              
                                                   
                                                <td class="text-center">
                                                    <button class="text-blue-600" style="width: 30px" wire:click=" updateShowModal({{ $item->id }})"> <i class="far fa-edit"></i> </button>
                                                   @can('manage-users')
                                                     
                                                     <button class=" text-red-600" style="width: 30px" wire:click="deleteShowModal({{ $item->id }})" > <i class="fa fa-trash-alt"></i></button>
                                                     @endcan
                                                  
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
    <br/>
   
{{ $data->links() }}

    <x-jet-dialog-modal wire:model="modalFormVisisble">
        <x-slot name="title" >
            {{ __('Ajouter un outil') }} {{$modelId}}
        </x-slot>

        <x-slot name="content">
            <div class="mt-3">
                <x-jet-label class="text-gray-600" for="nom_produit" value="{{ __('Nom du produit') }}" />
                <x-jet-input id="nom_produit" class="block mt-1 w-full" type="text" name="nom_produit" wire:model.debounce.800ms="nom_produit" />
                @error('nom_produit') <span class="error">{{ $message }} </span>@enderror
            </div>
            <div class="mt-3">
                <x-jet-label class="text-gray-600" for="version_logiciel" value="{{ __('Version du logiciel') }}" />
                <x-jet-input id="version_logiciel" class="block mt-1 w-full" type="text" name="version_logiciel" wire:model.debounce.800ms="version_logiciel" />
                @error('version_logiciel') <span class="error">{{ $message }} </span>@enderror
            </div>
            <div class="mt-3">
                <x-jet-label class="text-gray-600" for="version_matériel" value="{{ __('Version matérielle') }}" />
                <x-jet-input id="version_matériel" class="block mt-1 w-full" type="text" name="version_matériel" wire:model.debounce.800ms="version_matériel" />
                @error('version_matériel') <span class="error">{{ $message }} </span>@enderror        
            </div>
        <div class="mt-3">
            <x-jet-label class="text-gray-600" for="Num_série" value="{{ __('N° de série') }}" />
            <x-jet-input id="Num_série" class="block mt-1 w-full" type="text" name="Num_série" wire:model.debounce.800ms="Num_série" />
            @error('Num_série') <span class="error">{{ $message }} </span>@enderror
        </div>
        <div class="mt-3">
            <x-jet-label class="text-gray-600" for="détails" value="{{ __('Plus de détails') }}" />
            <x-jet-input id="détails" class="block mt-1 w-full" type="text" name="détails" wire:model.debounce.800ms="détails" />
            @error('détails') <span class="error">{{ $message }} </span>@enderror
        </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisisble')" wire:loading.attr="disabled">
                {{ __('Fermer') }}
            </x-jet-secondary-button>

            @if ($modelId)
            
            <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                {{ __('Mettre à jour') }}
            </x-jet-button>
            @else
            <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Sauvegarder') }}
            </x-jet-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __("Supprimer l'outil") }}
        </x-slot>

        <x-slot name="content">
            {{ __("Êtes-vous sûr de vouloir supprimer cet outil ? Une fois l'outil supprimé, toutes ses ressources et données seront définitivement supprimées.") }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __("Supprimer l'outil") }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
