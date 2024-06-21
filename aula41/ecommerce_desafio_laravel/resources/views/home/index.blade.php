@extends('layout')

@section('titulo_header_html')
    Página principal
@endsection

@section('content')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Desafio de PHP!</div>
            <div class="masthead-heading text-uppercase">LARAVEL</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#services">Cadastro de Cliente</a>
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Desafio de PHP</h2>
                <h3 class="section-subheading text-muted">Um pouco sobre o desafio</h3>
            </div>
            <div class="my-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="text-justify">
                                Aqui no <strong>Torne-se um Programador</strong>, acreditamos que a oportunidade de aprender 
                                deve ser acessível a todos. É por isso que nosso fundador, Danilo, oferece aulas que começam às 
                                5h da manhã - para que você possa aproveitar o dia ao máximo e transformar suas aspirações em realidade.
                            </p>
                            <p class="text-justify">
                                Sabemos que o esforço e a dedicação são essenciais no caminho para se tornar um grande programador. 
                                Para aqueles que estão dispostos a se esforçar e acordar com o primeiro raio de sol, oferecemos aulas 
                                <strong>totalmente gratuitas</strong>. Esta é a nossa contribuição para uma comunidade mais forte e 
                                mais capacitada tecnicamente.
                            </p>
                            <p class="text-justify">
                                Se você tem o desejo ardente de aprender e crescer na área de tecnologia, mas as circunstâncias 
                                financeiras são um obstáculo, não se preocupe. Estamos aqui para apoiá-lo. Tudo o que pedimos é 
                                sua paixão e compromisso. Então, ajuste o despertador, e vamos codificar juntos ao amanhecer.
                            </p>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <!-- * * * * * * * * * * * * * * *-->
            <!-- * * SB Forms Contact Form * *-->
            <!-- * * * * * * * * * * * * * * *-->
            <!-- This form is pre-integrated with SB Forms.-->
            <!-- To make this form functional, sign up at-->
            <!-- https://startbootstrap.com/solution/contact-forms-->
            <!-- to get an API token!-->
            <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="name" type="text" placeholder="Your Name *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" id="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                    </div>
                </div>
                <!-- Submit success message-->
                <!---->
                <!-- This is what your users will see when the form-->
                <!-- has successfully submitted-->
                <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center text-white mb-3">
                        <div class="fw-bolder">Form submission successful!</div>
                        To activate this form, sign up at
                        <br />
                        <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                    </div>
                </div>
                <!-- Submit error message-->
                <!---->
                <!-- This is what your users will see when there is-->
                <!-- an error submitting the form-->
                <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                <!-- Submit Button-->
                <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Send Message</button></div>
            </form>
        </div>
    </section>