<div class=" row p-2 pt-2">
<div class="col-12">
  <div class="card">
   
    
              <div class="card-header bg-gradient-info d-flex align-items-center">
                <h3 class="card-title flex-grow-1 text-gray-100"> Demandes d'examens médico-légal numérique</h3>

                <div class="card-tools d-flex align-items-center ">
               
                  <div class="input-group input-group-md" style="width: 250px;">
                    <input type="text" name="table_search" wire:model.debounce.250ms="search" class="form-control float-right" placeholder="Rechercher des demandes">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
             
              <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th style="width: 5%;" class="text-center" >Num_dossier</th>
                      <th style="width: 15%;" class="text-center" >Classification</th>
                      <a href="admin.journalDeCas">
                      <th style="width: 35%;" class="text-center">Crime</th>
                    </a>
                      <th style="width: 15%;" class="text-center">Suspect</th>
                      <th style="width: 10%;" class="text-center">Enquêteur</th>
                      
                      <th style="width:20%;" class="text-center">Action</th>
                    </tr>
                  </thead>
                   <tbody>
                      
                        @foreach ($affichedemande as $item)
                            <tr>
                              <td class="text-center">{{ $item->id }}</td>
                                <td class="text-center">{{ $item->classification }}</td>
                                                         
                                <td class="text-center" > <a  href="{{route ('admin.journal-de-cas')}}" >{{ $item->crime }}</a></td>
                              
                                <td class="text-center">{{ $item->cas_suspect }}</td>
                                <td class="text-center">{{ $item->investigateur_de_cas }}</td>
                               
                                <td class="text-center">
                                    <button class="text-blue-700" style="width: 30px" > <i class="far fa-edit"></i> </button>
                                   @can('manage-users')
                                     
                                     <button class=" text-red-600" style="width: 30px"  > <i class="fa fa-trash-alt"></i></button>
                                     @endcan
                                  
                                </td>
                            </tr>
                        @endforeach
                  </tbody>
                  
                </table>
              </div>
              <div class="card-footer">
                <div class="float-right">
                  {{ $affichedemande->links() }}
                </div>
              </div>
              <!-- /.card-body -->
            
            
            <!-- /.card -->
          </div>
    </div>
  
  <script>
    window.addEventListener("showEditForm",function(e){
        Swal.fire({
            input: 'text',
            inputValue: e.detail.item.crime,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText:'Modifier <i class="fa fa-check"></i>',
            cancelButtonText:'Annuler <i class="fa fa-times"></i>',
            inputValidator: (value) => {
                if (!value) {
                return 'Champ obligatoire'
                }

                @this.updateTypeArticle(e.detail.item.id, value)
            }
        })
    })
</script>
