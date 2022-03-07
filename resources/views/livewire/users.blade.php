
<div class="p-8">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createShowModal">
            <i class="nav-icon fas fa-plus"></i>
            {{ __('Créer un nouveau utilisateur') }}
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
                                 
                               
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Prénom</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">E-mail</th>
                                 <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                 <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Ajouté</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" class="text-center">Option</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">                           
                            @if ($data->count())
                                @foreach ($data as $item)
                                    <tr>      
                                       
                                        <td class="px-6 py-2">{{ $item->name }}</td>
                                        <td class="px-6 py-2">{{ $item->Prénom }}</td>
                                        <td class="px-6 py-2">{{ $item->email }}</td>
                                        <td class="px-6 py-2">{{ $item->role_id }}</td>
                                        <td class="text-center">{{ optional($item->created_at)->diffForHumans() }}</td>  
                                        <td class="text-center">
                                            <button class="text-blue-600" style="width: 30px" wire:click="updateShowModal({{ $item->id }})"> <i class="far fa-edit"></i> </button>
        
                                             <button class=" text-red-600" style="width: 30px" wire:click="deleteShowModal({{ $item->id }})" > <i class="fa fa-trash-alt"></i></button>
        
                                          
                                        </td>                                      
                                       
                                    </tr>
                                @endforeach
                            @else 
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">aucun résultat trouvé</td>
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
        <x-slot  name="title">
            <h4 class="border-b"><strong>Gérer les utilisateurs </strong></h4>
        </x-slot>

       
        <x-slot name="content">
            
            <div class="mt-3">
                <x-jet-label class="text-gray-600" for="name" value="{{ __('Nom') }}" />
                <x-jet-input wire:model="name" id="" class="block mt-1 w-full " type="text" />
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div> 
            <div class="mt-3">
                <x-jet-label  class="text-gray-600" for="Prénom" value="{{ __('Prénom') }}" />
                <x-jet-input wire:model="Prénom" id="" class="block mt-1 w-full" type="text" />
                @error('Prénom') <span class="error">{{ $message }}</span> @enderror
            </div>  
            <div class="mt-3">
                <x-jet-label class="text-gray-600" for="email" value="{{ __('E-mail') }}" />
                <x-jet-input wire:model="email" id="email" class="block mt-1 w-full" type="email"  :value="old('email')"/>
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>  
            <div class="mt-3">
                <x-jet-label  class="text-gray-600" for="password" value="{{ __('Mot de passe') }}" />
                <x-jet-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                @error('password') <span class="error">{{ $message }}</span> @enderror            
            </div>
            <div class="mt-3">
                <x-jet-label  class="text-gray-600" for="role_id" value="{{ __('Role') }}" />
                <select wire:model="role_id" id="" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">-- Séléctionner le role de l'utilisateur --</option>    
                    @foreach (App\Models\User::userRoleList() as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>    
                    @endforeach
                </select>
                @error('role_id') <span class="error">{{ $message }}</span> @enderror
            </div>
        </x-slot>
        

        <x-slot name="footer">
            <x-jet-secondary-button  class=" ml-2" data-dismiss="modal" wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled"
            >{{ __('Annuler') }}</x-jet-secondary-button>

            @if ($modelId)
             
                <x-jet-button type="submit" class="btn btn-success ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Mettre à jour') }}
                </x-jet-button>
            @else
               
                <x-jet-button  wire:click="create" wire:loading.attr="disabled">
                    {{ __('Créer') }}</x-jet-button>
            @endif            
        </x-slot>
    </x-jet-dialog-modal>

    {{-- The Delete Modal --}}
    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
           <h4 class="border-b"><strong>Supprimer l'utilisateur</strong></h4> 
        </x-slot>

        <x-slot name="content">
            {{ __('Voulez-vous vraiment supprimer cet utilisateur ?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Supprimer') }}
            </x-jet-danger-button>
        </x-slot>
    </form>
    </x-jet-dialog-modal>
</div>
