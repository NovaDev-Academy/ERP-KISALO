@extends('auth.layout')
@section('titulo','Login')
@section('conteudo')

{{--  '
        'kisalo',
        'informações',
        'funcionarios', --}}

<?php
$categorias=App\Models\categoria::get();
?>
<div class="wrapper">
	<section class="login-content overflow-hidden">
	   <div class="row no-gutters align-items-center bg-white">
		  <div class="col-md-12 col-lg-6 align-self-center">
			 <a href="{{ route('login') }}" class="navbar-brand d-flex align-items-center mb-3 justify-content-center text-primary">
				<div class="logo-normal text-center">
                    <img src="{{ asset('assets/images/dashboard/Naamloos-2.png') }}" alt="header" width="35%">
				</div>

			 </a>
			 <div class="row justify-content-center pt-5">
				<div class="col-md-11">
				   <div class="card  d-flex justify-content-center mb-0 auth-card iq-auth-form">
					  <div class="card-body">
						 <h2 class="mb-2 text-center">Registrar </h2>
						 <p class="text-center">Registra-se</p>
						 <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
							@csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nome*</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" required id="name" placeholder="Primeiro Nome">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="sobrename" class="form-label">Sobrenome*</label>
                                        <input type="text" class="form-control" name="sobrename" value="{{ old('sobrename') }}" required id="sobrename" placeholder="Segundo Nome">
                                    </div>
                                </div>
                        
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email*</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="email" aria-describedby="email" placeholder="xyz@example.com">
                                        @error('email')
                                        <span class="invalid-feedback form-control" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                        
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Telefone*</label>
                                        <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" required id="phone" placeholder="+244">
                                    </div>
                                </div>
                        
                                <div class="col-lg-6">
                                    <div class "form-group">
                                        <label for="telefone_2" class="form-label">Telefone 2*</label>
                                        <input type="number" class="form-control" name="telefone_2" value="{{ old('telefone_2') }}" required id="telefone_2" placeholder="+244">
                                    </div>
                                </div>
                        
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="provincia">Escolha uma província de Angola:*</label>
                                        <select id="provincia" name="provincia" class="form-control">
                                            <option value="Bengo"{{ old('provincia') == 'Bengo' ? ' selected' : '' }}>Bengo</option>
                                            <option value="Benguela"{{ old('provincia') == 'Benguela' ? ' selected' : '' }}>Benguela</option>
                                            <option value="Bié"{{ old('provincia') == 'Bié' ? ' selected' : '' }}>Bié</option>
                                            <option value="Cabinda"{{ old('provincia') == 'Cabinda' ? ' selected' : '' }}>Cabinda</option>
                                            <option value="Cunene"{{ old('provincia') == 'Cunene' ? ' selected' : '' }}>Cunene</option>
                                            <option value="Huambo"{{ old('provincia') == 'Huambo' ? ' selected' : '' }}>Huambo</option>
                                            <option value="Huíla"{{ old('provincia') == 'Huíla' ? ' selected' : '' }}>Huíla</option>
                                            <option value="Luanda"{{ old('provincia') == 'Luanda' ? ' selected' : '' }}>Luanda</option>
                                            <option value="Lunda Norte"{{ old('provincia') == 'Lunda Norte' ? ' selected' : '' }}>Lunda Norte</option>
                                            <option value="Lunda Sul"{{ old('provincia') == 'Lunda Sul' ? ' selected' : '' }}>Lunda Sul</option>
                                            <option value="Malanje"{{ old('provincia') == 'Malanje' ? ' selected' : '' }}>Malanje</option>
                                            <option value="Moxico"{{ old('provincia') == 'Moxico' ? ' selected' : '' }}>Moxico</option>
                                            <option value="Namibe"{{ old('provincia') == 'Namibe' ? ' selected' : '' }}>Namibe</option>
                                            <option value="Uíge"{{ old('provincia') == 'Uíge' ? ' selected' : '' }}>Uíge</option>
                                            <option value="Zaire"{{ old('provincia') == 'Zaire' ? ' selected' : '' }}>Zaire</option>
                                            <option value="Cuando Cubango"{{ old('provincia') == 'Cuando Cubango' ? ' selected' : '' }}>Cuando Cubango</option>
                                            <option value="Cuanza Norte"{{ old('provincia') == 'Cuanza Norte' ? ' selected' : '' }}>Cuanza Norte</option>
                                            <option value="Cuanza Sul"{{ old('provincia') == 'Cuanza Sul' ? ' selected' : '' }}>Cuanza Sul</option>
                                        </select>
                                        
                                    </div>
                                </div>
                        
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="municipio" class="form-label">Municipio*</label>
                                        <input type="text" class="form-control" name="municipio" value="{{ old('municipio') }}" required id="municipio" placeholder="Municipio">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="kisalo" class="form-label">Como descobriu o Kísalo? *</label>
                                        <textarea name="kisalo" class="form-control">{{ old('kisalo') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="kisalo" class="form-label">Outras Informações </label>
                                        <textarea name="kisalo" class="form-control">{{ old('kisalo') }}</textarea>
                                    </div>
                                </div>
                            </div>

                                
                                
                            

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="password" class="form-label">Senha*</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" id="password" aria-describedby="password" placeholder="xxxx">
                                        @error('password')
                                            <span class="invalid-feedback form-control" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="password_confirmation" class="form-label">Confirmar senha*</label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="password_confirmation" id="password_confirmation" aria-describedby="password_confirmation" placeholder="xxxx">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback form-control" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                         @enderror
                                    </div>
                                </div>

                            </div>

							   <div class="row">
                               
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="vc_nome">Tipo de Prestador*</label>
                                        <select type="text" id="tipo_estabelecimento" class="form-control" name="tipo_estabelecimento" placeholder="Nome do Estabelecimento">
                                            <option value="1"{{ old('tipo_estabelecimento') == '1' ? ' selected' : '' }}>Empresa</option>
                                            <option value="2"{{ old('tipo_estabelecimento') == '2' ? ' selected' : '' }}>Individual</option>
                                        </select>
                                    </div>
                                    
                                </div>
                               </div>
                               <br>
                            <div class="empresa" style="display: none">
                                <h3 class="h3">Dados do Prestador</h3>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="vc_nome">Nome da Empresa*</label>
                                            <input type="text" id="nome_empresa" class="form-control" name="nome_empresa" placeholder="Nome da Empresa" value="{{ old('nome_empresa') }}">
                                        </div>
                                    </div>
                                
                                    <div class="form-group col-lg-6">
                                        <label for="nif">Endereço*</label>
                                        <input type="text" id="endereco" class="form-control" name="endereco" placeholder="Endereço" value="{{ old('endereco') }}">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="latitude">Responsavel Legal*</label>
                                        <input type="text" id="reponsavel" class="form-control" name="reponsavel" placeholder="reponsavel" value="{{ old('reponsavel') }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for "latitude"> Contacto </label>
                                        <input type="text" id="contacto" class="form-control" name="contacto" placeholder="Contacto" value="{{ old('contacto') }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="vc_path">Numero do BI do Representante*</label>
                                        <input type="text" id="bi" class="form-control" name="bi" placeholder="Numero do BI do Representante" value="{{ old('bi') }}">
                                    </div>
                                
                                    <div class="form-group col-lg-6">
                                        <label for="vc_path">Documento de Registro da Empresa*</label>
                                        <input type="file" id="vc_path" class="form-control" name="vc_path" placeholder="Documento da EMPRESA" value="{{ old('vc_path') }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="vc_path">Data de Registro da Empresa*</label>
                                        <input type="date" id="registro" class="form-control" name="registro" placeholder="Imagem" value="{{ old('registro') }}">
                                    </div>
                                
                                    <div class="form-group col-lg-6">
                                        <label for="vc_path">NIF Empresarial*</label>
                                        <input type="text" id="nif" class="form-control" name="nif" placeholder="NIF Empresarial" value="{{ old('nif') }}">
                                    </div>
                                
                                    <div class="form-group col-lg-6">
                                        <label for="funcionarios">Quantidade de Funcionarios*</label>
                                        <input type="number" id="funcionarios" class="form-control" name="funcionarios" placeholder="Quantidade de Funcionarios" value="{{ old('funcionarios') }}">
                                    </div>
                                </div>
                                

                        

                         
                    </div>
                    <div class="individual" style="display: none">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="vc_path">Numero do BI*</label>
                                <input type="text" id="vc_path" class="form-control" name="bi" placeholder="Numero do BI" value="{{ old('bi') }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="vc_path">Endereço*</label>
                                <input type="text" id="endereco" class "form-control" name="endereco" placeholder="Endereço da Empresa" value="{{ old('endereco') }}">
                            </div>
                        
                            <div class="form-group col-lg-6">
                                <label for="vc_path">Curriculo Vitae*</label>
                                <input type="file" id="cv_path" class="form-control" name="cv_path" placeholder="Curriculo Vitae" value="{{ old('cv_path') }}">
                            </div>
                        </div>
                        
                        </div>

                        

                         
                    </div>
							<div class="d-flex justify-content-center">
							   <button type="submit" class="btn btn-submit w-100">registrar</button>
							</div>
						 </form>
                         <p class="mt-3 text-center color-primary">
                            Já tens uma conta ? <a href="{{ route('login') }}" class="text-underline color-tertiary">Iniciar Sessão.</a>
                         </p>
					  </div>
				   </div>
				</div>
			 </div>
		  </div>
		  <div class="col-lg-6 d-lg-block d-none bg-primary p-0  overflow-hidden">
			 <img src="../../assets/images/auth/01.png" class="img-fluid gradient-main" alt="images" loading="lazy" >
		  </div>
	   </div>
	</section>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tipoEstabelecimentoSelect = document.getElementById("tipo_estabelecimento");
        const divEmpresa = document.querySelector(".empresa");
        const divIndividual = document.querySelector(".individual");
    
        // Adicione um ouvinte de evento para detectar mudanças na seleção
        tipoEstabelecimentoSelect.addEventListener("change", function() {
            if (tipoEstabelecimentoSelect.value === "1") {
                // Se "Empresa" for selecionado, exiba a div "empresa" e oculte a div "individual"
                divEmpresa.style.display = "block";
                divIndividual.style.display = "none";
            } else if (tipoEstabelecimentoSelect.value === "2") {
                // Se "Individual" for selecionado, exiba a div "individual" e oculte a div "empresa"
                divEmpresa.style.display = "none";
                divIndividual.style.display = "block";
            } else {
                // Se "Selecione o Tipo de Empresa" for selecionado, oculte ambas as divs
                divEmpresa.style.display = "none";
                divIndividual.style.display = "none";
            }
        });
    });
    </script>
    
        @endsection
