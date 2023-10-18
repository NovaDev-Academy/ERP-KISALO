@extends('layouts.admin.index')
@section('conteudo')
<div class="content-inner container-fluid pb-0" id="page_layout">

    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Serviços Pedidos</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl">Cadastrar Dados da Livraria

                        <svg class="size-28 hvr-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
             </div>
             <div class="card-body">

                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="container mt-6 select_search_box">
                            <h4>Prestadores</h4>
                            <form action="{{route('admin.pedidoservico.vincular')}}" method="POST">
                                @csrf
                                <select class="w-50"  data-live-search="true" onchange="atribuirPreco(this)" >
                                    <option value="">Selecione o Prestador</option>
                                    @foreach ($users as $user)
                                        <option data-preco-min="{{$user->precoMinServico}}" data-id-user="{{$user->id}}" data-preco-max="{{$user->precoMaxServico}}" value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                <script>
                                    function atribuirPreco(selectElement) {
                                        var selectedOption = selectElement.options[selectElement.selectedIndex];
                                        var precoMin = selectedOption.getAttribute('data-preco-min');
                                        var idPrestador = selectedOption.getAttribute('data-id-user');
                                        var precoMax = selectedOption.getAttribute('data-preco-max');
                                        var inputPrecoMin = document.getElementById('precoMin');
                                        var inputPrecoMax = document.getElementById('precoMax');
                                        var idUser = document.getElementById('iduser');
                                        inputPrecoMin.value = precoMin;
                                        inputPrecoMax.value = precoMax;
                                        idUser.value = idPrestador ;
                                        console.log(inputPrecoMin.value, inputPrecoMax.value);
                                    }
                                </script>
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <div class="container mt-6 select_search_box">
                                <h4>Preço Mínimo</h4>
                                <input class="w-50" type="text" id="precoMin" class="form-control" name="precoMin"
                                placeholder="kz" >
                                <h4>Preço Maximo</h4>
                                <input class="w-50" type="text" id="precoMax" class="form-control" name="precoMax"
                                placeholder="kz" >
                            </div>
                        </div>
                        <input type="hidden" id="idpedido" name="idpedido" value="{{$idpedido}}">
                        <input type="hidden" name="user" id="iduser">
                        <button  class="btn  btn-primary w-50 " id="id" >Vincular</button>
                            </form>
                            
                    
                </div>
   
                </div>
             </div>
          </div>
       </div>
    </div>


    </div>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>


    @if (session('eliminada'))
<script>
Swal.fire(
'Categoria de Serviço Eliminado com sucesso!',
'',
'success'
)
</script>
@endif
@if (session('editada'))
<script>
Swal.fire(
'Categoria de Serviço editado com sucesso!',
'',
'success'
)
</script>
@endif
@if (session('editada_f'))
<script>
Swal.fire(
'Prestador vinculado Com Sucesso!',
'',
'error'
)
</script>
@endif

@if (session('status'))
<script>
Swal.fire(
'Prestador vinculado Com Sucesso!',
'',
'success'
)
</script>
@endif
@if (session('status_f'))
<script>
Swal.fire(
'Erro ao vincular prestador ',
'',
'error'
)
</script>
@endif   
    <script>
      $(document).ready(function(){
         $('.select_search_box select').selectpicker();
      })
     </script>

<script>
   document.getElementById('pedidoSelect').addEventListener('change', function() {
       var selectedValue = this.value;
       if (selectedValue) {
           window.location.href = selectedValue;
       }
   });
</script>
                 
@endsection
