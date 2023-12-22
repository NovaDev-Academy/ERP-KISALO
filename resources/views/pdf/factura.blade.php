<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kisalo - Fatura</title>
    <link rel="stylesheet" href="{{ public_path('factura_css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ public_path('factura_icons/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ public_path('factura_css/invoice.css') }}" />
</head>

<body>
    <!-- cabeçalho da fatura -->
    <header class="header-invoice bg-body-tertiary position-relative">
        <div class="container pt-3">
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="logoBackground">
                        <img src="{{ public_path('factura_icons/icons/kisalo-icon-mono-white.png') }}" alt="logotipo da kisalo">
                    </div>
                </div>
                <div class="col-md-6 ms-auto ">
                    <div class="logo d-flex">
                        <img src="{{ public_path('factura_icons/icons/kisalo-icon-main-color.png') }}" alt="logotipo da kisalo">
                        <div class="description ps-1">
                            <h4 class="pt-2 mb-0 pb-0">Kisalo</h4>
                            <p class="pb-0 mb-0 text-body-secondary"><small>YELLOWGEST PRESTAÇÃO DE SERVIÇO, LDA</small></p>
                            <p class="text-body-secondary"><small>NIF: 5000722324</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <!--  -->
            <div class="row mt-5 justify-content-between align-items-center">
                <div class="col-md-6 mt-5">
                    <div class="contact  align-items-center">
                        <h5>Contacto</h5>
                        <div class="text-body-secondary">
                            <p class=" pb-0 mb-0 w-75">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                  </svg>
                                <span class="ms-1">Avenida Pedro de Castro Vandunem Loy, <span class="ps-0">galeria 3 rosas</span></span>
                            </p>
                            <p class="pb-0 mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg>
                                <span class="ms-1">923487081</span>
                            </p>
                            <p class="pb-0 mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                    <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                                    <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
                                  </svg>
                                <span class="ms-1">geral@yellowgest.com</span>
                            </p>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe2" viewBox="0 0 16 16">
                                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539c.142-.384.304-.744.481-1.078a6.7 6.7 0 0 1 .597-.933A7.01 7.01 0 0 0 3.051 3.05c.362.184.763.349 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9.124 9.124 0 0 1-1.565-.667A6.964 6.964 0 0 0 1.018 7.5h2.49zm1.4-2.741a12.344 12.344 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.612 13.612 0 0 1 7.5 10.91V8.5H4.51zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696c.12.312.252.604.395.872.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964A13.36 13.36 0 0 1 3.508 8.5h-2.49a6.963 6.963 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855.143-.268.276-.56.395-.872A12.63 12.63 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5a6.963 6.963 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008h2.49zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343a7.765 7.765 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"/>
                                  </svg>
                                <span class="ms-1">www.yellowgest.com</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-5 pe-5">
                    <div class="contact ms-5">
                        <h5>Cliente</h5>
                        <div class="text-body-secondary me-5">
                            <p class="pb-0 mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                  </svg>
                                <span class="pe-1">Exmo/a(s) Sr/a(s)</span>
                            </p>
                            <p class="fw-semibold pb-0 mb-0 ps-3">Lurdes Ester</p>
                            <p class="ps-3">0102</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Table -->
    <main>
        <div class="container mt-5">
            
            <!-- Lista de dados -->
            <ul class="list-group list-group-horizontal justify-content-between text-capitalize">
                <li class="list-group-item">
                    <h6>Operador</h6>
                    <p class="pt-1 text-body-secondary fw-medium">Administrador</p>
                </li>
                <li class="list-group-item">
                    <h6>Hora</h6>
                    <p class="pt-1 text-body-secondary fw-medium">08h30</p>
                </li>
                <li class="list-group-item">
                    <h6>Data de emissão</h6>
                    <p class="pt-1 text-body-secondary fw-medium">22-08-23</p>
                </li>
                <li class="list-group-item">
                    <h6>Data de expiração</h6>
                    <p class="pt-1 text-body-secondary fw-medium">22-08-24</p>
                </li>
                <li class="list-group-item">
                    <h6>preço</h6>
                    <p class="pt-1 text-body-secondary fw-medium"> 130,000 <span class="ms-1 fw-normal">kz</span></p>
                </li>
              </ul>

            <!-- Total -->
            <div class="total overflow-hidden">
                <div class="row pt-5 ps-2 position-relative justify-content-center">
                    <div class="col-8 bg-body-tertiary d-flex align-items-center pt-2">
                        <div class="px-3">
                            <small class=" text-uppercase text-secondary fw-medium small">
                                desconto iva
                            </small>
                            <p class=" fs-3 fw-normal">130,000kz</p>
                        </div>
                        <!-- simbolo de adição -->
                            
                        <div class=" px-3">
                            <small class=" text-uppercase text-secondary fw-medium small">
                                Valor líquido
                            </small>
                            <p class=" fs-3 fw-normal">130,000kz</p>
                        </div>
                        <!-- simbolo de igualidade -->
                        
                    </div>
                    <div class="col-4 bg-color text-white text-end pt-2 pe-5">
                        <small class="text-uppercase opacity-50">total</small>
                        <p class="price fs-4 fw-bold fs-3 fw-light">2500,000 <span class="fw-light opacity-75">Kz</span></p>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
   
    <div class="container">
        <div class="invoice-footer d-flex justify-content-between mt-4 ">
            <div class="">
                    <small class="fw-semibold text-body-secondary">Tipo de Pagamento</small>
                <p class="fw-normal pt-1">Cartãode crédito</p>
            </div>
            <div class="">
                <small class="fw-semibold text-body-secondary">Factura/Recibo Nº</small>
                <p class="fw-normal pt-1"> FR P37I2023/56</p>
            </div>
        </div>
    </div>
</body>

</html>