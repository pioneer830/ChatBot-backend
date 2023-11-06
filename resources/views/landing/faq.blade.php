@extends('layouts.homepage')
@section('content')
    <header class="nk-header">
        @include('landing.navbar')
    </header>

    <main class="nk-pages">
        <section class="section section-lg ">
            <div class="container">
                <div class="section-head">
                    <div class="row justify-content-center text-center">
                        <div class="col-xl-8"><h6 class="overline-title text-primary">FAQ's</h6>
                            <h2 class="title">Frequently Asked Questions</h2></div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row g-gs justify-content-center">
                        <div class="col-xl-9 col-xxl-8">
                            <div class="accordion accordion-flush accordion-plus-minus accordion-icon-accent"
                                 id="faq-1">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" data-bs-toggle="collapse"
                                                data-bs-target="#faq-1-1" fdprocessedid="a7imzu"> What is a copy?
                                        </button>
                                    </h2>
                                    <div id="faq-1-1" class="accordion-collapse collapse show" data-bs-parent="#faq-1">
                                        <div class="accordion-body"> Yes, you can write long articel for your blog
                                            posts, product descriptions or any long article with CopyGen. We're always
                                            updating our template and tools, so let us know what are expecting!
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#faq-1-2" fdprocessedid="qmxngl"> Does CopyGen to write
                                            long articles?
                                        </button>
                                    </h2>
                                    <div id="faq-1-2" class="accordion-collapse collapse" data-bs-parent="#faq-1">
                                        <div class="accordion-body"> Yes, you can write long articel for your blog
                                            posts, product descriptions or any long article with CopyGen. We're always
                                            updating our template and tools, so let us know what are expecting!
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#faq-1-3" fdprocessedid="wu3sup"> Is the generated
                                            content original?
                                        </button>
                                    </h2>
                                    <div id="faq-1-3" class="accordion-collapse collapse" data-bs-parent="#faq-1">
                                        <div class="accordion-body"> Yes, you can write long articel for your blog
                                            posts, product descriptions or any long article with CopyGen. We're always
                                            updating our template and tools, so let us know what are expecting!
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#faq-1-4" fdprocessedid="jvkqnr"> Do you have wordpress
                                            plugin?
                                        </button>
                                    </h2>
                                    <div id="faq-1-4" class="accordion-collapse collapse" data-bs-parent="#faq-1">
                                        <div class="accordion-body"> Yes, you can write long articel for your blog
                                            posts, product descriptions or any long article with CopyGen. We're always
                                            updating our template and tools, so let us know what are expecting!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
