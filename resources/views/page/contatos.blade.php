@extends('page.master')

@section('content')

    <!-- Page Title bar -->
    <section class="defult-page-title overlay-black">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-box">
                        <h2><span>Contate</span> Nos</h2>
                        <p><a href="{{url('/')}}">Home</a> / <a href="{{url('contatos')}}">Contatos</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Contact Start -->
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="contact-col contact-infobox">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <p>diretor@fafit.com.br</p>
                        <p>atendimento@fafit.com.br</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="contact-col contact-infobox">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <p>(0xx15) 3531-8484</p>
                        <p>(0xx15) 3531-8484 </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="contact-col contact-infobox">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p>Rua: João Batista Veiga, 1725</p>
                        <p>CEP: 18460-000 - Itararé(SP)</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact-col clearfix">
                        <form id="ajax-contact" method="post" action="php/contact.php">
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Seu Nome" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Seu e-mail"  required>
                                </div>
                                <div class="col-sm-12">
                                    <input type="text" name="subject" class="form-control" placeholder="Assunto" id="subject" required>
                                </div>
                                <div class="col-sm-12">
                                    <textarea class="form-control contact-textarea" id="exampleTextarea" rows="5" placeholder="Deixe sua menssagem aqui"></textarea>
                                </div>
                                <div class="col-sm-12 text-left">
                                    <button class="btn btn-default" type="submit" value="Submit Form">Enviar Menssage</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact-col">
                        <!-- Map -->
                        <div id="map" style="width:100%;height:340px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
