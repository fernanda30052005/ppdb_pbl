@extends('layouts.frontend.master')

@section('content')
    <div class="wrapper">
        <!-- =========================
                        Google Map
                =========================  -->
        <section class="google-map py-0">
            <iframe frameborder="0" height="500" width="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7198714442!2d101.85579167360966!3d0.4025013995935463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5c5007df023c1%3A0x72426176fe760957!2sTaman%20Kenangan!5e0!3m2!1sid!2sid!4v1722932920422!5m2!1sid!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </section><!-- /.GoogleMap -->

        <!-- ==========================
                      contact layout 1
                  =========================== -->
        <section class="contact-layout1 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="contact-panel p-0 box-shadow-none">
                            <div class="">
                                <div class="contact-info-box">
                                    <h4 class="contact__info-box-title">Lokasi Kami</h4>
                                    <ul class="contact__info-list list-unstyled">
                                        <li>            
                                               Taman Kenangan Pangkalan Kerinci                                
                                        </li>
                                        <a href="https://www.google.co.id/maps/place/Taman+Kenangan/@0.4025014,101.8557917,17z/data=!3m1!4b1!4m6!3m5!1s0x31d5c5007df023c1:0x72426176fe760957!8m2!3d0.4025014!4d101.8583666!16s%2Fg%2F11ldv4lmdl?entry=ttu" 
                                               target="_blank" 
                                               rel="noopener noreferrer"> Lihat Maps
                                            </a>
                                    </ul><!-- /.contact__info-list -->
                                    
                                </div><!-- /.contact-info-box -->
                                <div class="contact-info-box">
                                    <h4 class="contact__info-box-title">Hubungi Kami</h4>
                                    <ul class="contact__info-list list-unstyled">
                                        <li>Email: <a href="mailto:tamankenangan@gmail.com">tamankenangan@gmail.com</a></li>
                                        <li>Instagram: <a href="@taman_kenangan">@taman_kenangan</a></li>
                                    </ul><!-- /.contact__info-list -->
                                </div><!-- /.contact-info-box -->
                                <div class="contact-info-box">
                                    <h4 class="contact__info-box-title">Jam Operasi admin</h4>
                                    <ul class="contact__info-list list-unstyled">
                                        <li>Dari Senin - Sabtu</li>
                                        <li>8.00 sampai 19.00</li>
                                    </ul><!-- /.contact__info-list -->
                                </div><!-- /.contact-info-box -->
                                <a href="https://api.whatsapp.com/send?phone=+62 811-762-665&text=Halo%2C%20saya%20ingin%20menghubungi%20pihak%20Taman%20Kenangan.%20Bisa%20menemui%3F" 
                                target="_blank" 
                                rel="noopener noreferrer" class="btn btn__primary">
                                    <i class="icon-arrow-right"></i>
                                    <span>Hubungi via Whatsapp</span>
                                </a>
                            </div><!-- /.contact__panel-info -->
                        </div><!-- /.contact__panel -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.contact layout 1 -->
    </div>
@endsection
