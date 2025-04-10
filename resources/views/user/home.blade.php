@extends('layout')
@auth
    @section('title', 'Home | WashingMashing')
@else
@section('title', 'WashingMashing')
@endauth

@section('content')
<div id="home"></div>

@if (session('success'))
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="statusModalLabel">Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var statusModal = new bootstrap.Modal(document.getElementById('statusModal'));
            statusModal.show();
        });
    </script>
@endif

<x-header />

<x-navbar />

<main>

    <x-hero-section title="Fresh, Fast, Flawless—We Clean Your" words="Apparels,Beddings,Anything!"
        intro-link="#intro-section" services-link="#services-section" />

    <x-intro-section title="Reliable & Fast Cleaning Service"
        description="Our website is designed to make your laundry experience fast, 
                easy, and hassle-free. With just a few clicks, you can book a laundry service that guarantees fresh,
                clean, and neatly folded clothes—delivered right on time. Whether you have everyday wear, 
                delicate fabrics, or bulky loads, we handle them with care, 
                using high-quality detergents and advanced cleaning techniques."
        phone="87000" />

    <x-services-section limit="2" />


    @php
        $testimonials = App\Models\Testimonial::all();
    @endphp

    <x-testimonial-section :testimonials="$testimonials" />


</main>

<x-footer />
@endsection
