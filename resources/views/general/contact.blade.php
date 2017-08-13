@extends('layouts.master')

@section('content')




    <!-- begin Content -->
    <section>

        <!-- begin Timetable -->
        <article class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h6 class="contact-form-title">Your Complain ?</h6>
                        <form id="" action="SaveComplaint" method="post" role="form">
                            <div class="row">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subject" class="sr-only">subject</label>
                                        <input type="text" class="form-control" id="subject" name="subject" required="required"
                                               placeholder="Subject">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="message" class="sr-only">Messege</label>
                                        <textarea type="text" class="form-control" id="message" name="message" required="required"
                                                  placeholder="Message"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-form" type="submit"><i class="icon-mail"></i>Send</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-response"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <h6 class="contact-form-title">Information</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quaerat deleniti obcaecati
                            repellat placeat rerum quam, iure aperiam sunt maiores porro quidem ea, officia unde eum
                            ipsam vitae, eos perspiciatis.</p>
                        <address>
                            <p><i class="icon-location"></i>300 Collins St. Melbourne</p>
                            <p><i class="icon-clock"></i>Monday to friday from 8AM to 7PM</p>
                            <p><i class="icon-mail"></i><a href="mailto:email@democompany.com">hello@company.com</a></p>
                            <p><i class="icon-mobile"></i>+61 4826 4762</p>
                        </address>
                    </div>
                </div>
            </div>
        </article>
        <!-- end Timetable -->


    </section>
    <!-- end Content -->

@endsection