@extends('layouts.admin.index')
@section('conteudo')
<div class="content-inner container-fluid pb-0" id="page_layout">

    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Serviços e Pedidos</h4>
                </div>
                <div>
                    
                </div>
             </div>
             <div class="card-body">

               <div class="container mt-5 select_search_box">
                  <h4>Escolha o Pedido</h4>
                  <select class="w-25 select2-basic-single form-select form-control select_search_box" id="pedidoSelect" data-live-search="true" onchange="redirectToSelected()">
                      <option value="">Escolha o Pedido</option>
                      @foreach ($pedidos as $pedido)
                      <option value="{{ route('admin.pedidoservico.prestador', ['id' => $pedido->id_servico_categoria, 'idpedido'=> $pedido->id]) }}">{{ $pedido->nome }}</option>
                      @endforeach
                  </select>
              </div>
                   
   
                </div>
             </div>
          </div>
       </div>
    </div>


    </div>

    <script>
      $(document).ready(function(){
         $('.select_search_box select').selectpicker();
      })
     </script>

<script>
   function redirectToSelected() {
       var select = document.getElementById('pedidoSelect');
       var selectedValue = select.value;
       if (selectedValue) {
           window.location.href = selectedValue;
       }
   }
</script>



                 
@endsection
