@extends('layouts.admin.index')
@section('conteudo')
<div class="content-inner container-fluid pb-0" id="page_layout">

    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Vincular Prestador</h4>
                </div>
                <div>
                    
                </div>
             </div>
             <div class="card-body">

                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="container mt-6 select_search_box">
                            <h4>Prestadores</h4>
                            <form action="{{route('admin.pedidoservico.vincular')}}" method="POST">
                                @csrf
                                <select class="w-50 select2-basic-single form-select form-control"  data-live-search="true" onchange="atribuirPreco(this)" name="user">
                                    <option value="">Selecione o Prestador</option>
                                    @foreach ($users as $user)
                                        <option  data-id-user="{{$user->id}}" value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                <script>
                                    function atribuirPreco(selectElement) {
                                        var selectedOption = selectElement.options[selectElement.selectedIndex];
                                        var idPrestador = selectedOption.value; // Obtenha o valor selecionado (ID do usuário)
                                        var inputUser = document.getElementById('iduser'); // Selecione o campo "user"
                                        inputUser.value = idPrestador; // Defina o valor do campo "user" com o ID do usuário
                                    }
                                </script>
                                
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <div class="container mt-6 select_search_box">
                                <h4>Preço</h4>
                                <input class="w-50" type="text" id="precoMin" class="form-control" name="preco"
                                placeholder="kz" >
                                {{-- <h4>Preço Maximo</h4>
                                <input class="w-50" type="text" id="precoMax" class="form-control" name="precoMax"
                                placeholder="kz" > --}}
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
